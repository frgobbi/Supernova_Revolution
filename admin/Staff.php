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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" type="text/css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="../librerie/CSS/partibase.css" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="java-script/metodi.js" type="text/javascript"></script>
        <style type="text/css">
            .sezioni{
                border: 2px solid orange;
                -moz-border-radius: 8px;
                -webkit-border-radius: 8px;
                overflow-y: auto;
            }
            #form{
                margin: 50px 20px 20px 20px;
            }
            .riquadri{
                margin: 20px;
            }
            #ADDSTaff{
                width: 97%;
            }
            #popupBox {
                left: 8%;
                display: none;
                position: fixed;
                margin-left: auto;
                margin-right: auto;
                margin-top: 50px;
                width: 90%;
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
    </head>
    <body>
        <?php
        session_start();
        if ($_SESSION['login'] == TRUE) {
            
        } else {
            header("Location:../index.php");
        }
        ?>
        <div class="row">
            <div class="col-xs-2">
                <?php
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
                        require("barra.php");
                        navbar($_SERVER["PHP_SELF"]);
                        ?>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-3 col-md-3 sezioni">
                            <form role="form" method="post" action="metodi/IscrizioneStaff.php" enctype="multipart/form-data" id="form">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="form-group">
                                            <label for="nome">Nome:</label> <input placeholder="Nome" type="text" class="form-control" id="name" name="nome" />
                                        </div>
                                        <div class="form-group">
                                            <label for="cognome">Cognome:</label> <input placeholder="Cognome" type="text" class="form-control" id="cognome" name="cognome" />
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail:</label> <input placeholder="e-mail" type="email" class="form-control" id="email" name="email" />
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Username:</label> <input placeholder="username" type="text" class="form-control" id="user" name="user" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password:</label> <input placeholder="password" type="password" class="form-control" id="pass" name="pass" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sesso:</label><br />
                                    &nbsp; Maschio &nbsp;&nbsp;&nbsp; <input type="radio" name="sesso" value="maschio" /><br />
                                    &nbsp; Femmina &nbsp; <input type="radio" name="sesso" value="femmina" /><br />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto del Profilo:</label> 
                                    <input type="file" id="img" name="img" />
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <select name="tipo" class="form-control">
                                            <option>Scegli tipo staff...</option>
                                            <?php
                                            include "../connessione.php";
                                            try {
                                                foreach ($connessione->query("SELECT * FROM tipo_staff WHERE 1") as $row) {
                                                    echo("<option value=\"" . $row['id_staff'] . "\">" . $row['descrizione'] . "</option>");
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            $connessione = null;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <div class="col-xs-8">
                                        <select name="Sevento" class="form-control">
                                            <option>Scegli evento...</option>
                                            <?php
                                            include "../connessione.php";
                                            try {
                                                foreach ($connessione->query("SELECT * FROM evento WHERE 1") as $row) {
                                                    echo("<option value=\"" . $row['id_evento'] . "\">" . $row['nome_evento'] . "</option>");
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            $connessione = null;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br/><br/><br/>
                                <button type="submit" class="btn btn-primary">Iscrivi</button>
                            </form>
                        </div>

                        <div class="col-xs-8 col-md-8 col-xs-offset-1 col-md-offset-1">
                            <div class="sezioni">
                                <div id="tabella" class="riquadri">
                                    <table class="table table-bordered" id="tabS">
                                        <tr>
                                            <th>id</th>
                                            <th>nome</th>
                                            <th>cognome</th>
                                            <?php
                                            include '../connessione.php';
                                            try {
                                                foreach ($connessione->query("SELECT * FROM `evento` WHERE 1") as $row) {
                                                    echo("<th>" . $row['nome_evento'] . "</th>");
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            $connessione = null;
                                            ?>
                                        </tr>
                                        <?php
                                        include '../connessione.php';
                                        $staff = array();
                                        try {
                                            foreach ($connessione->query("SELECT * FROM `staff` WHERE 1") as $row) {
                                                $staff[] = array($row['nome'], $row['cognome'], $row['id_evento']);
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                        $connessione = null;
                                        $id = 1;
                                        for ($i = 0; $i < count($staff); $i++) {
                                            echo("<tr>");
                                            echo("<td>$id</td>");
                                            echo("<td>" . $staff[$i][0] . "</td>");
                                            echo("<td>" . $staff[$i][1] . "</td>");

                                            include'../connessione.php';
                                            try {
                                                $sql = "SELECT * FROM `evento` WHERE 1";
                                                foreach ($connessione->query($sql) as $row) {
                                                    if ($row['id_evento'] == $staff[$i][2]) {
                                                        echo("<td><input type=\"radio\" name=\"evento" . $id . "\" value=" . $row['id_evento'] . " checked></td>");
                                                    } else {
                                                        echo("<td><input type=\"radio\" name=\"evento" . $id . "\" value=" . $row['id_evento'] . "></td>");
                                                    }
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                            $connessone = null;

                                            $id++;
                                            echo("</tr>");
                                        }
                                        ?>
                                    </table>
                                    <?php
                                    $num = count($staff);
                                    echo("<button type=\"button\" class=\"btn btn-primary bln-lg\" onclick=\"aggiorna($num)\">AGGIORNA</button>");
                                    ?>
                                </div>
                            </div>
                            <br/><br/><br/>
                            <button class="btn btn-primary btn-lg btn-block" id="Ppopup"  onclick="GPopup()" >Gestisci Compiti &amp; Elimina Staff</button>

                        </div>
                    </div>
                </div>
            </div>
            <div id="popupBox">
                <div>
                    <div id="ADDSTaff">
                        <table class="table table-bordered riquadri" id="tabT">
                            <tr>
                                <th>id</th>
                                <th>nome</th>
                                <th>cognome</th>
                                <?php
                                include '../connessione.php';
                                try {
                                    foreach ($connessione->query("SELECT * FROM `tipo_staff` WHERE 1") as $row) {
                                        echo("<th>" . $row['descrizione'] . "</th>");
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                $connessione = null;
                                ?>
                                <th>ELIMINA</th>
                            </tr>
                            <?php
                            include '../connessione.php';
                            $Tstaff = array();
                            try {
                                foreach ($connessione->query("SELECT * FROM `staff` WHERE 1") as $row) {
                                    $Tstaff[] = array($row['nome'], $row['cognome'], $row['id_staff'], $row['username']);
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            $connessione = null;
                            $id = 1;
                            for ($i = 0; $i < count($staff); $i++) {
                                echo("<tr>");
                                echo("<td>$id</td>");
                                echo("<td>" . $Tstaff[$i][0] . "</td>");
                                echo("<td>" . $Tstaff[$i][1] . "</td>");

                                include'../connessione.php';
                                try {
                                    $sql = "SELECT * FROM `tipo_staff` WHERE 1";
                                    foreach ($connessione->query($sql) as $row) {
                                        if ($row['id_staff'] == $Tstaff[$i][2]) {
                                            echo("<td><input type=\"radio\" name=\"funzione" . $id . "\" value=" . $row['id_staff'] . " checked></td>");
                                        } else {
                                            echo("<td><input type=\"radio\" name=\"funzione" . $id . "\" value=" . $row['id_staff'] . "></td>");
                                        }
                                    }
                                    echo("<td><input type=\"checkbox\" name=\"elimina\" value=\"" . $Tstaff[$i][3] . "\"></td>");
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                $id++;
                                echo("</tr>");
                            }
                            ?>
                        </table>
                        <?php
                        $num = count($Tstaff);
                        echo("<button id=\"bottone\" type=\"button\" class=\"btn btn-primary bln-lg\" onclick=\"staff($num)\">AGGIORNA</button>");
                        ?>
                    </div>
                </div>
            </div>     
            <div id="overlay"></div>
        </div>
    </body>
</html>