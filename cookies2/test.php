<?php
function cancellaCookie($nomeCookie)
{
    unset($_COOKIE[$nomeCookie]);
    setcookie($nomeCookie,"",time()-86400);
}
if(isset($_POST["comando"]) AND $_POST["comando"]=="cancella"){
    cancellaCookie("dato");
} elseif (isset($_POST["comando"]) AND $_POST["comando"]=="imposta"){
    $scadenza=(int) $_POST["expire"] + time();
    setcookie("dato", $_POST["dato"],$scadenza, "/test/");
    $_COOKIE["dato"]=$_POST["dato"];
}
?>


<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Impostiamo e cancelliamo i cookie</title>
</head>
<body>

<?php
    if(isset($_COOKIE["dato"])){
        echo "Cookie impostato per ricordare il seguente dato = \"".$_COOKIE["dato"]."\"";

?>

<br><br>
<form name="deletecookie" action="test.php" method="post">
    <input type="hidden" name="comando" value="cancella">
    <input type="submit" value="Cancella cookie">
</form>
<?php
} else {
?>

<form name="writecookie" action="test.php" method="post">

    <table width="400" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td>Dato da memorizzare</td>
            <td><input type="text" name="dato" value=""></td>
        </tr>
        <tr>
            <td>Scadenza del cookie</td>
            <td><input type="text" name="expire" value=""></td>
        </tr>
        <tr>

            <td><input type="submit" value="Imposta cookie"></td>
            <td></td>
        </tr>
    </table>
    <input type="hidden" name="comando" value="imposta">
</form>
<?php
    }
?>

</body>
</html>
