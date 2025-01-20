<div class="container">
    <h2>Wijzig Leveranciergegevens</h2>
    <form action="<?= URLROOT; ?>/leverancier/update/<?= $data['leverancier']->Id; ?>" method="post">
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" name="naam" class="form-control" value="<?= $data['leverancier']->naam; ?>">
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
        <button type="submit" class="btn btn-success">Sla op</button>
    </form>
</div>