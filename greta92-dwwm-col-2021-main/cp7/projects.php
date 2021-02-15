<?php
// Initialise le tableau des projets
$projects = array(
    "NRJ" => array(
        "name" => "Energies renouvelables",
        "budget" => 400000,
        "technos" => array(
            "Web" => array("HTML", "CSS", "JS"),
            "Mobile" => array("React Native")
        )
    ),
    "H2O" => array(
        "name" => "Traitement des eaux usées",
        "budget" => 750000,
        "technos" => array(
            "Client riche" => array("Java", "Oracle"),
            "RWD" => array("MongoDB", "Node", "Angular")
        )
    ),
    "RDC" => array(
        "name" => "Gestion des maraudes Restos du coeur",
        "technos" => array(
            "Web static" => array("HTML", "CSS", "JS")
        )
    )
);

// var_dump($projects);

// Génère un tableau HTML affichant le contenu de 
// l'array projects
$html = '<table class="table table-striped">';
$html .= '<thead><tr><th>Projets</th><th>Budget</th><th>Technologies</th></tr></thead><tbody>';

foreach ($projects as $key => $val) {
    $html .= '<tr>';
    $html .= '<td>' . $key . ' - ' . $projects[$key]['name'] . '</td>';
    $html .= '<td>' . (array_key_exists('budget', $projects[$key]) ? number_format($projects[$key]['budget'], 2, ',', ' ') . ' €' : '') . '</td>';
    $html .= '<td><ul>';
    foreach ($projects[$key]['technos'] as $key2 => $val2) {
        $html .= '<li>' . $key2 . '<ol>';
        foreach ($projects[$key]['technos'][$key2] as $val3) {
            $html .= '<li>' . $val3 . '</li>';
        }
        $html .= '</ol></li>';
    }
    $html .= '</ul></td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';
echo $html;