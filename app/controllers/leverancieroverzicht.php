<?php

class leverancieroverzicht extends BaseController
{
    private $LevarancierModel;

    public function __construct()
    {
        $this->LevarancierModel = $this->model('Levarancier');
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

        $leverancieroverzicht = $this->LevarancierModel->getLeverancierOverzicht();

        if (is_null($leverancieroverzicht)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            // header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
            $data['dataRows'] = $leverancieroverzicht;
        }
        /**
         * Met de view-method uit de BaseController-class roep je de
         * view aan en geef je de informatie uit het $data-array mee aan
         * de view
         */
        $this->view('leverancier/index', $data);
    }

    public function Leverantieinfo($ProductId, $productAanwezig)
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'naam' =>''
            ,'DatumLevering' => ''
            ,'aantal' => ''
            ,'DatumEerstVolgendeLevering' => ''
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
            ,'productaantal' => $productAanwezig
        ];
    

            
        $Leverantieinfo = $this->LevarancierModel->getLeverantieinfo($ProductId);


        if (is_null($Leverantieinfo)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:3; ' . URLROOT . '/homepages/index');

        } else {
            $data['dataRows'] = $Leverantieinfo;
        }
         header('Refresh:3; ' . URLROOT . '/homepages/index');

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('leverancier/leverancier_overzicht', $data);
    }

    public function LeverantieProductinfo($ProductId)
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'ProductNaam' =>''
            ,'LeverancierNaam' => ''
            ,'ContactPersoon' => ''
            ,'LeverancierNummer' => ''
            ,'Mobiel' => ''
            ,'AantalAanwezig' => ''
            ,'VerpakkingsEenheid' => ''
            ,'DatumLevering' => ''
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
        ];
    

            
        $LeverantieProductinfo = $this->LevarancierModel->getLeverantieProductinfo($ProductId);

        

        if (is_null($LeverantieProductinfo)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:3; ' . URLROOT . '/homepages/index');

        } else {
            $data['dataRows'] = $LeverantieProductinfo;
        }

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('leverancier/leverancier_overzicht', $data);
    }
    public function nieuwelevering($ProductId)
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'ProductNaam' =>''
            ,'LeverancierNaam' => ''
            ,'ContactPersoon' => ''
            ,'LeverancierNummer' => ''
            ,'Mobiel' => ''
            ,'AantalAanwezig' => ''
            ,'VerpakkingsEenheid' => ''
            ,'DatumLevering' => ''
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
        ];
    

            
        $LeverantieProductinfo = $this->LevarancierModel->getLeverantieProductinfo($ProductId);

        



        
        if (is_null($LeverantieProductinfo)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:3; ' . URLROOT . '/homepages/index');

        } else {
            $data['dataRows'] = $LeverantieProductinfo;
        }

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('leverancier/leverancier_overzicht', $data);
    }
}