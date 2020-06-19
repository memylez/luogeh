<?php include_once("dbcon.php")?>
<! DOCTYPE html>
<html>
<title>Luo Geh DTR</title>
<head>
  <meta charset="utf-8">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="body.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <main>
        <nav>
    <div class="nav-wrapper blue-grey darken-4">
      <a href="index.html" class="brand-logo">Luo Geh DTR</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="emp.php">Employee</a></li>
        <li class="active"><a href="dept.php">Department</a></li>
        <li><a href="child.php">Child</a></li>
      </ul>
    </div>
  </nav>
<div class="container">
  <h3>Department</h3>
  <a class="waves-effect waves-light btn-small" id="btn"><i class="material-icons left">add</i>Add Department</a>
  <div id="emp-modal" class="modal open" tab-index="0" style="z-index:1003 ; top:10%; transform: scaleX(1) scaleY(1);">
    <div class="modal-content">
    <!--Add Employee Form--><p>
    <form class="col s12" method="post" action="dept.php" name="form">  
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Department Number" name="dnum" type="Number" class="validate">
         <label class="active" for="ssn">Department Number</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Department Name" name="dname" type="Text" class="validate">
         <label class="active" for="ssn">Department Name</label>
        </div>
        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Budget" name="budget" type="Number" class="validate">
         <label class="active" for="ssn">Department Budget</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Manager SSN" name="mssn" type="Number" class="validate">
         <label class="active" for="ssn">Manager SSN</label>
        </div>
        <button class="btn waves-effect red darken-1">Cancel
        <i class="material-icons right">cancel</i>
        </button>
          <button class="btn waves-effect waves-light right" type="submit" name="submit">Submit
        <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
    </form></p>
    <?php if(isset($_POST['submit']))
{

//set the variables
  $dnum = $_POST['dnum'];
  $dname = $_POST['dname'];
  $budget = $_POST['budget'];
  $mssn = $_POST['mssn'];
  //send to the database
  $query="INSERT INTO department( dept_num, dept_name, budget, mgr_ssn ) VALUES ('$dnum', '$dname','$budget','$mssn')";

if (mysqli_query($conn, $query)){
    echo "New department added";
    }
else{ 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
</div>
</div>
<div class="row">
<div class="col s12">
  <div class="card blue-grey darken-2 z-depth-3">
    <!--start of department table--> 
      <div class="card-content white-text">
          <span class="card-title">Department Table</span>
         <?php
          //sql query
            $sql="SELECT dept_num, dept_name, budget, mgr_ssn FROM department";
            $result=mysqli_query($conn,$sql);
            echo"<table class='highlight' style='color:white'><thead><tr><th>Department Number</th><th>Department Name</th><th>Budget</th><th>Manager</th></tr></thead>";
            while($row=mysqli_fetch_assoc($result)){
              echo"<tbody><tr><td>".$row["dept_num"]."</td>".
                "<td>".$row["dept_name"]."</td>".
                "<td>".$row["budget"]."</td>".
                "<td>".$row["mgr_ssn"]."</td></tr>";}
            echo"</tbody></table>";
          ?>
      </div>
      <!--end of department table-->
  </div>
</div>
</div>
</div>
</main>
<footer class="page-footer blue darken-2">
          <div class="footer-copyright">
            <div class="container">
            © 2020
            </div>
          </div>
        </footer>
        </footer>
<script>
// Get the modal
var modal = document.getElementById("emp-modal");
var btn = document.getElementById("btn");
var cancel = document.getElementsByClassName("close");
//open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
//clicks on close
close.onclick = function() {
  modal.style.display = "none";
}

</script>
</body> 
</html> 