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
        $navn = $_GET['navn'];
        $lånetidspunkt = $_GET['lånetidspunkt'];
        $tillatlanetid = $_GET['tillatlanetid'];
        $personer_lanersID = $_GET['personer_lanersID'];

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

        $sql = "INSERT INTO gjenstander (navn, lånetidspunkt, tillatlånetid, personer_lånersID) VALUES ('$navn', '$lånetidspunkt', '$tillatlanetid', '$personer_lanersID')";
        //echo "$sql";    
        if($kobling->query($sql)) {
            echo "Spørringen $sql ble gjennomført.";
        } else {
            echo "Noe gikk galt med spørringen $sql ($kobling->error).";
        }
        // Med linjeskift for 1 tabell    
        $sql = "SELECT * FROM gjenstander"; //Skriv din sql kode her
        $resultat = $kobling->query($sql);
        while($rad = $resultat->fetch_assoc()) {
            $navn = $rad["navn"]; //Skriv ditt kolonnenavn her
            $gjenstandID = $rad["gjenstandID"];
            $lånetidspunkt = $rad["lånetidspunkt"];
            $tillatlanetid = $rad["tillatlånetid"];
            $personer_lanersID = $rad["personer_lånersID"];
            
            echo "<h3>Utlånte gjenstander:</h3>
            <ul>
            <li>Navn: $navn</li>
            <li>Gjenstand: $gjenstandID</li>
            <li>Lånetidspunkt: $lånetidspunkt</li>
            <li>lånetid: $tillatlanetid</li>
            <li>personens ID: $personer_lanersID</li>
            </ul>  
          
          ";
        }
    
    
    ?>
</body>
</html>