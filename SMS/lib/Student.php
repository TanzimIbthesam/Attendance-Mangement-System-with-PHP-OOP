<?php 
include_once 'Database.php';


?>


<?php
class Student{
    private $db;
    public function __construct(){
     $this->db=new Database;
    }
    public function getStudents(){
       $query="SELECT * FROM tbl_attn";
       $result=$this->db->select($query);
       return $result;
    }
    public function insertStudent($name,$roll){
        $name=mysqli_real_escape_string($this->db->link,$name);
        $roll=mysqli_real_escape_string($this->db->link,$roll);
        if(empty($name) || empty($roll)){
           $msg="<div class='alert alert-danger' role='alert'>
          <strong>ERROE</strong> Please fill out the required fields
         </div>";
          return $msg;
        }else{
            $stu_query="INSERT INTO tbl_attn(name,roll) VALUES('$name','$roll')";
            $stu_insert=$this->db->insert($stu_query);

            $att_query="INSERT INTO tbl_profile(roll) VALUES('$roll')";
            $stu_insert=$this->db->insert($att_query);
            if($stu_insert){
                $msg="<div class='alert alert-success' role='alert'>
          <strong>SUCCESS</strong>Your data has been inserted succesfully
         </div>";
          return $msg;
            }else{
                $msg="<div class='alert alert-danger' role='alert'>
                <strong>ERROR</strong>Data not inserted successfully
               </div>";
               return $msg;
            }
        }
    }
    public function insertAttendance($cur_date,$attendance=array()){
        $query= "SELECT DISTINCT attendtime FROM tbl_profile";
        $getdata=$this->db->select($query);
        while($result=$getdata->fetch_assoc()){
            $db_date=$result['attendtime'];
            if($cur_date == $db_date){
                $msg="<div class='alert alert-success' role='alert'>
           Attendance already taken today
         </div>";
          return $msg;
            }
        }
        foreach($attendance as $atn_key => $atn_value ){
            if($atn_value=="present"){
                $stu_query="INSERT INTO tbl_profile(roll,attend,attendtime) VALUES('$atn_key','present',now()) ";
                $data_insert=$this->db->insert($stu_query);
            }elseif($atn_value=="absent"){
                    $stu_query="INSERT INTO tbl_profile(roll,attend,attendtime) VALUES('$atn_key','absent',now()) ";
                    $data_insert=$this->db->insert($stu_query);
                }
            }
            if($data_insert){
                $msg="<div class='alert alert-success' role='alert'>
                <strong>SUCCESS</strong>Attendance data has been inserted succesfully
               </div>";
                return $msg;
            }else{
                $msg="<div class='alert alert-danger' role='alert'>
                <strong>ERROR</strong>Attendance  data has been not been inserted
               </div>";
                return $msg; 
            }
        }
        public function getDate(){
            $query= "SELECT DISTINCT attendtime FROM tbl_profile";
            $result=$this->db->select($query);
            return $result;
        }
        public function getAllData($dt){
            $query= "SELECT tbl_attn.name,tbl_profile.*
            FROM tbl_attn
            INNER JOIN tbl_profile 
            ON tbl_attn.roll=tbl_profile.roll
            WHERE attendtime='$dt'";
            $result=$this->db->select($query);
            return $result;
        }
    
    



}
    
    

?>