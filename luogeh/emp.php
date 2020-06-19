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
        <li class="active"><a href="emp.php">Employee</a></li>
        <li><a href="dept.php">Department</a></li>
        <li><a href="child.php">Child</a></li>
      </ul>
    </div>
  </nav>
<div class="container">
  <h3>Employee</h3> 
  <!--Add Employee Modal-->
  <a class="waves-effect waves-light btn-small" id="btn"><i class="material-icons left">add</i>Add Employee</a>
  <div id="emp-modal" class="modal open" tab-index="0" style="z-index:1003 ; top:10%; transform: scaleX(1) scaleY(1);">
    <div class="modal-content">
    <!--Add Employee Form--><p>
      <form class="col s12" method="post" action="emp.php" name="form">  
        <div class="row">
          <div class="input-field col s4">
            <input placeholder="Enter SSN" name="num" type="Number" class="validate">
            <label class="active" for="ssn">SSN</label>
          </div>
          <div class="input-field col s4">
            <input placeholder="Enter Salary" name="sal" type="Number" class="validate">
            <label class="active" for="ssn">Salary</label>
          </div>
          <div class="input-field col s4">
            <input placeholder="Enter Phone Number" name="ph" type="Text" class="validate">
            <label class="active" for="ssn">Phone</label>
          </div>
          <button id="close"class="btn waves-effect red darken-1">Cancel
          <i class="material-icons right">cancel</i>
          </button>
          <button class="btn waves-effect waves-light right" type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
          </button>
        </div>
      </form></p>
      <?php 
        if(isset($_POST['submit']))
        {
          //set the variables
          $ssn = $_POST['num'];
          $salary = $_POST['sal'];
          $phone = $_POST['ph'];
          //send to the database
          if($ssn!=''){
          $query="INSERT INTO employee( ssn, salary, phone) VALUES ('$ssn', '$salary','$phone')";
          if (mysqli_query($conn, $query)){
            echo "New employee added";}
          else{ 
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);}}
            else{echo "Please Enter SSN";}}
      ?>
    </div>
  </div>
  <!--end of modal-->
  
  <div class="row">
  <!--Employee Card-->
    <div class="col s8 offset-s2">
      <div class="card blue-grey darken-2 z-depth-3">
        <!--start of employee table--> 
        <div class="card-content white-text">
          <span class="card-title">EMPLOYEE TABLE</span>
          <?php
            //sql query
            $sql="SELECT * FROM employee";
            $result=mysqli_query($conn,$sql);
              echo"<table id='empt'class='highlight'style='color:white'><thead><tr><th>SSN</th><th>SALARY</th><th>PHONE</th></tr></thead>";
              while($row=mysqli_fetch_assoc($result)){
                echo"<tbody><tr><td>".$row["ssn"]."</td>".
                  "<td>".$row["salary"]."</td>".
                  "<td>".$row["phone"]."</td></td></tr>";}
              echo"</tbody></table>";
              mysqli_close($conn);
          ?>
        </div>
        <!--end of employee table-->
      </div>
    </div>
  </div>
<!--end of employee section-->
</div>
</main>
<footer class="page-footer blue darken-2">
          <div class="footer-copyright">
            <div class="container">
            © 2020
            </div>
          </div>
        </footer>
<script>
// Get the modal
var modal = document.getElementById("emp-modal");
var btn = document.getElementById("btn");
var cancel = document.getElementById("close");
//open the modal 
btn.onclick = function() {
  modal.style.display = "block";}
//clicks on close
close.onclick = function() {
  modal.style.display = "none";}

</script>
</body> 
</html> 