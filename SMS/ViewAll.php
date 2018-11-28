<?php include 'header.php'; ?>
<?php  include 'lib/Student.php' ?>
<?php 
//error_reporting(0);
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
  <form action="ViewAll.php"method="post">
  <table class="table table-striped">
  <thead>
    <tr>
      <th width="30%">Serial</th>
      
      <th width="50%">Student Roll</th>
      <th width="20%">Attendance</th>
    </tr>
  </thead>
  <?php 
  $stu=new Student();
  $get_date=$stu->getDate();
  if($get_date){
    $i=0;
    while($value=$get_date->fetch_assoc()){
      $i++;
    
  
  
  ?>
  <tbody>
    <tr>
     
      <td><?php echo $i; ?></td>
      <td><?php echo $value['attendtime']; ?></td>
      
      <td>
      <a class="btn btn-primary" href="student_view.php?dt=<?php echo $value['attendtime']; ?>">View</a>
      </td> 
      
    </tr>
    
    <?php } }; ?>
    
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