<?php
     
 function nomi($tipo){
    $vet = array();
        include "../connessione.php";
                    
        // esecuzione della query per la selezione dei record
        // query argomento del metodo query()
        try{
            foreach ($connessione->query("SELECT * FROM funzioni_staff INNER JOIN funzioni on funzioni_staff.id_funzione = funzioni.id_funzione WHERE id_staff = $tipo") as $row) {
                            
                $vet[] = array($row['src'],$row['nome_funzione']); 
            }
        }
        catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        
        $connessione = null;
                    
    return $vet;
 }

