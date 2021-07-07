<?php

namespace App\Controller;

use App\Entity\Produit;

class TestController{

    public function __construct(){

    }

    public function __invoke()
    {
        return 'test';
    }

}