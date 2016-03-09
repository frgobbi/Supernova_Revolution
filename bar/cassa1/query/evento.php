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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-2.2.0.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.js" type="text/javascript"></script>
    </head>
    <body>
        <form method="post" action="evento.php">
            <label>evento</label><input type="text" name="nome_evento"/>
            <button type="submit" name="Sevento" class="btn btn-primary"> Crea</button>
        </form>
        <?php
        if (isset($_POST['nome_evento'])) {
            $nome = $_POST['nome_evento'];
            include 'connessione.php';
                
            // esecuzione della query per l'inserimento dei record
            if (!$connessione->query("INSERT INTO evento (id, nome) VALUES ('NULL', '$nome')")) {
              echo "Errore della query: " . $connessione->error . ".";
            }else{
              echo "Inserimenti effettuati correttamente.";
            }
            // chiusura della connessione
            $connessione = null;
        }
        ?>
    </body>
</html>
