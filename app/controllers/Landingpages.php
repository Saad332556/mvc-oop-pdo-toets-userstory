<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welkom instructeur Manhoi'
        ];
        $this->view('landingpages/index', $data);
    }
}
