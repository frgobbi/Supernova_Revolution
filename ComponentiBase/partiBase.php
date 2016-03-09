<?php
    function intestazione(){ 
                    $nome= "";
                    $img ="";
                    $_SESSION['id']= 150000;
                    $_SESSION['sesso']="";
                    
                    include "../connessione.php";
                    
                    // esecuzione della query per la selezione dei record
                    // query argomento del metodo query()
                    try{
                        foreach ($connessione->query("SELECT * FROM `staff` WHERE 1") as $row) {
                            if ($row['username'] == $_SESSION['utente'] )
                                    {
                                        $nome = $row['nome']." ".$row['cognome'];
                                        $img = $row['foto'];
                                        $_SESSION['id_staff'] = $row['TipoStaff'];
                                        $_SESSION['sesso']= $row['sesso'];
                                        $_SESSION['tipo']= $row['id_staff'];
                                    }  
                        }
                    }
                    catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    }
                    $connessione = null;
        

                        require("nomi.php");
                        $vet = nomi($_SESSION['tipo']);
                        echo("<ul id=\"ull\">");
                        echo("<img id=\"imgP\" alt=\"Bootstrap Image Preview\" src=\"../$img\" class=\"img-circle\" />");
                        
                        echo("<li id=\"lil\" ><a class=\"active\" href=\"../gestioneUtente/Utente.php\">&nbsp;&nbsp;$nome</a></li>");
                        echo("<li id=\"lil\"><a href=\"../login/utente.php\">&nbsp;&nbsp;Home</a></li>");
                        for($i=0;$i<count($vet);$i++){
                        echo("<li id=\"lil\"><a href=\"../".$vet[$i][0]."\">&nbsp;&nbsp;".$vet[$i][1]."</a></li>");
                        }
                        echo("<li id=\"lil\"><a href=\"../gestioneUtente/gestioneUtente.php\">&nbsp;&nbsp;Profilo</a></li>");
                        echo("<li id=\"lil\"><a href=\"../ComponentiBase/logout.php\">&nbsp;&nbsp;Logout</a></li>");
                        echo("</ul>");

                    
    }
                    
