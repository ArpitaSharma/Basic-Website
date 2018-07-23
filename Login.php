


<?php
$connect = mysqli_connect("localhost","root","","myproject");
if(!($connect))
{
	echo"<br><h3>Error in connecting</h3>".mysqli_connect_error();
}
session_start();
if(isset($_POST['loginbtn']))
{
	
	$myuname = mysqli_real_escape_string($connect,$_POST['u_name']);
	$mypass = mysqli_real_escape_string($connect,$_POST['pass1']);
	
	$query = "SELECT * from `signup` WHERE email='$myuname'and password ='$mypass'";
	$result = mysqli_query($connect,$query);    
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myuname");
         $_SESSION['u_name'] = $myuname;
         
         header("location: form.php");
      }else {
			echo "<script>alert('invalid')</script>";
      }
   }
?>
?>
