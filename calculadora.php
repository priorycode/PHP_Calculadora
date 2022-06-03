<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilo.css"/>
        <title>Calculadora</title>
    </head>
    <body>

        <?php
        $Oper = array("0", "1", "2", "3", "4",
            "5", "6", "7", "8", "9",
            "+", "-", "*", "/", "^",
            "(", ")", "R", "C", "=");
        $N = 0;
        if ($_POST) {
            $txtR = $_POST["txtResult"];
            for ($n = 0; $n < 20; ++$n) {
                if (isset($_POST["btn" . $n])) {
                    if ($n < 17)
                        $txtR = $txtR . $Oper[$n];
                    if ($n == 17) {
                        $L = strlen($txtR);
                        $txtR = substr($txtR, 0, $L - 1);
                    }
                    if ($n == 18)
                        $txtR = "";
                    if ($n == 19) {
                        $txtR = eval("return " . $txtR . ";");
                    }
                }
            }
        } else
            $txtR = "";
        ?>
    <center>
        <form method="POST">
            <h2>Calculadora</h2>
            <input type="text" name="txtResult" value="<?php echo $txtR ?>" size="25" />    
            <br>
            <?php
            $N = 0;
            for ($f = 0; $f < 4; ++$f) {
                for ($c = 0; $c < 5; ++$c) {
                    echo '<input type = "submit" value = "' . $Oper[$N] . '" name = "btn' . $N . '" />';
                    ++$N;
                }
                echo '<br>';
            }
            ?>
        </form> 
    </center>
</body>
</html>
