<?php


class leverancierupdate extends BaseController
{
    private $LevarancierupdateModel;

    public function __construct()
    {
        $this->LevarancierupdateModel = $this->model('LeverancierUpdateOverzicht');
    }

    public function index()
    {
        /**
         * Met het $data-array geef ik informatie mee vanuit de controller
         * naar de view
         */
        $data = [
            'title' => 'Update Leverancier Jamin'
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
        ];

        $leverancierupdateOverzicht = $this->LevarancierupdateModel->getleverancierupdateOverzicht();

        if (is_null($leverancierupdateOverzicht)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            // header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
            $data['dataRows'] = $leverancierupdateOverzicht;
        }
        /**
         * Met de view-method uit de BaseController-class roep je de
         * view aan en geef je de informatie uit het $data-array mee aan
         * de view
         */
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
            // Haal de gegevens op uit het formulier
            $data = [
                'Id' => $id,
                'Naam' => trim($_POST['Naam']),
                'ContactPersoon' => trim($_POST['ContactPersoon']),
                'LeverancierNummer' => trim($_POST['LeverancierNummer']),
                'Mobiel' => trim($_POST['Mobiel']),
                'Straat' => trim($_POST['Straat']),
                'Huisnummer' => trim($_POST['Huisnummer']),
                'Postcode' => trim($_POST['Postcode']),
                'Stad' => trim($_POST['Stad']),
                'contactId' => $this->LevarancierupdateModel->getContactById($id)->Id

            ];
    
            // Update de leverancier in de database
            if ($this->LevarancierupdateModel->updateLeverancier($data)) {
                // Toon een bevestigingsmelding
                $_SESSION['leverancier_message'] = 'De wijzigingen zijn doorgevoerd';
                // Redirect na 3 seconden
                header("refresh:3;url=" . URLROOT . "/leverancier/details/" . $id);
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