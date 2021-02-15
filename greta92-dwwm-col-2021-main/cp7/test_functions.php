<?php

require_once('functions.php');

/**
 * Batterie de tests pour la fonction AGE
 */
echo '<p>Batterie de tests pour la fonction AGE';
echo '<p>Test 1 : ' . age('12/31/2005', '1997-05-14');
echo '<p>Test 2 : ' . age(123456, 987654);
echo '<p>Test 3 : ' . age('Toto', 'aime les gâteaux');

/**
 * Batterie de tests pour la fonction IS_DATE
 */
echo '<p>Batterie de tests pour la fonction IS_DATE';
echo '<p>Test 4 : ' . is_date('12/31/2005');
echo '<p>Test 5 : ' . is_date('Toto aime le coco');
echo '<p>Test 6 : ' . is_date(1234323);
echo '<p>Test 7 : ' . is_date('29/02/2021');

/**
 * Batterie de tests pour la fonction TTC
 */
echo '<p>Batterie de tests pour la fonction TTC';
echo '<p>Test 8 : ' . ttc(100.0);
echo '<p>Test 9 : ' . ttc(100, .34);
echo '<p>Test 10 : ' . ttc(100.0, .055);
// echo '<p>Test 11 : ' . ttc('toto', .1);
// echo '<p>Test 12 : ' . ttc(100.0, 'tata');

/**
 * Batterie de tests pour la fonction GENERATEPASSWORD
 */
echo '<p>Batterie de tests pour la fonction GENERATEPASSWORD';
echo '<p>Test 13 : ' . generatePassword();
echo '<p>Test 14 : ' . generatePassword(18);
echo '<p>Test 15 : ' . generatePassword(5);

/**
 * Batterie de tests pour la fonction GENERATEPASSWORD2
 */
echo '<p>Batterie de tests pour la fonction GENERATEPASSWORD2';
echo '<p>Test 16 : ' . generatePassword2();
echo '<p>Test 17 : ' . generatePassword2(18);
echo '<p>Test 18 : ' . generatePassword2(5);
echo '<p>Test 19 : ' . generatePassword2(70);

/**
 * Batterie de tests pour la fonction MAKESELECT
 */
echo '<p>Batterie de tests pour la fonction MAKESELECT';
echo '<p>Test 20 : ' . makeSelect(
    array(
        1 => 'Mohamed',
        2 => 'Jérémy',
        14 => 'Nathan'
    )
);
echo '<p>Test 21 : ' . makeSelect(
    array(
        'FR' => 'France',
        'MG' => 'Madagascar',
        'GP' => 'Guadeloupe'
    )
);
echo '<p>Test 22 : ' . makeSelect(array(1, 2, 3, 0, '1998-07-12', 'Allez les bleus'));
// echo '<p>Test 23 : ' . makeSelect('Toto aime le maquereau');

/**
 * Batterie de tests pour la fonction AVERAGE
 */
echo '<p>Batterie de tests pour la fonction AVERAGE';
echo '<p>Test 24 : ' . average(10, 20, 30);
echo '<p>Test 25 : ' . average(rand(1, 9), rand(10, 99), rand(100, 999));
echo '<p>Test 26 : ' . average(10, '20', '2020-11-02', 'Toto fait du vélo');
echo '<p>Test 27 : ' . average(10, array(20, 30));
echo '<p>Test 28 : ' . average(array(20, 30));
