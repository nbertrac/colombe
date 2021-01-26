<?php
    $projects = array(
        "NRJ" => array(
                "name"=> "Energies renouvelables",
                "budget"=> "400 000 €",
                "techno"=> array(
                        "web" => array("HTML", "CSS", "JS"),
                        "Mobile"=>array("React Native")
                )
        ),
        "H2O" => array(
            "name"=> "Traitement des eaux usées",
            "budget"=> "750 000 €",
            "techno"=> array(
                    "Client riche" => array("Java", "Oracle"),
                    "RWD"=>array("MongoDB", "Node", "Angular")
            )
        ),
        "RDC" => array(
            "name"=> "Gestion des maraudes Resto du coeur",
            "techno"=> array(
                    "web static" => array("HTML", "CSS", "JS"),
            )
        )
    );
// Génère un tableau HTML affichant le contenu de l'array
$html ='<table class="table table-striped">';
$html .='<thead><tr><th>Projets</th><th>Budget</th><th>Technologies</th></tr></thead><tbody>';
foreach($projects as $key => $val){
    $html .='<tr><td>'.$key. ' - '.$projects[$key]['name'].'</td>';
    $html .='<td>'. (array_key_exists('budget',$projects[$key]) ? $projects[$key]['budget'] : '').'</td>';
    $html .='<td><ul>';
    foreach($projects[$key]['techno'] as $key2=>$valk2){
        $html .='<li>'. $key2.'<ol>';
            foreach($projects[$key]['techno'][$key2] as $val3) $html .= '<li>'.$val3.'</li>';
        $html .='</ol></li>';
    }
    $html .='</ul></td>';
    $html.='</tr>';
}
$html .='</tbody></table>';
echo $html;
?>