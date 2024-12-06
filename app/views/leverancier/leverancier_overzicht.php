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
            <h4> Leverings Informatie</h4>
            <h4>Naam leverancier : <?= $data["dataRows"][0]->LeverancierNaam ?></h4>
            <h4>Contact Persoon : <?= $data["dataRows"][0]->ContactPersoon ?></h4>
            <h4>Leverancier Nummer : <?= $data["dataRows"][0]->LeverancierNummer ?></h4>
            <h4>Mobiel : <?= $data["dataRows"][0]->Mobiel ?></h4>
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
                        <th>Aantal In Magazijn</th>
                        <th>VerpakkingsEenheid</th>
                        <th>Laatste Levering</th>
                        <th>Nieuwe Levering</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['dataRows'])||is_null($data['dataRows'][0]->ProductNaam)) { ?>
                              <tr>
                                <td colspan='6' class='text-center bg-danger'>Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin</td>
                              </tr>
                    <?php } else {                              
                              foreach ($data['dataRows'] as $leverancierProduct) {
                                ?>
                                <tr>
                                <td><?= $leverancierProduct->ProductNaam ?></td>
                                <td><?= $leverancierProduct->AantalAanwezig ?></td>
                                <td><?= $leverancierProduct->VerpakkingsEenheid ?></td>
                                <td><?= $leverancierProduct->DatumLevering ?></td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT . "/leverancier/leverancier_overzicht/" ?>'>
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </td>            
                            </tr>
                                <!-- <td><?= $leverancierProduct->ProductCount ?></td> -->
                    <?php } } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>