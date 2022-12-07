<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // Tilkoblingsinformasjon
    $tjener = "localhost";
    $brukernavn = "root";
    $passord = "root";
    $database = "mydb"; //Endre på denne til din database

    // Opprette en kobling
    $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

    // Sjekk om koblingen virker
    if($kobling->connect_error) {
        die("Noe gikk galt: " . $kobling->connect_error);
    } else {
        echo "Koblingen virker.<br>";
    }

    // Angi UTF-8 som tegnsett
    $kobling->set_charset("utf8");

    // Med linjeskift for 1 tabell    
    $sql = "SELECT * FROM personer"; //Skriv din sql kode her
    $resultat = $kobling->query($sql);

    while($rad = $resultat->fetch_assoc()) {
        $fornavn = $rad["fornavn"]; //Skriv ditt kolonnenavn her
        $telefonnummer = $rad["telefonnummer"];
        $gjenstandlånt = $rad["gjenstandlånt"];
        $lanersID = $rad["lanersID"];
        $etternavn = $rad["etternavn"];

        echo "<h3>Personer:</h3>
        <ul>
        <li>fornavn: $fornavn</li>
        <li>telefonnummer: $telefonnummer</li>
        <li>gjenstandlånt: $gjenstandlånt</li>
        <li>lanersID: $lanersID</li>
        <li>etternavn: $etternavn</li>
        </ul>  
      
      ";
    }
    
    
    ?>
</body>
</html>