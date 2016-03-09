<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Supernova Revolution</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
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
</style>
<style>
.carousel-inner > .item > img,
.carousel-inner > .item > img{
    width: 70%;
    margin: auto;
}
</style>
    
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                            <h1 align="center" id="title">
                                    Supernova Revolution
                            </h1>
                    </div>
            </div>
            <br><br><br>
	<div class="row">
            <div class="col-md-2 col-md-offset-1"  id="login">
                <form method="post" action="login/login.php">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" class="form-control" id="user" name="user"/>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" />
                    </div>
                        <button align="center" type="submit" class="btn btn-primary btn-lg btn-block
                                ">Entra</button>
                </form>
                <br>
                <button class="btn btn-primary btn-block btn-lg" onclick="window.location.href='./login/badge/badge.html'">Usa il Badge</button>
            </div>
            <br/><br/>
            <div class="col-md-8 col-md-offset-1">
                    <?php
                    echo("<div id=\"myCarousel\" class=\"carousel slide\"\" data-ride=\"carousel\">");
                    $cartella="immagini/immaginigalleria";
                    $elencoFile = array();				
                    if($handle = opendir($cartella))
                    {
                        while (($file = readdir($handle))!==false)
                        {
                            if ($file != "." && $file != "..")
                            {
                                $elencoFile[] = $file;
                            }
                        }
                    }
                    closedir($handle);
                    
                        //Indicators
                    echo("<ol class=\"carousel-indicators\">");
                    echo("<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>");
                        for($i=1;$i<count($elencoFile);$i++){
                          echo("<li data-target=\"#myCarousel\" data-slide-to=\"".$i."\"></li>");
                        }
                    echo("</ol>");
                        
                        //Wrapper for slides
                        echo("<div class=\"carousel-inner\" role=\"listbox\">");
                        echo("<div class=\"item active\">");
                        echo("<img src=\""."immagini/immaginigalleria/".$elencoFile[0]."\"width=\"400\" height=\"325\">");
                        echo("</div>");

                        for($i=1;$i<count($elencoFile);$i++){
                          echo("<div class=\"item\">");
                          echo("<img src=\""."immagini/immaginigalleria/".$elencoFile[$i]."\"width=\"400\" height=\"325\">");
                          echo("</div>");
                        }
                        echo("</div>");

                        //Left and right controls
                        echo("<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">");
                        echo("<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>");
                        echo("<span class=\"sr-only\">Previous</span>");
                        echo("</a>");
                        echo("<a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">");
                        echo("<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>");
                        echo("<span class=\"sr-only\">Next</span>");
                        echo("</a>");
                        echo("</div>");
                    ?>
      
            </div>
	</div>
    </div>
    </body>
</html>
