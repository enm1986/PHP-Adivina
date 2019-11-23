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
        define("MIN", 1);
        define("MAX", 50);
        define("MAX_INTENTOS", 6);

        if (isset($_GET["adivinar"])) {
            $adivinar = $_GET["adivinar"];
            $intentos = $_GET["intentos"] - 1;
            $entrada = $_GET["numero"];
        } else {
            $adivinar = rand(MIN, MAX);
            $intentos = MAX_INTENTOS;
        }
        ?>

        <h2>Adivina el número</h2>
        <form method="get" action="">

            <?php
            // Añadir el número a adivinar y los intentos al html de forma oculta

            echo '<input type=hidden name="adivinar" value=' . $adivinar . '>';
            echo '<input type=hidden name="intentos" value=' . $intentos . '>';
            echo '<p>Adivina el numero entre ' . MIN . ' y ' . MAX . '</p>';
            ?>

            <p>Introduce un número </p>
            <p>Intentos restantes <?php echo $intentos ?></p>
            
            <input type="text" name="numero">
            <br><br>
            <input type="submit" name="submit" value="Envia">
            <br>
        </form>

        <?php
        if (isset($_GET["submit"])) {
            if ($intentos > 0) {
                if (empty($entrada)) {
                    echo"<script>alert('Debe introducir un número')</script>";
                } else {
                    if ($entrada > $adivinar) {
                        echo '<p>Demasiado grande</p>';
                    } elseif ($entrada < $adivinar) {
                        echo '<p>Demasiado pequeño</p>';
                    } else {
                        echo '<p>¡¡HAS ACERTADO!!</p>';
                    }
                }
                $intentos--;
            } else {
                echo '<p>No quedan intentos</p>';
            }
        }
        ?>
    </body>
</html>
