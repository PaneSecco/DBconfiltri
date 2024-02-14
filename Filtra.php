<?php
// Connessione al database (sostituisci con le tue credenziali)
$servername = "localhost";
$username = "RaoulBova";
$password = "12345";
$dbname = "formula1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recupera i filtri dalla query string
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$cognome = isset($_GET['cognome']) ? $_GET['cognome'] : '';
$opzione = isset($_GET['opzione']) ? $_GET['opzione'] : '';

// Esegui la query con i filtri

$sql = "SELECT * FROM piloti WHERE nome LIKE '%$nome%' AND cognome LIKE '%$cognome%'";
if ($opzione == "opzione 2") {
    $sql .= " ORDER BY Nome DESC";
}

$result = $conn->query($sql);


if ($result !== false && $result->num_rows > 0) {
    // Visualizza i risultati
    echo "<body>";
    echo "<table>";
    echo "<thead>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Nome</th>";
        echo "<th>Cognome</th>";
        echo "<th>Data_di_nascita</th>";
        echo "<th>Team</th>";
        echo "<th>Numero</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo"<tr>";
            echo"<td>".$row["Id"]."</td>";
            echo"<td>". $row["Nome"]."</td>";
            echo "<td>" . $row["Cognome"]. "</td>";
            echo "<td>" . $row["Data_di_nascita"]. "</td>";
            echo "<td>" . $row["Team"]. "</td>";
            echo "<td>" . $row["Numero"]. "</td>";
            echo"</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</body>";
} else {
    echo "Nessun risultato trovato";
}

// Chiudi la connessione
$conn->close();
?>
