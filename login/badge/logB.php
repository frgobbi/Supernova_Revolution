<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="generator" content="HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
        <title>
            Supernova Revolution
        </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
        <style type="text/css">
            body{
                background-color: #00BFFF;
            }
            #title{
                font-family: Snap ITC;
                font-size: 50px;
                color: #FF9900;
            }
            #login{
                border: 2px solid;
                border-color: orange;
                border-radius: 45px;
                padding: 25px;
            }
            #err{
                color: red;
            }
        </style>
    </head>
    <body>
       <?php
        session_start();
        // inclusione del file di connessione
        include "../../connessione.php";
        $_SESSION = array();

        $_SESSION['login']=FALSE;
        
        $cod = filter_input(INPUT_POST, "cod",FILTER_SANITIZE_STRING);
        
        try {
                $sql = "SELECT `nome`, `cognome`, `email`, `username`, `cod` FROM `staff` WHERE `cod` = '$cod' ";
                foreach ($connessione->query($sql) as $row){
                                        
                    $_SESSION['login']=TRUE;
                    //$_SESSION['utente']= filter_input(INPUT_POST, "user",PHP_SANITIZE_STRING);
                    $_SESSION['utente']= $row['username'];
                    header("refresh:1;url=../utente.php");
                                   
                }
            }
        catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $connessione = null;

        if ($_SESSION['login']!=TRUE)
        {
            echo("<script>");
            echo("alert(\"Login errato.... per favore riprovare! :-)\")");
            echo("</script>");

            echo("<div class=\"container-fluid\">");
            echo("<div class=\"row\">");
            echo("<div class=\"col-md-12\">");
            echo("<h1 align=\"center\" id=\"title\">Supernova Revolution</h1>");
            echo("</div>");
            echo("</div>");
            echo("<br><br><br>");
            echo("<div class=\"row\">");
            echo("<div class=\"col-md-4 col-md-offset-4\" id=\"login\">");
            echo("<form method=\"post\" action=\"logB.php\">");
            echo("<div class=\"form-group\">");
            echo("<label for=\"cod\">Codice Badge</label>");
            echo("<input type=\"password\" class=\"form-control\" id=\"cod\" name=\"cod\" />");
            echo("</div>");
            echo("<button align=\"center\" type=\"submit\" class=\"btn btn-primary btn-lg btn-block\">Entra</button>");
            echo("</form>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
            //questa funzione non aspetta il caricamento dell'alert
            //header("location:index.php");
        }
       ?>
    </body>
</html>
