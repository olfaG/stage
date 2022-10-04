<?php 

//configuration de la base de donnée
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "g2r_stock"; 
 
// création de la connexion
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// vérifier la connexion
if ($db->connect_error) { 
    die("erreur de connexion: " . $db->connect_error); 
}
 
// Récupérer les éléments de la base de données 
$query = $db->query("SELECT * FROM ajout_emprunt ORDER BY id ASC"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "emprunt_" . date('Y-m-d') . ".csv"; 
     
    // créer un dossier
    $f = fopen('php://memory', 'w'); 
     
    // Définir les en-têtes de colonne 
    $fields = array('NOM PRENOM', 'STATUT', 'PC', 'QUANTITE', 'DATE DE PRET', 'DATE DE RESTITUTION', 'VILLE', 'IP'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Sortie de chaque ligne de données, conversion de la ligne en csv et écriture dans le dossier du fichier. 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['nom'], $row['stag'], $row['emplo'], $row['model'], $row['qty'], $row['pret'],$row['retour'],$row['ip'],$row['ville']); 
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