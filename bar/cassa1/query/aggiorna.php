<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include'../connessione.php';
try {
    $sql = "SELECT * FROM serata INNER JOIN evento on serata.id_evento = evento.id";
    $i=1;
    foreach ($connessione->query($sql) as $row) {
        $key ="s".$i;
        $name = filter_input(INPUT_POST, $key,FILTER_SANITIZE_STRING);
        $var = strcmp($name, "modifica");
        if($var == 0){
            if($row['chiusura'] == 0 ){
                $serata = "'".$row['data']."'";
                $id = $row['id_evento'];
              if (!$connessione->query("UPDATE serata SET chiusura = 1 WHERE id_evento = $id AND data = $serata")) {
                    ?>
                  <script>
                      alert("Errore nell'aggiornamento");
                  </script>
                  <?php
                }

            }
             else{
             $serata = "'".$row['data']."'";
             $id = $row['id_evento'];
              if (!$connessione->query("UPDATE serata SET chiusura = 0 WHERE id_evento = $id AND data = $serata")) {
                    ?>
                  <script>
                      alert("Errore nell'aggiornamento");
                  </script>
                  <?php 
             }

                
        }      
    }
    $i++;
    }
    $connessione = null;
    header( "refresh:1;url=../index.php" );  
}
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
