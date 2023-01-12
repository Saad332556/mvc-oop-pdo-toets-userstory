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

    public function index($AutoId = 2)
    {
        $records = $this->mankementModel->getMankement();

        $rows = '';

        foreach ($records as $items)
        {
            $rows .= "<tr>
            <td>$items->Datum</td>
            <td>$items->Mankement</td>
        </tr>";
        }

        $data = [ 
            'title' => "Overzicht Mankementen",
            'Naam' => "Manhoi",
            'Email' => "manhoi@gmail.com",
            'Kenteken'=> "TH-78-KL - Ferrari",
            'AutoId' => $AutoId,
            'rows' => $rows
        ];
        $this->view('mankementen/index', $data);
    }

    public function create($AutoId = NULL)
    {
        $data = [
            'title' => 'Invoeren mankement',
            'Kenteken' => "TH-78-KL - Ferari",
            'AutoId' => $AutoId,
            'MankementError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [ 
                'title' => 'Invoeren mankement',
                'Kenteken' => "TH-78-KL - Ferari" ,
                'AutoId' => $_POST['AutoId'],
                'Mankement' => $_POST['Mankement'],
                'MankementError' => ''
            ];
            
            $data = $this->validateAddMankementForm($data);

            if (empty($data['MankementError'])) {
                $result = $this->mankementModel->createMankement($_POST);

                if ($result) {
                    $data['title'] = "<p>Het nieuwe mankement is toegevoegd!</p>";
                } else {
                    echo "<p>Het nieuwe mankement is niet toegevoegd :</p>";
                }
                header('Refresh:2 url=' . URLROOT . '/mankement/index');
            } else {
                header('Refresh:2 url=' . URLROOT . '/mankement/addmankement/' . $data['AutoId']);
            }

        }

        $this->view('mankementen/create', $data);

    }

    private function validateAddMankementForm($data)
    {
        if (strlen($data['Mankement']) > 50) {
            $data['MankementError'] = "Het nieuwe mankement is meer dan 50 karakters lang en is niet toegevoegd, probeer het opnieuw ";
        } elseif (empty($data['Mankement']))
        {
            $data['MankementError'] = "U bent verplicht om de mankement invullen";
        }

        return $data;
    }

}