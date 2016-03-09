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
        $db->beginTransaction();

        // esecuzione delle query
        $sql = $db->exec("DROP TABLE recapiti");
        $sql = $db->exec("UPDATE anagrafica SET nome = 'Rossi' WHERE id = 1");

        // ritorno alla situazione precedente
        $db->rollBack();
        ?>
    </body>
</html>
