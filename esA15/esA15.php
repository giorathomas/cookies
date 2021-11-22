<!doctype html>
<html lang="it">
<head>
    <title>Ordinazione Ristorante - ES 15</title>
</head>
<body>

<h3>Esercizio 15 dispensa PHP</h3>
<p>Scrivere un modulo HTML per ordinare un menu ad un ristorante on-line. Il modulo deve
    contenere una serie di pietanze che possono essere scelte dall'utente ed il relativo prezzo. Il
    modulo deve chiamare lo script calcola.php che si occupa di calcolare il prezzo (incluso il
    costo del servizio a domicilio) del pranzo ordinato. Inoltre, lo script PHP restituisce in una
    tabella il menu ordinato dall'utente con il relativo costo.</p>

<hr>

<h1>Ordinazione Ristorante</h1>

<?php
    if(isset($_COOKIE["ordine"]) AND $_COOKIE["ordine"]!=""){
        echo "<hr>";
        echo "<h2>Bentornato! </h2>";
        $stringa=$_COOKIE["ordine"];
        echo "Il suo ultimo ordine è stato: $stringa";
        echo "<hr>";
        echo "<br>";
    } else {
        echo "<hr>";
        echo "<h2>Benvenuto! </h2>";
        echo "Seleziona dei piatti per ordinare!";
        echo "<hr>";
        echo "<br> <br>";
    }
?>

<form name="menu" method="post" action="calcola.php">

    <table border="1px">

        <tr>
            <th>Portata</th>
            <th>Piatti e prezzo</th>
            <th>Portata</th>
            <th>Piatti e prezzo</th>
        </tr>

        <?php
            include "DBEsA15.php";
            foreach ($servizi as $key => $value) {

                if($value=="antipasto" OR $value=="secondo" OR $value=="extra"){
                    echo "<tr> <td> $key</td>";
                } else {
                    echo "<td> $key</td>";
                }

                foreach ($pietanze as $k => $v) {

                    if($value==$k){
                    echo "<td>";
                            foreach ($v as $k2 => $v2){
                                if($k2!="domicilio") {
                                    echo "- $k2: $v2 euro
                                <input type='checkbox' name='c$k2'> <br>
                                Quantità: <input type='number' name='q$k2' min='0' value='0'><hr>";
                                } else {
                                    echo "- Consegna a $k2: $v2 euro
                                <input type='checkbox' name='c$k2'> <br>";
                                }
                            }

                    echo "</td>";
                            if($value=="primo" OR $value=="contorno"){
                                echo "</tr>";
                            }
                }
            }
            }
        ?>

    </table>

    <input type="submit" value="Ordina!">
</form>
</body>
</html>

