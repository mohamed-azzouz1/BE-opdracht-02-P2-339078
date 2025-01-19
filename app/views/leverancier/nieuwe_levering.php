
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Levering</title>
</head>
<body>
    <h2>Nieuwe Levering</h2>
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h4> Leverings Informatie</h4>
            <h4>Naam leverancier : <?= $data["dataRows"][0]->LeverancierNaam ?></h4>
            <h4>Contact Persoon : <?= $data["dataRows"][0]->ContactPersoon ?></h4>
            <h4>Leverancier Nummer : <?= $data["dataRows"][0]->LeverancierNummer ?></h4>
            <h4>Mobiel : <?= $data["dataRows"][0]->Mobiel ?></h4>
        </div>
        <div class="col-2"></div>
    </div>
    <form action="nieuwe_levering.php" method="post">        
        <label for="aantal">Aantal:</label>
        <input type="text" name="aantal" id="aantal" required><br>
        
        <label for="leverdatum">Leverdatum:</label>
        <input type="date" name="leverdatum" id="leverdatum" required><br>
        
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>