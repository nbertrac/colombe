<?php

/**
 * Renvoie l'âge en années entre 2 dates passées en paramètres
 * @param string $date1 - une date ('dd/mm/yyyy' ou 'yyyy-mm-dd')
 * @param string $date2 - une autre date ('dd/mm/yyyy' ou 'yyyy-mm-dd')
 * @return int âge en années
 */
function age($date1, $date2): int
{
    // Teste si les arguments sont bien des dates
    if (!is_date($date1) || !is_date($date2)) {
        trigger_error('L\'un des arguments n\'est pas une date', E_USER_WARNING);
    }

    // Transforme les dates de string en timestamp
    $d1 = strtotime($date1);
    $d2 = strtotime($date2);

    // Cherche la date la plus forte vs la plus faible
    if ($d1 > $d2) {
        $diff = $d1 - $d2;
    } elseif ($d2 > $d1) {
        $diff = $d2 - $d1;
    } else {
        $diff = 0;
    }

    // renvoie le résultat
    return floor($diff / 60 / 60 / 24 / 365.25);
}

/**
 * Renvoie true si la chaine passée en paramètre est une date
 * @param string $arg - argument à tester
 * @return boolean
 */
function is_date($arg): bool
{
    return (bool) strtotime($arg);
}

/**
 * Renvoie un montant TTC à partir d'un montant HT et d'un taux de TV passés en paramètres
 * @param float $mt - montant positif
 * @param float $taux - taux valant :
 * taux normal : 20%
 * taux intermédiaire : 10%
 * taux réduit : 5,5%
 * taux particulier : 2,1%
 * @return float
 */
function ttc(float $mt, float $taux = .2): float
{
    $result = 0.0;
    $corrects = [.021, .055, .1, .2];
    if ($mt < 0) {
        trigger_error('Le montant HT doit être positif.', E_USER_WARNING);
    } elseif (!in_array($taux, $corrects, true)) {
        trigger_error('Le taux doit être : ' . implode(', ', $corrects), E_USER_WARNING);
    } else {
        $result = $mt * (1 + $taux);
    }
    return $result;
}

/**
 * Renvoie un mot de passe aléatoire à partir du dictionnaire de caractères suivants :
 * - A à Z
 * - a à z
 * - 0 à 9
 * - + * / $ #
 * @param int - $len taille du mot de passe généré (défaut = 8)
 * @return string
 * @version 1.0
 */
function generatePassword(int $len = 8): string
{
    $dico = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+*/$#';
    if ($len < 8) {
        trigger_error('8 caractères minimum.', E_USER_NOTICE);
    }
    $pass = str_shuffle($dico);
    $pass = substr($pass, 0, $len);
    return $pass;
}


/**
 * Renvoie un mot de passe aléatoire à partir du dictionnaire de caractères suivants :
 * - A à Z
 * - a à z
 * - 0 à 9
 * - + * / $ #
 * @param int - $len taille du mot de passe généré (défaut = 8)
 * @return string
 * @version 2.0
 */
function generatePassword2(int $len = 8): string
{
    // Création du dictionnaire en arrays
    $upper = range('A', 'Z');
    $lower = range('a', 'z');
    $nums = range(0, 9);
    $symbols = array('+', '*', '/', '$', '#');
    $dico = array_merge($upper, $lower, $nums, $symbols);
    shuffle($dico);

    // Limite le nombre de caractères min à 8
    if ($len < 8 || $len > count($dico)) {
        trigger_error(sprintf('Entre %d et %d caractères.', $len, count($dico)), E_USER_NOTICE);
    }

    // Renvoie le mot de passe en piochant au hasard 8 cars
    $pass = '';
    for ($i = 0; $i < $len; $i++) {
        $pass .= $dico[rand(0, count($dico) - 1)];
    }
    return $pass;
}

/**
 * Renvoie sous la forme d'une chaine de caractères le code HTML pour afficher un SELECT à partir d'un array passé en paramètre
 * @param array $data tableau contenant les clés/valeurs
 * @return string
 */
function makeSelect(array $data): string
{
    $html = '<select>';
    foreach ($data as $key => $val) {
        $html .= '<option value="' . $key . '">' . $val . '</option>';
    }
    $html .= '</select>';
    return $html;
}

/**
 * Calcule la moyenne des valeurs passées en paramètres
 * Exemple : 
 * average(10,20,30) renvoie 20
 * average(1,2,3,4,5,...,100) renvoie 50.5
 * @return float
 */
function average()
{
    $r = 0;
    $nb = 0;
    $numbers = array();

    if (func_num_args() === 1 && is_array(func_get_arg(0))) {
        $numbers = func_get_arg(0);
    } else {
        $numbers = func_get_args();
    }

    for ($i = 0; $i < count($numbers); $i++) {
        if (is_numeric($numbers[$i])) {
            $r += $numbers[$i];
            $nb++;
        }
    }
    $r /= $nb;
    return $r;
}

function average2()
{
    $r = 0;
    foreach (func_get_args() as $val) {
        $r += $val;
    }
    $r /= func_num_args();
    return $r;
}