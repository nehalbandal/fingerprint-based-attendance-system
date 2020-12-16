<?php
include 'include/Database.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="sty.css">
  <link type="image/ico" href="assets/image/favicon.ico" rel="icon">
  <style type="text/css">
  .logo {
    float: left;
    margin-left: 20%; 
    width: 100px; 
    height: 100px;
    margin-top:1%;
}
.pict{
    position: relative;
    top:30%;
    left: 10px;
    font-size:40px;
    color: white;
}
    #buttonup{
  margin: 0 auto;
  border: 1px solid black;
  text-align: center;
  padding: 1%;
  width: 400px;
  height: auto;
  color: white;
  background-color: #1e1e1e;
  font-size: 26px;
  cursor: pointer;

}
.auth_teach,.fp_upd {
  width: 400px;
  height: auto;
  padding: 1%;
  border: 1px solid white;
margin: 0 auto;

}
input,select {
  width: 400px;
  height: 25px;
  padding: 3px;
  color: black;
  border: none;
  text-align: center;
}
#buttonreg{
margin-left: 10%;
}
  </style>
</head>

<body>
  <div id=head>
    <img class="logo" src="images/logo.gif">
    <h1 class="pict">Pune Institute Of Computer Technology</h1>
  </div>
  <div class="mids">
    
    <!-- UPDATE ATTENDATNCE -->

    <a href="upload.php" style="text-decoration: none;">
      <div id="buttonup">UPDATE ATTENDANCE</div>
    </a>
    <br>
    <br>
    
    <!-- ALLOCATE SUBJECT TO TEACHER -->

    <div class="auth_teach">

      <form method="post"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
        <INPUT TYPE="text" NAME="subj" placeholder="Subject" autocomplete=off required/>
        <br>
        <br>
        <select name="year">
          <option value="">Acedamic Year</option>
          <option value="FE">FE</option>
          <option value="SE">SE</option>
          <option value="TE">TE</option>
          <option value="BE">BE</option>
        </select>
        <br>
        <br>
        <select name="class">
          <option value="">Select Division</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        <br>
        <br>
        <select name="tname" required="">
          <option value="">Select Teacher</option>
          <?php $query1="SELECT * FROM teacher " ; 
          $run1=mysqli_query($con,$query1); 
          while ($row1=mysqli_fetch_array($run1)) { 
            $teacher=$row1[ 'name'] ; 
            echo '<option value="'.$teacher. '">'.$teacher. '</option>'; } ?>
        </select>
        <br>
        <br>
        <input type="submit" name="allocate" id="buttonreg" value="Allocate Subject" />
      </form>
    </div>
    <br>
    <br>

    <!-- CHANGE FINGERPRINT -->

    <div class="fp_upd">
      <form method="post"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  
        <INPUT TYPE="text" NAME="roll" autocomplete=off required/>
        <br>
        <br>
        <input type="submit" name="upd" id="buttonreg" value="Update Fingerprint">
      </form>
    </div>
  </div>
</body>

</html>

 <?php 
          if(isset($_POST['allocate'])){
            $subj=$_POST['subj'];
            $year=$_POST['year'];
            $class=$_POST['class'];
            $tname=$_POST['tname'];
            $t="SELECT * FROM teacher where name='$tname' ";
            $r=mysqli_query($con,$t);
            $row=mysqli_fetch_array($r);
            $tid=$row['t_id'];
            $dept=$row['dept'];
            $query="INSERT INTO subject (name,dept,class,year,t_id) 
             			   values ('$subj','$dept','$class','$year','$tid') ";
            $run=mysqli_query($con,$query);
            
           
          }

          if(isset($_POST['upd'])){
            $upfp=$_POST['roll'];
                          echo "<script type=\"text/javascript\">window.location.href = 'modal_c.php?id=$upfp';</script>";
          }
          ?>