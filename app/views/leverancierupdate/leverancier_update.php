<!-- filepath: /c:/Users/moham/OneDrive - MBO Utrecht/leerjaar 2/us realiseer/periode 2/jamin mohamed azzouz/app/views/leverancierupdate/leverancier_update.php -->
<div class="container">
    <h2>Wijzig Leveranciergegevens</h2>
    <form action="<?= URLROOT; ?>/leverancierupdate/update/<?= $data['leverancier']->Id; ?>" method="post">
        <div class="form-group">
            <label for="Naam">Naam</label>
            <input type="text" name="Naam" class="form-control" value="<?= $data['leverancier']->naam; ?>">
        </div>
        <div class="form-group">
            <label for="ContactPersoon">Contactpersoon</label>
            <input type="text" name="ContactPersoon" class="form-control" value="<?= $data['leverancier']->ContactPersoon; ?>">
        </div>
        <div class="form-group">
            <label for="LeverancierNummer">Leveranciernummer</label>
            <input type="text" name="LeverancierNummer" class="form-control" value="<?= $data['leverancier']->LeverancierNummer; ?>">
        </div>
        <div class="form-group">
            <label for="Mobiel">Mobiel</label>
            <input type="text" name="Mobiel" class="form-control" value="<?= $data['leverancier']->Mobiel; ?>">
        </div>
        <div class="form-group">
            <label for="Straat">Straat</label>
            <input type="text" name="Straat" class="form-control" value="<?= $data['contact']->Straat; ?>">
        </div>
        <div class="form-group">
            <label for="Huisnummer">Huisnummer</label>
            <input type="text" name="Huisnummer" class="form-control" value="<?= $data['contact']->Huisnummer; ?>">
        </div>
        <div class="form-group">
            <label for="Postcode">Postcode</label>
            <input type="text" name="Postcode" class="form-control" value="<?= $data['contact']->Postcode; ?>">
        </div>
        <div class="form-group">
            <label for="Stad">Stad</label>
            <input type="text" name="Stad" class="form-control" value="<?= $data['contact']->Stad; ?>">
        </div>
        <button type="submit" class="btn btn-success">Sla op</button>
        <div>
            <a href='<?= URLROOT; ?>/leverancierupdate/edit/<?= $data['leverancier']->Id;?>' class="btn btn-primary">terug</a>
            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-primary">Homepage</a>
        </div>
    </form>
</div>