<div class="container">
    <h2>Leverancier Details</h2>
    <?php if (isset($_SESSION['leverancier_message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['leverancier_message']; ?>
        </div>
        <?php unset($_SESSION['leverancier_message']); ?>
    <?php endif; ?>
    <p>Naam: <?= $data['leverancier']->naam; ?></p>
    <p>Contactpersoon: <?= $data['leverancier']->ContactPersoon; ?></p>
    <p>Leveranciernummer: <?= $data['leverancier']->LeverancierNummer; ?></p>
    <p>Mobiel: <?= $data['leverancier']->Mobiel; ?></p>
    <a href="<?= URLROOT; ?>/leverancier/edit/<?= $data['leverancier']->Id; ?>" class="btn btn-primary">Wijzig</a>
</div>