<?php
// Connessione al database
$servername = "localhost";
$username = "RaoulBova";
$password = "12345";
$dbname = "formula1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Recupera i dati dal form
$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT Username FROM utenti WHERE Username = '$username'";
$result = $conn->query($sql);

if (!$result->num_rows > 0) {
    //    query per inserire i dati nel database
    $sql = "INSERT INTO utenti (Username, Password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Dati inseriti correttamente nel database.";
    } else {
        echo "Errore nell'inserimento dei dati: " . $conn->error;
    }
}else{
    echo "L'utente esiste già";
}


$conn->close();
?>
