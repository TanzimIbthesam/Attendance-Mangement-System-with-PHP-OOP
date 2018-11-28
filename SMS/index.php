<?php include 'headerone.php'; ?>
<?php  include 'lib/Student.php' ?>
<!--
<script type="text/javascript">
$(document).ready(function(){
 
    $(form).submit(function(){
         var roll=true;
         $(':radio').each(function(){
           name=$(this).attr('name');
           if(roll && !$(':radio[name="'+name+'"]:checked').length){
              alert(name + "Roll Missing!");
              $roll=false;
           }
         });
         return $roll;
    });
});
</script>
-->
<?php 
//error_reporting(0);
//$attendance=0;
$stu= new Student;
$cur_date =date('Y-m-d');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $attendance=$_POST['attendance'];
  
  $insertattend=$stu->insertAttendance($cur_date,$attendance);
}


?>
<?php 
if(isset($insertattend)){
  echo $insertattend;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<div class="row">
<div class="card mx-auto">
<div class="card-header  ">
<strong>Date:</strong><?php $cur_date =date('Y-m-d'); echo $cur_date; ?>
</div>

</div>


</div>

</div>
  <div class="container">
  <div class="row">
  <div class="card-body mx-auto">
  <form action="index.php"method="post">
  <table class="table table-striped">
  <thead>
    <tr>
      <th width="25%">Serial</th>
      <th width="25%">Student name</th>
      <th width="25%">Student Roll</th>
      <th width="25%">Attendance</th>
    </tr>
  </thead>
  <?php $get_student=$stu->getStudents();
  if($get_student){
    $i=0;
    while($value=$get_student->fetch_assoc()){
      $i++;
    
  
  
  ?>
  <tbody>
    <tr>
     
      <td><?php echo $i; ?></td>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $value['roll']; ?></td>
      <td>
      <input type="radio"name="attendance[<?php echo $value['roll']; ?>]"value="present">Present
      <input type="radio"name="attendance[<?php echo $value['roll']; ?>]"value="absent">Absent
      </td> 
      
    </tr>
    
    <?php } }; ?>
    <tr> 
    <td colspan="4">
    <input type="submit"class="btn btn-primary"name="submit"Value="Submit">
    </td>
    
    </tr>
      </tbody>
      </table>
  </form>
     </div>
  </div> 
  
 
 
  
  
  <?php include 'footer.php'; ?>
  
  
  


<script src="inc/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
</body>
</html>