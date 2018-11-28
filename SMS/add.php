
<?php include 'header.php'; ?>
<?php include 'lib/Student.php';?>
<?php 
$stu= new Student();
if($_SERVER['REQUEST_METHOD']=='POST') {
  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $insertdata=$stu->insertStudent($name,$roll);
}


?>
<?php 
if(isset($insertdata)){
  echo $insertdata;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
</head>
<body>



  <div class="container">
  <div class="row">
  <div class="card-body mx-auto">
  <form action="add.php"method="post">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control"name="name" id="name"  placeholder="Enter name"required>
    </div>
    <div class="form-group">
    <label for="roll">Student Roll</label>
    <input type="text" class="form-control" name="roll" id="roll"  placeholder="Enter your roll"required>
    </div> 
    
    <div class="form-group">
    <button type="submit" class="btn btn-primary"name="submit"value="Add student">Add Student</button>
    </div>
    
    
  </form>
  
     </div>
  </div> 
  </div> 
  
 
 
  
  
  <?php include 'footer.php'; ?>
  
  
  


<script src="inc/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
</body>
</html>





?>