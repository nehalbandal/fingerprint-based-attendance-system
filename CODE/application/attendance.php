<?php
require 'include/Database.php';
session_start();

if($_SESSION['is_logged_in_t']!=true){
  echo "<script type=\"text/javascript\">alert('Log In First');window.location.href='index.php'</script>";
}

$tid=$_SESSION['t_id'];
$tname=$_SESSION['t_name'];
$tdept=$_SESSION['t_dept'];
$tclass=$_SESSION['t_class'];
$year=$_SESSION['year'];   
$tsubj=$_SESSION['s_name'];

?>
<html>
<head>
   <title>Attendance</title>
    <?php include 'include/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="sty.css">
    <style type="text/css">
.teach{
  float:right;
  margin-right: 5%;
  font-size: 20px;
  color: white;
}
a{
  text-decoration-style: none;
  color: lightgreen;
}
.text{
  font-weight: bold;
   font-size: 20px;
   color: yellow;
   text-transform: uppercase;


}
.inp{
  border:2px solid white;
  text-align: center; 
  height: 35px;
  background-color: transparent;
  color: white;
   font-size: 20px;
  font-weight: bold;
}
form{
  margin-left: 5%;
}
    </style>
</head>
<body>
  <div id=head>
    <img class="logo" src="images/logo.gif">
    <h1 class="pict">Pune Institute Of Computer Technology</h1>
    <br>
    <div class="teach" style="">
      <p style="text-transform: uppercase;">
        <?php echo $tname. '  ('.$year. ')   ' ?>
      </p> <a href="logout.php" style="">Logout</a>
    </div>
  </div>

  <div class="mids">
    <div style="margin-top:10%;margin-left:40%">
      <p class="text" >
        &emsp;SUBJECT :<?php echo $tsubj;?>&emsp; &emsp; CLASS :<?php echo $tclass;?>
      </p>
      <br><br>

      <div style="color: #00ffff; width: 50%;padding: 2%; ">
        <h2 align="center"> Enter Roll No.</h2><br>
        <form method="post"   action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >   
        <input type="text" name="attendee" maxlength="4" class="inp" autocomplete="off" required="" />&emsp;
        <input type="submit" name="nexta" id="btnCaptureAndMatch" value="NEXT" class="btn btn-primary btn-200" />
      </form>
      </div>
    </div>
  </div>

</body>
</html>

 <?php 
          if(isset($_POST['nexta'])){
            $roll_no=$_POST['attendee'];

            $_SESSION['aid']=$_POST['attendee'];
          // CHECK WHETHER STUDENT IS FROM SELECTED CLASS OR NOT 
            $q="SELECT * from student where roll_no='$roll_no' and class='$tclass' and year='$year' ";
            $run= mysqli_query($con,$q);
            $cnts=mysqli_num_rows($run);
              if($cnts>0){
              echo "<script>window.location.href='modal_va.php?aid=$roll_no';</script>";
              }
              else{
              echo "<script type=\"text/javascript\">alert('Not From This Class...');</script>";
              }
          }
          ?>