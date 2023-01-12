<?php

class Mankementen extends Controller
{
    //properties
    private $mankementModel;

    // Dit is de constructor van de controller
    public function __construct() 
    {
        $this->mankementModel = $this->model('Mankement');
    }

    public function index($land = 'Nederland', $age = 67)
    {
        $records = $this->mankementModel->getMankementen();
        //var_dump($records);

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
                        <td>$items->Naam</td>
                        <td>$items->Email</td>
                        <td>$items->Kenteken</td>
                        <td>$items->Datum</td>
                        <td>$items->Mankement</td>
                        <td>
                            <a href='" . URLROOT . "/mankementen/update/$items->Id'>update</a>
                        </td>
                        <td>
                            <a href='" . URLROOT . "/mankementen/delete/$items->Id'>delete</a>
                        </td>
                      </tr>";
        }

        $data = [
            'title' => "Overzicht Mankementen",
            'rows' => $rows
        ];
        $this->view('mankementen/index', $data);
    }

    public function update($id = null) 
    {
        /**
         * Controleer of er gepost wordt vanuit de view update.php
         */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /**
             * Maak het $_POST array schoon
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->mankementModel->updateMankement($_POST);

            header("Location: " . URLROOT . "/mankementen/index");
        }

        $record = $this->mankementModel->getMankement($id);

        $data = [
            'title' => 'Update Mankementen',
            'Id' => $record->Id,
            'AutoId' => $record->AutoId,
            'Datum' => $record->Datum,
            'Mankement' => $record->Mankement
        ]; 
        $this->view('mankementen/update', $data);
    }

    public function delete($id)
    {
        $result = $this->mankementModel->deleteMankement($id);
        if ($result) {
            echo "Het record is verwijderd uit de database";
            header("Refresh: 3; URL=" . URLROOT . "/mankementen/index");
        } else {
            echo "Internal servererror, het record is niet verwijderd";
            header("Refresh: 3; URL=" . URLROOT . "/mankementen/index");
        }
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->mankementModel->createMankement($_POST);

            if ($result) {
                echo "Het invoeren is gelukt";
                header("Refresh:3; URL=" . URLROOT . "/mankementen/index");
            } else {
                echo "Het invoeren is NIET gelukt";
                header("Refresh:3; URL=" . URLROOT . "/mankementen/index");
            }
        }

        $data = [
            'title' => 'Invoeren Mankement'
        ];
        $this->view('mankementen/create', $data);
    }
}