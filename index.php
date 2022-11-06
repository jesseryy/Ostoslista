<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

try {
$db = new PDO('mysql:host=localhost;dbname=shoppinglist;charset=utf8','root','');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="select * from item";
$query = $db->query($sql);
$results = $query->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
header('HTTP/1.1 200 OK');
print $json;
} catch (PDOException $pdoexc){
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error'=>$pdoexc->getMessage());
    print json_encode($error);
}