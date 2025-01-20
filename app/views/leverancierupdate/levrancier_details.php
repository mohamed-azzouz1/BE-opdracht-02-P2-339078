<div class="container">
    <h2>Leverancier Details</h2>
    <p>Naam: <?= $data['leverancier']->naam; ?></p>
    <p>Contactpersoon: <?= $data['leverancier']->ContactPersoon; ?></p>
    <p>Leveranciernummer: <?= $data['leverancier']->LeverancierNummer; ?></p>
    <p>Mobiel: <?= $data['leverancier']->Mobiel; ?></p>
    <a href="<?= URLROOT; ?>/leverancier/edit/<?= $data['leverancier']->Id; ?>" class="btn btn-primary">Wijzig</a>
</div>