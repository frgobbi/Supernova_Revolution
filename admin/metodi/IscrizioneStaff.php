<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        session_start();
                if($_SESSION['login']==TRUE){
                }
                else
                {
                 header("Location:../../index.php" );
                }
        
        //Genera codice Badge
        function generacod($nome, $cognome) {
            $b = 0;
            while ($b != 0) {
                $Cnome = substr($nome, 0, 1);
                $Cnome = strtoupper($Cnome);
                $Ccognome = substr($cognome, 0, 1);
                $Ccognome = strtoupper($Ccognome);
                $num = rand(0, 9);
                for ($i = 0; $i < 2; $i++) {
                    $num = $num . rand(0, 9);
                }

                $str = "";
                $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
                $max = count($characters) - 1;
                for ($i = 0; $i < 2; $i++) {
                    $rand = mt_rand(0, $max);
                    $str .= $characters[$rand];
                }
                $str = strtoupper($str);

                $cod = $Cnome . $Ccognome . $num . $str;

                include '../../connessione.php';
                try {
                    $sql = "SELECT COUNT(*) AS utenti FROM staff WHERE cod='$cod'";
                    if ($connessione->query($sql) == 0) {
                        $b = 1;
                    } else {
                        $b = 0;
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            $connessione = null;
            return($cod);
        }

        function caricamentoFoto($nome, $cognome, $sesso) {
            if ($_FILES['img']['name'] != "") {

                $nomeF = $_FILES['img']['name'];
                $estensione = $_FILES['img']['type'];

                $app = explode("/", $estensione);
                $ex = $app[1];

                $nomeF = $_FILES['img']['name'];
                //$nomeF =$matricola.".".$estensione;
                $foto = "immagini/imgstaff" . $nome . "_" . $cognome . "." . $ex;
                $tmpNome = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmpNome, "../../" . $foto);
            } else {
                $app = strcasecmp($sesso, "maschio");
                if ($app == 0) {
                    $foto = "immagini/imgstaff/profiloD.jpg";
                } else {
                    $foto = "immagini/imgstaff/profiloU.jpg";
                }
            }
            return $foto;
        }

        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $cognome = filter_input(INPUT_POST, "cognome", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
        
        $sesso = filter_input(INPUT_POST, "sesso", FILTER_SANITIZE_STRING);
        //$add = filter_input(INPUT_POST, "amministratore", FILTER_SANITIZE_STRING);
        $tipo = filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_NUMBER_INT);
        $evento = filter_input(INPUT_POST, "Sevento", FILTER_SANITIZE_NUMBER_INT);
        $Pfoto = caricamentoFoto($nome, $cognome, $sesso);
        $codice = generacod($nome, $cognome);

        include '../../connessione.php';
        try {
             $sql = $connessione->prepare("SELECT * FROM staff WHERE username='$user'");
            // esecuzione del prepared statement
            $sql->execute();
            // conteggio dei record coinvolti dalla query
            if($sql->rowCount() > 0){
                ?>
                <script>
                    alert("utente già inserito cambiare username");
                </script>

                <?php
                $connessione = null;
                header('Refresh: 1; url=../Staff.php');
                //header('Location: ../Staff.php');
            }
            else{
                if (!$connessione->query("INSERT INTO `supernova`.`staff` (`nome`, `cognome`, `email`, `username`, `password`, `sesso`, `data_iscrizione`, `foto`, `cod`, `id_evento`, `id_staff`) VALUES ('$nome', '$cognome', '$email', '$user', '$pass', '$sesso', NOW(), '$Pfoto', '$codice', '$evento', '$tipo')")) {
                    ?>
                <script>
                    alert("utente non inseito");
                </script>

                <?php
                $connessione = null;
                header('Refresh: 1; url=../Staff.php');
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        $connessione = null;
        header('Location: ../Staff.php');
        ?>
    </body>
</html>
