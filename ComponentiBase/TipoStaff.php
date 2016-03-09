<?php
 function scegliStaff($tipo, $sesso){ 
     echo("<div width=\"750\">");

        include "../connessione.php";
                    
        // esecuzione della query per la selezione dei record
        // query argomento del metodo query()
        try{
            foreach ($connessione->query("SELECT * FROM funzioni_staff INNER JOIN funzioni on funzioni_staff.id_funzione = funzioni.id_funzione WHERE id_staff = $tipo") as $row) {
                
                echo("<div class=\"img\">");
                echo("<a href=\"../".$row['src']."\"fjords.jpg\">");
                echo("<img src=\"../".$row['foto']."\">");
                echo("</a>");
                echo("<div class=\"desc\">".$row['nome_funzione']."</div>");
                echo("</div>");
            }
        }
        catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        }
        
        $connessione = null;
        
      
        echo("<div class=\"img\">");
        echo("<a href=\"../gestioneUtente/gestioneUtente.php\">");
        $app =strcasecmp($sesso,"maschio");
        if($app ==0){
            echo("<img src=\"../immagini/loghi/utentelogoM.png\">");
        }
        else{
           echo("<img src=\"../immagini/loghi/utentelogoF.png\">"); 
        }
        echo("</a>");
        echo("<div class=\"desc\">Gestione Utente</div>");
        echo("</div>");
        
    echo("</div>");
 }

