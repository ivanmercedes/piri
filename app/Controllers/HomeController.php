<?php

namespace App\Controllers;

class HomeController extends BaseController
{
        public function getIndex()
        {
            return 'hola, mundo!';
        }
}