<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query


$stmt = $db->prepare('SELECT * FROM memberCertificationsView
WHERE personID = ?;');
$stmt->execute([
  $_POST['personID']
]);

$memberCertifications = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($memberCertifications, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
