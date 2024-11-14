<?php

class jamin extends BaseController
{
    private $JaminModel;

    public function __construct()
    {
        $this->JaminModel = $this->model('MagazijnModel');
    }

    public function index()
    {
        /**
         * Met het $data-array geef ik informatie mee vanuit de controller
         * naar de view
         */
        $data = [
            'title' => 'overzicht Magazijn Jamin'
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
        ];

        $jamin = $this->JaminModel->getMagazijn();

        if (is_null($jamin)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
            $data['dataRows'] = $jamin;
        }
        /**
         * Met de view-method uit de BaseController-class roep je de
         * view aan en geef je de informatie uit het $data-array mee aan
         * de view
         */
        $this->view('jamin/index', $data);
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
    

            
        $Leverantieinfo = $this->JaminModel->getLeverantieinfo($ProductId);


        if (is_null($Leverantieinfo)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:3; ' . URLROOT . '/homepages/index');

        } else {
            $data['dataRows'] = $Leverantieinfo;
        }

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('jamin/Leverantieinfo', $data);
    }

    
    public function allergeninfo($ProductId)
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'ProductNaam' =>''
            ,'Barcode' => ''
            ,'Allergeennaam' => ''
            ,'Omschrijving' => ''
            ,'dataRows' => ''
            ,'message' => ''
            ,'messageColor' => ''
            ,'messageVisibility' => ''
            ,'productNaam' => $_GET['Naam']
            ,'productBarcode' => $_GET['Barcode']
        ];
    

            
        $allergeninfo = $this->JaminModel->getallergeninfo($ProductId);


        if (empty($allergeninfo)) {
            $data['message'] = "Er is een fout opgetreden";
            $data['messageColor'] = "danger";
            $data['messageVisibility'] = "flex";
            $data['dataRows'] = NULL;

            header('Refresh:4; ' . URLROOT . '/homepages/index');
        } else {
            $data['dataRows'] = $allergeninfo;
        }

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('jamin/allergeninfo', $data);

    }
}