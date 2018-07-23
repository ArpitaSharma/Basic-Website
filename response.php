<!DOCTYPE html>
<html>
<head>
<title> Form View</title>
</head>
<body background= "back.png" >

	<!-- Slide Show -->

<section>
  <img class="mySlides" src="pic1.jpg"
  style="width:100%">
  <img class="mySlides" src="pic2.jpg"
  style="width:100%">
  <img class="mySlides" src="pic3.jpg"
  style="width:100%">
  <img class="mySlides" src="pic4.jpg"
  style="width:100%">
</section>

<br><br><br>
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>
<center>
<form style=" border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:50%;
	text-align:left;">
   <h1><center><u> Your Details</u><center></h1>
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender =  $_POST['radio'];
$country =$_POST['country']; 
echo "<h2><font color='black' > Thanks ". $fname." Your Response Is Recorded ! </font></h2>";

echo "<h2><font color='black' >Your Submitted Details Are :<br><br>

First Name : ". $fname."<br><br> Last Name : ".$lname."<br><br> Gender : ".$gender."<br><br> Country Selected : ".$country."<br> <br> Your Feedback Is Kept Encrypted </font></h2>";


?>

<!-- Below Code Starts For ImageUpload -->
<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<h2><font color='black' >Uploaded Image is of Type - " . $check["mime"] . ".</b></font></h2>";
        $uploadOk = 1;
    } else {
        echo " <h2><font color='black' > Uploaded File is not an image.</b></font></h2>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo " <h2><font color='black' > Sorry, file already exists.</b></font></h2>";
    $uploadOk = 0;
}
// Check file size
if($_FILES["fileToUpload"]["size"] > 50000000000000) {
    echo "<h2><font color='black' > Sorry, your file is too large.</b></font></h2>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " <h2><font color='black' >Sorry, only JPG, JPEG, PNG & GIF files are allowed.</b></font></h2>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h2><font color='black' > Sorry, your file was not uploaded.</b></font></h2>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h2><font color='black' > The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</b></font></h2>";
    } else {
        echo "<h2><font color='black' > Sorry, there was an error uploading your file.</b></font></h2>";
    }
}
?>
<br>
<h2><a href = "Logout.php"  style="color: black"> Click here to Log out</a></h2>
</center>
</form>
</body>
</html>