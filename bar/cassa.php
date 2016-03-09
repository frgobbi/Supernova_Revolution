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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../librerie/CSS/partibase.css" type="text/css" />
        <link rel="stylesheet" href="cassa1/cssbottoni.css" type="text/css" />
        <link rel="stylesheet" href="cassa1/cssEHTML.css" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-2.2.0.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.12.0.js" type="text/javascript"></script>
        <script src="cassa1/conto.js" type="text/javascript"></script>
        
                <style type="text/css">

            #popupBox {
                left: 8%;
                display: none;
                position: fixed;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                width: 85%;
                height: auto;
                color: #000000;
                border: 5px solid #4E93A2;
                -moz-border-radius: 8px;
                -webkit-border-radius: 8px;
                background-color: #FFFFFF;
                z-index: 1000;
                overflow-y: auto;
            }

            #overlay {
                display: none;
                opacity: 0.5;
                background-color: black;
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                z-index: 999;
            }
        </style>

        <script>
            function GPopup() {

                $('#overlay').fadeIn('slow');
                $('#popupBox').fadeIn('slow');

                $('#overlay, .deleteMeetingCancel').click(function () {
                    $('#overlay').fadeOut('slow');
                    $('#popupBox').fadeOut('slow');
                    $('#popupContent').fadeOut('slow');


                });

            }
        </script>
        </head>
    <body>
        <div class="row">
            <div class="col-xs-2">
                <?php
                session_start();
                if($_SESSION['login']==TRUE){
                }
                else
                {
                 header("Location:../index.php" );
                }

                require("../ComponentiBase/partiBase.php");
                intestazione();
                ?>
            </div>
            <div class="col-xs-10">
                <h1 id="title">
                    Supernova Revolution
                </h1><br />
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        require("barrab.php");
                        navbar($_SERVER["PHP_SELF"]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <?php
        session_start();
        include "../connessione.php";
        try {
            $sql = "SELECT * FROM `staff` WHERE 1";
            if($_SESSION['utente']==$row['username']){
                $_SESSION['evento'] = $row['id_evento'];                
            }
        } catch (PDOException $e) {
            //  echo "Error: " . $e->getMessage();
        }
        $conn = null;
        ?>
        <div id="popupBox">
            <div class="row">
                <div class="col-xs-6" id="div_addSerata">
                    <button type="button" name="Sevento" class="btn btn-primary" onclick="#"> Crea Serata</button>
                </div>
                <div class="col-xs-6" id="divincasso"></div>
            </div>
            <div class="row">
                <div class="col-xs-12" id="div_table">
                    <form method="post" action="query/aggiorna.php">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>EVENTO</th>
                                    <th>DATA</th>
                                    <th>CHIUSURA</th>
                                    <th>MODIFICA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                include'../connessione.php';
                                try {
                                    $sql = "SELECT * FROM serata INNER JOIN evento on serata.id_evento = evento.id_evento";
                                    foreach ($connessione->query($sql) as $row) {
                                        echo("<tr>");
                                        echo("<td>" . $i . "</td>");
                                        echo("<td>" . $row['nome'] . "</td>");
                                        echo("<td>" . $row['data'] . "</td>");
                                        if ($row['chiusura'] == 0) {
                                            echo("<td>No</td>");
                                            echo("<td><input type=\"checkbox\" name=\"s" . $i . "\" value=\"modifica\"></td>");
                                        } else {
                                            echo("<td>Si</td>");
                                            echo("<td><input type=\"checkbox\" name=\"s" . $i . "\" value=\"modifica\"></td>");
                                        }
                                        echo("</tr>");
                                        $i++;
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                $conn = null;
                                ?>
                            </tbody>
                        </table>
                        <br/>
                        <button type="submit" class="btn btn-primary"> modifica</button>
                    </form>
                </div>
            </div>
        </div> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-11 col-md-offset-1">    
                    <br/><br/>
                    <textarea id="display"></textarea>&nbsp;&nbsp;&nbsp;
                    <button type="button" id="CONTO" onclick="GPopup()"></button>&nbsp;&nbsp;&nbsp;
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dnum">
                                <button type="button" id="num1" onclick="tastiera('1')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num2" onclick="tastiera('2')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num3" onclick="tastiera('3')"></button>&nbsp;&nbsp;&nbsp;
                                <br/><br/>
                                <button type="button" id="num4" onclick="tastiera('4')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num5" onclick="tastiera('5')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num6" onclick="tastiera('6')"></button>
                                <br/><br/>
                                <button type="button" id="num7" onclick="tastiera('7')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num8" onclick="tastiera('8')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num9" onclick="tastiera('9')"></button>
                                <br/><br/>
                                <button type="button" id="nump" onclick="tastiera('.')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num0" onclick="tastiera('0')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="num00" onclick="tastiera('00')"></button>
                                <br/><br/>
                            </div>
                            <div id="dbot">
                                <button type="button" id="sub" onclick="subtot()"></button><br/>
                                <button type="button" id="tot" onclick="tot()"></button><br/>
                                <button type="button" id="varie" onclick="varie()"></button>
                            </div>
                            <div id="auto">
                                <br/>
                                <button type="button" id="prosciutto" onclick="automatico(3, 'Torta Prosciutto')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="proepeco" onclick="automatico(3.5, 'Torta Prosciu. e Peco.')"></button>
                                <br/><br/>
                                <button type="button" id="salsicce" onclick="automatico(3, 'Torta Salsicce')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="stracchino_rucola" onclick="automatico(3.5, 'Torta Rucola e Strac.')"></button>
                                <br/><br/>
                                <button type="button" id="nutella" onclick="automatico(3, 'Torta Nutella')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="patatine" onclick="automatico(2, 'Patatine Fritte')"></button>
                                <br/><br/>
                                <button type="button" id="bibita" onclick="automatico(1.5, 'Bibita')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="analcolico" onclick="automatico(1.5, 'Ape. Analcolico')"></button>
                                <br/><br/>
                                <button type="button" id="alcolico" onclick="automatico(2, 'Ape. Alcolico')"></button>&nbsp;&nbsp;&nbsp;
                                <button type="button" id="superalcolico" onclick="automatico(2.5, 'Ape. Superalcolico')"></button>
                                <br/><br/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="cancella" onclick="cancella()"></button>&nbsp;&nbsp;&nbsp;
                            <button type="button" id="annulla" onclick="annulla()"></button>&nbsp;&nbsp;&nbsp;
                            <button type="button" id="dell" onclick="dell()"></button>
                        </div>
                    </div>
                    <div id="overlay"></div>
                </div>
            </div>
        </div>
                    </div>
                </div>
    </body>
</html>

