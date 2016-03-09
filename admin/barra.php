<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function navbar($sitoattuale){

    $link = explode("/", $sitoattuale);
    $lunghezza = count($link);
    
    $opzioni = array(
        array("admin.php","home"),
        array("Staff.php","staff")
    );
echo("<nav class=\"navbar navbar-default\">");

    echo("<ul class=\"nav navbar-nav\">");
        for($i=0;$i<count($opzioni);$i++){
            $app =strcasecmp($link[($lunghezza-1)],$opzioni[$i][0]);
            if($app ==0){
                echo("<li class=\"active\"><a href=\"".$opzioni[$i][0]."\">".$opzioni[$i][1]."</a></li>");
            }
            else{
                echo("<li><a href=\"".$opzioni[$i][0]."\">".$opzioni[$i][1]."</a></li>");
            }
        }
    echo("</ul>");
echo("</nav>");

}


  //echo("<div class=\"container-fluid\">");
    /*echo("<div class=\"navbar-header\">");
      echo("<a class=\"navbar-brand\" href=\"#\">WebSiteName</a>");
    echo("</div>");*/
  //echo("</div>");
