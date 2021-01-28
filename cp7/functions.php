<?php
/**
 * do that
 * @param string $date1 - une date ('dd/mm/yyyy' ou 'yyyy-mm-dd')
 * @param string $dateé - une date ('dd/mm/yyyy' ou 'yyyy-mm-dd')
 * @return int âge en années
 */
function diF($date1, $date2){
    if(is_string($date1) && is_string($date2)){
        if(strtotime($date1) && strtotime($date2)){
        $r = abs(floor((strtotime($date1)- strtotime($date2))/60/60/24/365.25));
        ($r > 1) ? $r .= " années" : $r .=" année";
        return $r;
        }
        else trigger_error("Les dates ne sont pas valide",E_USER_ERROR);
    }
    else trigger_error("Les dates ne sont pas en string",E_USER_ERROR);
}

// Or
function age($date1, $date2):int {
if(!is_date($date1) || !is_date($date2)){
    trigger_error("Les dates ne sont pas valide",E_USER_WARNING);
}

    $d1 = strtotime($date1);
    $d2 = strtotime($date2);

    if ($d1 > $d2) $diff= $d1- $d2;
    elseif ($d2 > $d1) $diff= $d2- $d1;
    else $diff = 0;
    return floor($diff/60/60/24/365.25);
}

/**
 * Renvoie true si la chaine passée en paramètre est une date
 * @param string $arg - argument à tester
 * @return boolean
 */
function is_date($arg):bool{
    return (bool) strtotime($arg);
}

/**
 * renvoi le TTC a partir du HT et TVA
 * @param float $mt - HT
 * @param float $taux - TVA:0.1,0.2,0.055,0.021
 * @return float
 */
//version spécialiste
function ttcs($mt, $taux = 0.2){
    if(!is_string($mt)){
        if($mt <0) trigger_error("HT doit être superieur à 0",E_USER_ERROR); 
        if($taux == 0.2 || $taux == 0.1 || $taux == 0.055 || $taux==0.021) return ($mt * (1 + $taux));
        else trigger_error("TVA n'est pas de France.Choisis 0.2, 0.1, 0.055 ou 0.021",E_USER_WARNING);
    }
    else trigger_error("HT doit etre un nombre",E_USER_WARNING);
}

//Best version
function ttc($mt, $taux=.2): float{
    $tauxFR = [.021,.055,.1,.2];
    if($mt <0) trigger_error("HT doit être superieur à 0",E_USER_ERROR);
    if(!is_float($mt) && !is_int($mt)) trigger_error("HT doit être un nombre",E_USER_ERROR);
    if(!in_array($taux,$tauxFR)) trigger_error("TVA n'est pas de France.Choisis ". implode(', ', $tauxFR),E_USER_ERROR); 
    return ($mt * (1 + $taux));
}

//Requiré un type de valeur
function ttcN(float $mt,float $taux=.2): float{
    $tauxFR = [.021,.055,.1,.2];
    if($mt <0) trigger_error("HT doit être superieur à 0",E_USER_ERROR);
    if(!in_array($taux,$tauxFR)) trigger_error("TVA n'est pas de France.Choisis ". implode(', ', $tauxFR),E_USER_ERROR); 
    return ($mt * (1 + $taux));
}

/**
 * Renvoie un mot de passe aléatoire à partir du dictionnaire de caractère suivants:
 * - A à Z
 * - a à z
 * - 0 à 9
 * - + * / $ #
 * @param int - $len taille du mot de passe généré (defaut = 8)
 * @return string
 */
function geneP(int $len = 8): string{
    // $dico = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789+*/$#";
    $dico = implode("",array_merge(array_merge(range('a','z'),range('A','Z')),['+','*','$','#']));
    if($len > 7 && $len <= strlen($dico)) return substr(str_shuffle($dico),0,$len);
    else trigger_error("Le parametre doit etre entre 8 et 56",E_USER_ERROR);
}

/**
 * Renvoi valeur de tableau en select
 */
function select(array $tab): string{
    $html= "<select>";
    foreach($tab as $key => $val){
        $html.="<option value=$key>$val</option>";
    }
    $html.="<select>";
    return $html;
}

/**
 * Revoi la moyenne des valeurs en parametres
 * exemple : 
 * average(10,20,30) renvoie 20
 * average(1,2,3,4,5...100) renvoie 50.5
 * @return float
 */
function average(){
    $r = 0;
    $nb=0;
    $numbers=array();
    if(func_num_args()===1 && is_array(func_get_arg(0))) $numbers=func_get_arg(0);
    else $numbers=func_get_args();
    for($i=0;$i<count($numbers);$i++){
        if(is_numeric($numbers[$i])){
            $r += func_get_arg($i);
            $nb++;
        }
    }
    $r = $r/$nb;
    return $r;
}
?>
