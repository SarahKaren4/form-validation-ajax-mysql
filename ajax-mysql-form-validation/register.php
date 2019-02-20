<?php
//--------- YOUR MYSQL CONNECTION SETTINGS
$servername = "localhost";
$database = "test";
$username = "root";
$password = "";
$ip = $_SERVER['REMOTE_ADDR'];
$domain = $_SERVER['SERVER_NAME'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$server = $_SERVER['PHP_SELF'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo $server;
//mysqli_close($conn);
?>
<html>
<head>
<style>
.indispo {
	color:red;
}
.dispo {
	color:green;
}
</style>
</head>

<body>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	jQuery.ajax({
	url: "verif.php",
	data:'nom='+$("#nom").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
	},
	error:function (){}
	});
}
</script>
<script>
function checkAvailability1() {
	jQuery.ajax({
	url: "verif.php",
	data:'prenom='+$("#prenom").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status1").html(data);
	},
	error:function (){}
	});
}
</script>







<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<h2><p align='center' >S' inscrire<p></h2><br>
    </div>
<form method='post'>
<div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
          <input type="text" name="nom" class="form-control" placeholder="Nom" id='nom' onBlur="checkAvailability()"><br><span id="user-availability-status"></span><br>
        </div>
				<div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
          <input type="text" name="prenom" class="form-control" placeholder="Prenom" id='prenom' onBlur="checkAvailability1()"><br><span id="user-availability-status1"></span><br>
        </div>
        <input type='submit' >
</form>
<?php

  if(!empty($_POST['nom']) and !empty($_POST['prenom'])) {
    $nom = addslashes($_POST ['nom']);
    $prenom = addslashes($_POST ['prenom']);
    mysqli_query($conn,'insert into user (id, nom, prenom) values ("","'.$nom.'", "'.$prenom.'" )');       
echo'<script>alert("Inscription validee");</script>'; 
    }else{
        echo "<script>alert('Remplissez a nouveau le formulaire');</script>";

      }
      mysqli_close($conn);
  ?>
	</html>
</body>
