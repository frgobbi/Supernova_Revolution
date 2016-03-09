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
        <style type="text/css">

            div.img {
                align-content: center;
                margin: 10px;
                border: 1px solid #ccc;
                float: left;
                width: 300px;
                height: 120px;
                margin-bottom: 150px;
            }	

            div.img:hover {
                border: 1px solid black;
            }

            div.img img {
                width: 100%;
                height: auto;
            }

            .desc {
                width: 298px;
                height: 70px;
                background-color: white; 
                padding: 15px;
                font-size: 25px;
                text-align: center;
               
            }
        </style>
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
                     <h1 id="title">Supernova Revolution</h1>
                     <br><br>
			<div class="row">
                                
                                <div class="col-xs-11 col-xs-offset-1">

                                    <?php
                                    require("../ComponentiBase/TipoStaff.php");

                                    scegliStaff($_SESSION['tipo'],$_SESSION['sesso']);
                                    ?>
                                </div>
                            </div>
			</div>
		</div>
    </body>
</html>
