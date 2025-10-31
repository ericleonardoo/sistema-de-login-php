<?php
    if (isset($_POST['linguagens'])) {
        $linguagens = $_POST['linguagens'];
        echo "Você escolheu:<br>";
        foreach( $linguagens as $ling ) {
            echo " - $ling<br>";
        }
    } else {
        echo "Nenhuma linguagem foi selecionada.";
    }
?>