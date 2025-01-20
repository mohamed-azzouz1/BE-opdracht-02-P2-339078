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
            <h3><?= $data['title']; ?></h3>
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
                        <th>update leverancier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['dataRows'])) { ?>
                              <tr>
                                <td colspan='6' class='text-center'>Door een storing kunnen we op dit moment geen producten tonen uit het magazijn</td>
                              </tr>
                    <?php } else {                              
                              foreach ($data['dataRows'] as $leverancierUpdate) {
                                ?>
                                <tr>
                                <td><?= $leverancierUpdate->naam ?></td>
                                <td><?= $leverancierUpdate->ContactPersoon ?></td>
                                <td><?= $leverancierUpdate->LeverancierNummer ?></td>
                                <td><?= $leverancierUpdate->Mobiel ?></td>
                                <td class='text-center'>
                                <a href="<?= URLROOT; ?>/leverancierupdate/edit/<?= $leverancierUpdate->Id; ?>">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                </td>            
                                </tr>
                    <?php } } ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                <li class="page-item <?= ($i == $data['currentPage']) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= URLROOT; ?>/leverancierupdate/index/<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>