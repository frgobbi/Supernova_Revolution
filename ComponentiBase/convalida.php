<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function convalida() {
    session_start();
    if ($_SESSION['login'] == TRUE) {
        echo("tutto a posto");
    } else {
        header("Location:../index.php");
    }
}
