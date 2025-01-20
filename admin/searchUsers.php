<?php
require_once('../configs/config.php');
require '../classes/User.php';
session_start();

$getInfo = new User();

$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';
$filterValue = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Sanitize inputs
$searchTerm = htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8');
$filterValue = htmlspecialchars($filterValue, ENT_QUOTES, 'UTF-8');

// Build the SQL query based on search term and filter
$sql = "SELECT * FROM tbl_users WHERE deleted_at IS NULL";
$params = [];

if ($searchTerm !== '') {
    $sql .= " AND username LIKE :term";
    $params[':term'] = '%' . $searchTerm . '%';
}

if ($filterValue !== 'all') {
    $sql .= " AND role = :role";
    $params[':role'] = $filterValue;
}

// Prepare and execute the statement
$stmt = $getInfo->conn->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();

$listUser = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($listUser);
?>