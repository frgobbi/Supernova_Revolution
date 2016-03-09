<?php
        $giorno = date("Y-m-d");
       if (isset($_POST['evento'])) {
           $b = 0;
           if($_POST['evento'] != 0){
            $evento = $_POST['evento'];
            $_POST['esento']= "";
            
            include '../connessione.php';
            try {
                    $sql = "SELECT * FROM `serata` WHERE `id_evento` = $evento";
                    foreach ($connessione->query($sql) as $row) {
                                                
                        $var = strcmp($giorno, $row['data']);
                        if($var == 0){
                        $b = 2;
                        }
                        } 
                
                     if($b == 2){
                    ?>
                    <script type="text/javascript">
                    alert("ERRORE \n serata già inserita!!");
                    </script>    
                    <?php
                    $_POST= [];
                    header( "refresh:0;url=index.php" );
                }   
                        
                    $sql = "SELECT * FROM `serata` WHERE `id_evento` = $evento";
                    foreach ($connessione->query($sql) as $row) {
                        if($row['chiusura'] == 0){
                        $b = 1;
                        }                
                        }
                
                if($b == 0){
                    if (!$connessione->query("INSERT INTO `serata` (`id_evento`, `data`, `chiusura`) VALUES ('$evento', NOW(), '0')")) {
                        ?>
                        <script type="text/javascript">
                        alert("ERRORE \n serata già inserita!!");
                        </script>    
                        <?php
                        header( "refresh:1;url=../index.php" );  
                    }
                    else {
                        ?>
                        <script type="text/javascript">
                        alert("Inserimenti effettuati correttamente."");
                        </script>    
                        <?php
                        header( "refresh:1;url=../index.php" ); 
                        }
                }
                if($b == 1){
                   ?>
                    <script type="text/javascript">
                    alert("ATTENZIONE!!!... \n ...CHIUDERE TUTTE LE SERATE!!");
                    </script>    
                   <?php 
                   header( "refresh:1;url=../index.php" );  
                }
                
            }
            catch(PDOException $e)
            {
            
            echo("<script type=\"text/javascript\">");
                    echo("alert(\"".$sql."<br>" . $e->getMessage()."\"");    
            echo("</script>"); 
            $connessione = null;
            header( "refresh:1;url=../index.php" );             
            }
            
           }
       }
