<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het boodstrap grid -->
<div class="container">

    <div class="row mt-3 text-center" style="display:<?= $data['messageVisibility']; ?>">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
        <div class="col-2"></div>
    </div>


    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?php echo $data['title']; ?></h3>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>ContactPersoon</th>
                        <th>Leverancier Nummer</th>
                        <th>Mobiel</th>
                        <th>Aantal Verchillende Producten</th>
                        <th>Toon Producten</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['dataRows'])) { ?>
                              <tr>
                                <td colspan='6' class='text-center'>Door een storing kunnen we op dit moment geen producten tonen uit het magazijn</td>
                              </tr>
                    <?php } else {                              
                              foreach ($data['dataRows'] as $leverancier) {
                                ?>
                                <tr>
                                <td><?= $leverancier->LeverancierNaam ?></td>
                                <td><?= $leverancier->ContactPersoon ?></td>
                                <td><?= $leverancier->LeverancierNummer ?></td>
                                <td><?= $leverancier->Mobiel ?></td>
                                <td><?= $leverancier->ProductCount ?></td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT . "/leverancieroverzicht/LeverantieProductinfo/{$leverancier->LeverancierId}" ?>'>
                                        <i class="bi bi-box"></i>                                    
                                    </a>
                                </td>            
                                </tr>
                    <?php } } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>