<html>
<body>
<?php
session_start();

$n=$_REQUEST["Nome"];
$p=$_REQUEST["Password"];

$servername = "localhost";
$username = "RaoulBova";
$password = "12345";
$dbname = "formula1";

$conn = new mysqli($servername, $username, $password, $dbname);

/*
ChingChong
KequingMain

Desanta88
SonicTheHedgehog

FataEnchantix
WinxSupewmacy

MontagnoloMentale
Serenella

RomanianGirl69
SeggPazz

*/

$sql = "SELECT Username, Password FROM utenti WHERE Username = '$n' AND Password = '$p'";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    // L'utente è autenticato, impostalo nella sessione e reindirizzalo alla pagina protetta
    $_SESSION["UTENTE"] = $n;
    header("location:protetta.php");
    exit();
} else {
    // L'utente non è autenticato, pulisci la sessione e mostra un messaggio di errore
    unset($_SESSION["UTENTE"]);
    echo "Non autenticato";
}

$conn->close();
?>
</body>
</html>