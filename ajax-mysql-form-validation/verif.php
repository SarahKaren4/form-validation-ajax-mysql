
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



<?php
//require_once("DBController.php");
//$db_handle = new DBController();


if(!empty($_POST["nom"])) {
  $nom = $_POST['nom'];
  $query = mysqli_query($conn, "SELECT * FROM user WHERE nom ='$nom'");
  $rows = mysqli_num_rows($query);
        if($rows==1){
        $array = $query->fetch_assoc();
       echo "<span class='indispo'>".$nom." est indisponible.</span>"; 
        }else{
        echo "<span class='dispo'>".$nom." est disponible.</span>";

        }
}

if(!empty($_POST["prenom"])) {
  $prenom = $_POST['prenom'];
  $query = mysqli_query($conn, "SELECT * FROM user WHERE prenom ='$prenom'");
  $rows = mysqli_num_rows($query);
        if($rows==1){
        $array = $query->fetch_assoc();
       echo "<span class='indispo'>".$prenom." est indisponible.</span>"; 
        }else{
        echo "<span class='dispo'>".$prenom." est disponible.</span>";

        }
}


?>