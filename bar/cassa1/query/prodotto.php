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
        <form method="post" action="prodotto.php">
            <label> Nome: </label><input type="text" name="prodotto"/><br/>
            <label> Categoria: </label><select name="cat">
                <option value="0">Scegli categoria...</option>
                <?php
                include 'connessione.php';                             
                try {
                    $sql = "SELECT * FROM categoria";
                    foreach ($connessione->query($sql) as $row) {
                        echo("<option value=\"".$row['id']."\">".$row['nome']."</option>");
                    }
                    
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                ?>
            </select><br/>
            <label> prezzo: </label><input type="text" name="prezzo"/><br/>
            <button type="submit" name="Sevento" class="btn btn-primary"> Crea</button>
        </form>
        <?php
       if(isset($_POST['prodotto'])) {
           if($_POST['cat'] != 0) {
            $nome = $_POST['prodotto'];
            $cat = $_POST['cat'];
            $prezzo = $_POST['prezzo'];
            $_POST['prodotto']= "";
            $_POST['cat']= "";
            $_POST['prezzo']= "";
            
            include 'connessione.php';                             
            try {
            $sql = "INSERT INTO `prodotto` (`id`, `nome`, `prezzo`, `id_categoria`, `disponibilita`, `vendita`) VALUES (NULL, '$nome', '$prezzo', '$cat', NULL, '1')";
            // use exec() because no results are returned
            $connessione->query($sql);
            echo "New record created successfully";
            }
            catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }
            $connessione = null;
        }
        else{
            ?>
            <script>
                alert("Scegliere Una categoria");
            </script>
            <?php
        }
       }
        ?>
    </body>
</html>
