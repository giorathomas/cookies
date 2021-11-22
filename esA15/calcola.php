<!doctype html>
<html lang="it">
<head>
    <title>Scontrino</title>
</head>
<body>

<table border="1px">
    <tr>
        <th>Piatto Scelto</th>
        <th>Quantità e Prezzo Totale</th>
    </tr>

    <?php
    $valoreCookie="";
    $prezzoTotale=0;
    include "DBEsA15.php";
    foreach ($pietanze as $k => $v) {

        foreach ($v as $k2 => $v2) {

            if (isset($_POST["c$k2"]) and $_POST["c$k2"] == "on") {
                if($k2!="domicilio"){
                $prezzoTotale += $v2 * $_POST["q$k2"];
                $current = $v2 * $_POST["q$k2"];
                $nel = $_POST["q$k2"];
                echo "<tr> 
                        <td>$k2</td>
                        <td>Quantità: $nel <br>
                            Prezzo totale articolo: $current euro
                        </td>
                      </tr>";
                if (strlen($valoreCookie == 0)) {
                    $valoreCookie .= $k2;
                } else {
                    $valoreCookie .= "<br>$k2";
                }
            } else {
                    $prezzoTotale += $v2;
                    $current = $v2;
                    echo "<tr> 
                        <td>$k2</td>
                        <td>Quantità: $nel <br>
                            Prezzo totale articolo: $current euro
                        </td>
                      </tr>";
                    if (strlen($valoreCookie == 0)) {
                        $valoreCookie .= $k2;
                    } else {
                        $valoreCookie .= "<br>$k2";
                    }
                }
        }
        }
    }
    echo "</table>";
        if(isset($_POST["cdomicilio"]) AND $_POST["cdomicilio"] == "on"){

            ?>

            <form action="esA15.php" method="post">
                <div style="border: 1px solid">
                <h3>Indirizzo di consegna</h3>
                Inserisci il tuo indirizzo per la consegna! <br>
                VIA <input type="text" name="via"> <br>
                NUMERO CIVICO <input type="text" name="nciv"> <br>
                CAP <input type="number" name="cap"> <br>
                COMUNE <input type="text" name="comune"> <br>
                PROVINCIA <input type="text" name="pro"> <br>
                    <input type="submit" value="Invia Ordine!">
                </div>
            </form>
            <?php
        }



    echo "Prezzo totale: $prezzoTotale euro";
    setcookie("ordine", "$valoreCookie");
    ?>

</body>
</html>
