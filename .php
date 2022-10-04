<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$inscription = $_POST['inscription'];
$leçons = $_POST['leçons'];
$modules = $_POST['modules'];
$chapitres = $_POST['chapitres'];
$quizz = $_POST['quizz'];
$points = $_POST['points'];
$dercon = $_POST['dercon'];

// database connection
$conn = new mysqli ("localhost", "root", "","stage");
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
  
$conn = new mysqli ("localhost", "root", "","stage");
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
   
    if(isset($_POST['add'])){
        $stmt = $conn->prepare("INSERT INTO ajout_stag(nom, prenom, email, inscription, leçons,   modules,chapitres,-quizz, points, dercon) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssiiiiis", $nom, $prenom, $email, $inscription, $leçons, $modules, $chapitres, $quizz, $points, $dercon);
        $stmt->execute();
    //var_dump($stmt);
    echo"<h1 id='h1'>"."registration successfully"."</h1>";
    header("refresh:1; url=emprunt.php");
    }
    $stmt->close();
    $conn->close();
}
}



   
?>