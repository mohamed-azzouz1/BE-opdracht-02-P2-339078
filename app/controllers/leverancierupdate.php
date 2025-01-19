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
            'title' => 'Overzicht Leverancier Jamin'
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
}