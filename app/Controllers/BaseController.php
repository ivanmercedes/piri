<?php

namespace App\Controllers;


class BaseController 
{
    protected $templateEngine;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine = new \Twig\Environment($loader,[
            'debug' => true,
            'cache' => false
        ]);

    }

    public function view($fileName, $data = [])
    {
        return $this->templateEngine->render($fileName, $data);
    }
}