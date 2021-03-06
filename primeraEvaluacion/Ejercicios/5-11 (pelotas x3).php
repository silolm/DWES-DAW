<html>
<head>
    <title>
        Simulador de paloma mensajera
    </title>
    <link rel="stylesheet" type="text/css" href="common.css"/>
    <style type="text/css">
        div.map {
            float: left;
            text-align: center;
            border: 1px solid #666;
            background-color: #fcfcfc;
            margin: 5px;
            padding: 1em;
        }

        span.casa, span.paloma, span.paloma2 {
            font-weight: bold;
            color: red;
        }

        span.aire {
            color: blue;
        }

    </style>
</head>
<body>

<h1>
    <?php

    $tamanyoMapa = 10;

    # Posicionar la paloma

    do {
        $pelotaX = rand(0, $tamanyoMapa - 1);
        $pelotaY = rand(0, $tamanyoMapa - 1);

        $pelotaX2 = rand(0, $tamanyoMapa - 1);
        $pelotaY2 = rand(0, $tamanyoMapa - 1);

        $pelotaX3 = rand(0, $tamanyoMapa - 1);
        $pelotaY3 = rand(0, $tamanyoMapa - 1);

        $direccionX = 1;
        $direccionY = 1;

        $direccionX2 = 1;
        $direccionY2 = 1;

        $direccionX3 = 1;
        $direccionY3 = 1;

        $contadorDeRebotes = 0;


    } while ( ( abs( $pelotaX - $tamanyoMapa) < $tamanyoMapa / 2) && ( abs( $pelotaY - $tamanyoMapa) < $tamanyoMapa / 2) &&
              abs( $pelotaX2 - $tamanyoMapa) < $tamanyoMapa / 2 && ( abs( $pelotaY2 - $tamanyoMapa) < $tamanyoMapa / 2) &&
              ( abs( $pelotaX3 - $tamanyoMapa) < $tamanyoMapa / 2) && ( abs( $pelotaY3 - $tamanyoMapa) < $tamanyoMapa / 2));
    # Con la línea precedente nos aseguramos de que la posición inicial de la paloma
    # y su casa disten como mínimo la mitad del mapa. La función abs() devuelve el valor
    # absoluto, esto es, la cifra sin signo.

    do {
        #Acercar la paloma a su casa

        $unChoque = false;

        if ($pelotaX + $direccionX == $tamanyoMapa || $pelotaX + $direccionX == -1) {
            $direccionX *= -1;
            $unChoque = true;
        }
        if ($pelotaY + $direccionY == $tamanyoMapa || $pelotaY + $direccionY == -1) {
            $unChoque = true;
            $direccionY *= -1;
        }

        if ($pelotaX2 + $direccionX2 == $tamanyoMapa || $pelotaX2 + $direccionX2 == -1) {
            $direccionX2 *= -1;
            $unChoque = true;
        }
        if ($pelotaY2 + $direccionY2 == $tamanyoMapa || $pelotaY2 + $direccionY2 == -1) {
            $unChoque = true;
            $direccionY2 *= -1;
        }

        if ($pelotaX3 + $direccionX3 == $tamanyoMapa || $pelotaX3 + $direccionX3 == -1) {
            $direccionX3 *= -1;
            $unChoque = true;
        }
        if ($pelotaY3 + $direccionY3 == $tamanyoMapa || $pelotaY3 + $direccionY3 == -1) {
            $unChoque = true;
            $direccionY3 *= -1;
        }

        if ($unChoque) $contadorDeRebotes++;

        $pelotaX += $direccionX;
        $pelotaY += $direccionY;

        $pelotaX2 += $direccionX2;
        $pelotaY2 += $direccionY2;

        $pelotaX3 += $direccionX3;
        $pelotaY3 += $direccionY3;


        #Mostrar el mapa actual
        echo '<div class="map" style="width: ' . $tamanyoMapa . 'em;"><pre>';
        # Recuérdese que con la etiqueta <pre> los saltos de línea que haya se reflejan en la pantalla

        for ($y = 0; $y < $tamanyoMapa; $y++) {
            for ($x = 0; $x < $tamanyoMapa; $x++) {
                if ($x == $pelotaX && $y == $pelotaY) {
                    echo '<span class="paloma">1</span>'; #Paloma
                } else if ($x == $pelotaX2 && $y == $pelotaY2) {
                    echo '<span class="paloma">2</span>'; #Paloma
                } else if ($x == $pelotaX3 && $y == $pelotaY3) {
                    echo '<span class="paloma">3</span>'; #Paloma
                } else {
                    echo '<span class="aire">.</span>'; #Aire
                }

                echo ( $x != $tamanyoMapa - 1) ? " " : ""; #siempre se añade un carácter de espacio en cada celda, salvo al final.
            }

            echo "\n"; #Salto de línea. como se está dentro de un <pre>, se reflejará en la pantalla.
        }

        echo "X=$pelotaX Y=$pelotaY";
        echo "<br>X2=$pelotaX2 Y2=$pelotaY2";
        echo "<br>X3=$pelotaX3 Y3=$pelotaY3";

        echo "</pre>rebotes= $contadorDeRebotes</div>\n ";


    } while ($contadorDeRebotes < 6);

    ?>

</h1>

</body>

</html>