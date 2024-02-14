<html>
<body>
    <h1> Accesso eseguito al database formula1 </h1>

    <form id="filterForm">
      <p>Filtro per nome e cognome dei piloti</p>
      <p>(il filtro cerca se esiste quella stringa in nome o cognome)</p>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="Max">

    <label for="cognome">Cognome:</label>
    <input type="text" id="cognome" name="cognome" placeholder="Verstappen">

    <br>
    <br>

    <input type="radio" id="radio" name="opzione" value="opzione1" checked> Di inserimento
    <input type="radio" id="radio" name="opzione" value="opzione2"> Alfabetico

    <button type="button" onclick="applicaFiltri()">Applica Filtri</button>
  </form>

  <div id="risultati">
    <!-- Qui verranno visualizzati i risultati filtrati dal database -->
  </div>

  <script>
    function applicaFiltri() {
      var nome = document.getElementById('nome').value;
      var cognome = document.getElementById('cognome').value;
      var check = document.getElementById('radio').value;

      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('risultati').innerHTML = xhr.responseText;
        }
      };

      xhr.open('GET', 'filtra.php?nome=' + nome + '&cognome=' + cognome + '&opzione=' + check, true);
      xhr.send();
    }
  </script>

<!--
<?php
$servername = "localhost";
$username = "RaoulBova";
$password = "12345";

try {
  $conn = new PDO("mysql:host=$servername;dbname=formula1", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $sql = 'SELECT *
		FROM piloti';
        //WHERE Cognome LIKE "V%"';
        //WHERE Cognome LIKE :type';

  $statement = $conn->prepare($sql);
  $band_type='Verstappen';
  $statement->bindParam(':type', $band_type, PDO::PARAM_STR);
  $statement->execute();
  $data = $statement->fetchAll();
  
  foreach ($data as $row) {
    echo $row['Id']."<br />\n";
    echo $row['Nome']."<br />\n";
    echo $row['Cognome']."<br />\n";
  }

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//close the connection
$conn = null;
?>

-->
</body>
</html>
