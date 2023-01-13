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
        $result = $this->mankementModel->getMankementen();

        $rows = '';

        foreach ($result as $items)
        {
            $rows .= "<tr>
            <td>$items->Datum</td>
            <td>$items->Mankement</td>
        </tr>";
        }

        $data = [ 
            'title' => "Overzicht Mankementen",
            'naam' => "Manhoi",
            'email' => "manhoi@gmail.com",
            'kenteken'=> "TH-78-KL - Ferrari",
            'autoid' => $AutoId,
            'rows' => $rows
        ];
        $this->view('mankementen/index', $data);
    }

    public function create($AutoId = NULL)
    {
        $data = [
            'title' => 'Invoeren mankement',
            'kenteken' => "TH-78-KL - Ferari",
            'autoid' => $AutoId,
            'MankementError' => ''
        ];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // $_POST array schoonmaken
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [ 
                'title' => 'Invoeren mankement',
                'kenteken' => "TH-78-KL - Ferari" ,
                'autoid' => $_POST['autoid'],
                'mankement' => $_POST['mankement'],
                'MankementError' => ''
            ];
            
            $data = $this->validateCreateForm($data);

            if (empty($data['MankementError'])) {
                $result = $this->mankementModel->create($_POST);

                if ($result) {
                    $data['title'] = "<p>Het nieuwe mankement is toegevoegd!</p>";
                } else {
                    echo "<p>Het nieuwe mankement is niet toegevoegd :</p>";
                }
                header('Refresh:2 url=' . URLROOT . '/mankementen/index');
            } else {
                header('Refresh:2 url=' . URLROOT . '/mankementen/create/' . $data['autoid']);
            }

        }

        $this->view('mankementen/create', $data);

    }

    private function validateCreateForm($data)
    {
        if (strlen($data['mankement']) > 50) {
            $data['MankementError'] = "Het nieuwe mankement is meer dan 50 karakters lang en is niet toegevoegd, probeer het opnieuw ";
        } elseif (empty($data['mankement']))
        {
            $data['MankementError'] = "U bent verplicht om de mankement invullen";
        }

        return $data;
    }

}