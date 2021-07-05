<<<<<<< HEAD

<?php
use config\DB;

$q="select * from admins";
/*
$result=mysqli_query($con,$q);
if (mysqli_num_rows($result) > 0) {
  echo "success";
}
else{
  echo"check connection";
}
echo"<pre>";
echo $con;
echo"</pre>";
*/
$admin_name=$_GET['full_name'];
echo $admin_name;
?>
<div class="contaner-fluid">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
     <h1>Admin Login</h1>
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
</div>
=======
admin log in page 
>>>>>>> 45dd8b8710edf0ea14cb98377af651d9a277b4b7
