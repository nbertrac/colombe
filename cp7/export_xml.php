<?php
include_once('test_session.php');
include_once('pdo_connect.php');
if(!isset($_GET['t']) || empty($_GET['t'])) echo 'Aucune table trouvée !';
try {
    $t=$_GET['t'];
    $sql="SELECT * FROM $t";
    $qry=$cnn->query($sql);
    // Lit et renvoie les data
    $root= new SimpleXMLElement("<$t/>");
    while($row=$qry->fetch(PDO::FETCH_ASSOC)){
        $child=$root->addChild(substr($t,0,strlen($t)-1));
        foreach($row as $key=>$val){
            $child->addChild(strtolower($key),$val);
        }
    }
    header('Content-type: text/xml');
    echo $root->asXML();
    unset($cnn);
} catch(PDOException $err){
    echo $err->getMessage();
}