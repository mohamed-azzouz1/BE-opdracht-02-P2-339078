<?php


class leverancierupdate extends BaseController
{
    private $LevarancierupdateModel;

    public function __construct()
    {
        $this->LevarancierupdateModel = $this->model('LeverancierUpdateOverzicht');
    }

    public function index($page = 1) {
        $limit = 4;
        $start = ($page - 1) * $limit;
        $totalLeveranciers = $this->LevarancierupdateModel->getTotalLeveranciers();
        $leveranciers = $this->LevarancierupdateModel->getLeveranciersByPage($start, $limit);
        $totalPages = ceil($totalLeveranciers / $limit);

        $data = [
            'title' => 'Update Leverancier Jamin',
            'leveranciers' => $leveranciers,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'dataRows' => $leveranciers,
            'message' => '',
            'messageColor' => '',
            'messageVisibility' => ''
        ];
        if (is_null($leveranciers)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['leveranciers'] = NULL;
        }

        $this->view('leverancierupdate/index', $data);
    }

    public function edit($id) {
        $leverancier = $this->LevarancierupdateModel->getLeverancierById($id);
        $contact = $this->LevarancierupdateModel->getContactById($leverancier->ContactId);

        $data = [
            'leverancier' => $leverancier,
            'contact' => $contact
        ];

        $this->view('leverancierupdate/levrancier_details', $data);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Haal de gegevens op uit het formulier en controleer op null-waarden
            $data = [
                'Id' => $id,
                'Naam' => isset($_POST['Naam']) ? trim($_POST['Naam']) : '',
                'ContactPersoon' => isset($_POST['ContactPersoon']) ? trim($_POST['ContactPersoon']) : '',
                'LeverancierNummer' => isset($_POST['LeverancierNummer']) ? trim($_POST['LeverancierNummer']) : '',
                'Mobiel' => isset($_POST['Mobiel']) ? trim($_POST['Mobiel']) : '',
                'Straat' => isset($_POST['Straat']) ? trim($_POST['Straat']) : '',
                'Huisnummer' => isset($_POST['Huisnummer']) ? trim($_POST['Huisnummer']) : '',
                'Postcode' => isset($_POST['Postcode']) ? trim($_POST['Postcode']) : '',
                'Stad' => isset($_POST['Stad']) ? trim($_POST['Stad']) : '',
                'ContactId' => $this->LevarancierupdateModel->getContactById($id)->Id
            ];
            // Update de leverancier in de database
            if ($this->LevarancierupdateModel->updateLeverancier($data)) {
                // Toon een bevestigingsmelding
                $_SESSION['leverancier_message'] = 'De wijzigingen zijn succesvol doorgevoerd';
                // Redirect na 3 seconden
                header("refresh:3;url" . URLROOT . "/leverancier/details/" . $id);
            } else {
                die('Er is iets misgegaan bij het bijwerken van de gegevens');
            }
        } else {
            // Haal de huidige gegevens van de leverancier op
            $leverancier = $this->LevarancierupdateModel->getLeverancierById($id);
            $contact = $this->LevarancierupdateModel->getContactById($leverancier->ContactId);

            $data = [
                'leverancier' => $leverancier,
                'contact' => $contact
            ];
    
            $this->view('leverancierupdate/leverancier_update', $data);
        }
    }
}