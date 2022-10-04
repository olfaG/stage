
<?php

$servername = "localhost"; 
            $username = "root";
            $password = "";
            $database = "stage";

            // créer la connexion 
            $connection = new mysqli($servername,$username,$password,$database);

            // lire les lignes de la table sql
            $sql = "SELECT * FROM ajout_stag";
            $result = $connection ->query($sql);

            if (!$result){
                die("invalid query: ".$connection->error);
            
            }

            //lire les données pour chaques lignes 
            while ($row = $result->fetch_assoc()){

                echo "
                <br>
                <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['inscription']; ?></td>
            <td><?php echo $row['leçons']; ?></td>
            <td><?php echo $row['chapitres']; ?></td>
            <td><?php echo $row['modules']; ?></td>
            <td><?php echo $row['quizz']; ?></td>
            <td><?php echo $row['points']; ?></td>
            <td><?php echo $row['dercon']; ?></td>
        </tr>";
            }

           