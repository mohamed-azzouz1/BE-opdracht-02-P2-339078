<?php require_once APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h4>overzicht Allergenen</h4>
            <h4>Naam : <?= $data["productNaam"]?></h4>
            <h4>Barcode : <?= $data["productBarcode"] ?></h4>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Naam Product</th>
                        <th>Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (is_null($data['dataRows'])) { ?>
                        <tr>
                            <td colspan='6' class='text-center'>In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken</td>
                        </tr>
                    <?php 
                    } else {
                        foreach ($data['dataRows'] as $allergeninfo) { ?>
                            <tr>
                                <td><?= $allergeninfo->Allergeennaam ?></td>
                                <td><?= $allergeninfo->Omschrijving ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<?php require_once APPROOT . '/views/includes/footer.php'; ?>
