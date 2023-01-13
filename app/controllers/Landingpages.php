<?php

class Landingpages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Homepage MVC Userstory toets'
        ];
        $this->view('landingpages/index', $data);
    }
}
