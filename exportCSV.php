<?php 

//configuration de la base de donnée
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "stage"; 
 
// création de la connexion
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// vérifier la connexion
if ($db->connect_error) { 
    die("erreur de connexion: " . $db->connect_error); 
}
 
// Récupérer les éléments de la base de données 
$query = $db->query("SELECT * FROM ajout_stag ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "stag_" . date('Y-m-d') . ".csv"; 
     
    // créer un dossier
    $f = fopen('php://memory', 'w'); 
     
    // Définir les en-têtes de colonne 
    $fields = array('NOM','PRENOM', 'adresse mail', 'DATE D\'inscription', 'Nombre de leçons', 'Nombre de chapitres', 'Nombre de modules', 'nombre de quizz', 'nombre de points','dernière connexion'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Sortie de chaque ligne de données, conversion de la ligne en csv et écriture dans le dossier du fichier. 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['inscription'], $row['leçcons'], $row['chapitres'], $row['modules'],$row['quizz'],$row['points'],$row['dercon']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Retourner au début du fichier 
    fseek($f, 0); 
     
    // Définir les en-têtes pour télécharger le fichier plutôt que de les afficher 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //sortie de toutes les données restantes sur le dossier du fichier 
    fpassthru($f); 
} 
exit; 
 
?>
