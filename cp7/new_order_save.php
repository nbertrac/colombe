<?php
include_once('test_session.php');
include_once('constants.php');
include_once('model.php');
$order=new Model(HOST,3306,DB,USER,PASS,'commandes');
$order->insert($_POST);
header('location:calendar.php');