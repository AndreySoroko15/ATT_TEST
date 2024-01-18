<?php 

require_once 'db_connect.php';
require_once 'db_queries.php';

$sortingMethod = isset($_POST['sortingMethod']) ? $_POST['sortingMethod'] : 'default';

// die($_POST["$sortingMethod"]);

$config = parse_ini_file('config/config.ini');

$dbConnection = new DBConnection($config);
$conn = $dbConnection->getConnection();

$dbQueries = new Queries($dbConnection);
$orders = $dbQueries->getFromDB($sortingMethod);


echo json_encode($orders);

// header('Locaton: /?sort=' . $_POST['sort']);

