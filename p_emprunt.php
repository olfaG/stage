
    <!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<?php
  
    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"><h1 class="text-start h1emprunt">stagiaires</h1></div>
        </div>
        <!-- barre de recherche-->
        <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      <meta charset="utf-8" />
<?php
 
$bdd = new PDO('mysql:host=localhost;dbname=stage;charset=utf8','root','');
 
$articles = $bdd->query('SELECT nom FROM ajout-stag ORDER BY id DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $bdd->query('SELECT nom FROM ajout-stag WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');
   if($articles->rowCount() == 0) {
      $articles = $bdd->query('SELECT nom FROM ajout-stag WHERE CONCAT(nom, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
   }
}
?>
<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<?php if($articles->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $articles->fetch()) { ?>
      <li><?= $a['nom'] ?></li>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>
    </form>
  </div>
</nav>
        <!--barre de recherche-->
        <!--ajout de stag-->
      

    <form action="table_emprunt.php" method="post">
       <div>
        <label for="">NOM</label>
       <input type="text" name="nom">
    </div>
     
       <div>
        <label for="">PRENOM</label>
       <input type="text" name="prenom">
    </div>
       <div>
        <label for="">ADRESSE MAIL</label>
       <input type="mail" name="email">
    </div>
       <div>
        <label for="">DATE D'INSCRIPTION</label>
       <input type="date" name="inscription">
    </div>
       <div>
        <label for="">NOMBRE DE Leçons:</label>
       <input type="number" name="leçons">
    </div>
       <div>
        <label for="">NOMBRE DE MODULES</label>
       <input type="number"name="modules">
    </div>
       <div>
        <label for="">NOMBRE DE CHAPITRES</label>
       <input type="number" name="chapitres">
    </div>
       <div>
        <label for="">NOMBRE DE QUIZZ</label>
       <input type="number" name="quizz">
    </div>
       <div>
        <label for="">NOMBRE DE POINTS</label>
       <input type="number" name="points">
    </div>
       <div>
        <label for="">DERNIERFE CONNEXION</label>
       <input type="date" name="dercon">
    </div>
    <input type="submit" value="envoyer" name="add">
    </form>
</body>
</html><!--ajout de stag-->
       
         <!-- -------------SEPARATOR------------------- -->
        <div class="row g-0 justify-content-center">
            <div class="col-md-12">
                <hr class="separation" >
            </div>
        </div>
        <!-- -------------PANNEL START------------------- -->
        <div class="row g-0 justify-content-center pannel_background ">
            
                <div class="col-1 pannel_config ">
                    <a href="" class="link-pannel" >ACTUALISER
                    <i class="fa fa-refresh fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
              
           
    
            
               
            
                <div class="col-1 pannel_config ">
                    <a href="exportCSV.php" class="link-pannel">EXPORT/CSV
                    <i class="fas fa-file-export fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
                <div class="col-1 pannel_config ">
                    <a href="" class="link-pannel"onclick="window.print()">IMPRIMER
                    <i class="fa fa-print fa-config fa-2xl fa-color" ></i>
                </a>
                </div>

            
        
        </div>
        <div class="row g-0 justify-content-between fts for_bakcground">
            <br>
        </div>
        <!-- -------------PANNED END------------------- -->
        <!-- -------------//////////////////////------------------- -->
        <!-- -------------SEPARATOR------------------- -->
        <div class="row g-0 justify-content-center">
            <div class="col-md-12">
                <hr class="separation" >
            </div>
        </div>
        
           
    
        <!-- -------------//////////////////////------------------- -->
        <div class="row g-0 justify-content-between fts ">
        
        </div>
        <!-- -------------START DATATABLE------------------- -->
        <div class="row g-0 justify-content-center">
            
                <table id="tableau_excel" class="table table-bordered" style="width:100%">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>NOM </th>
                <th>PRENOM</th>
                <th>Adresse mail</th>
                <th>DATE D'inscription</th>
                <th>Nombre de leçons</th>
                <th>Nombre de modules</th>
                <th>Nombre de chapitres</th>
                <th>Nombre de quizz</th>
                <th>Nombre de points</th>

                <th>DATE DE dernière connexion</th>
                
            </tr>
        </thead>
        <tbody>

            <!-- AFFICHER LA TABLE EMPRUNT -->
            <?php 
            include('show_data_emprunt.php');
            ?>

            <!-- ------------POUR L'IMPORT CSV-------------- -->

            <?php 
            include('show_data_csv.php');
            ?>
        
        </tbody>
    </table>
        </div>
    </div>

  <!-- -------------END DATATABLE------------------- -->
  
<script src="../../ressources/js/datatable_set.js"></script>
  <!-- JS SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>