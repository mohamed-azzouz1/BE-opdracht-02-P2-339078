<?php

class leverancierupdate extends BaseController
{
    private $LevarancierupdateModel;

    public function __construct()
    {
        $this->LevarancierupdateModel = $this->model('Levarancier');
    }
}