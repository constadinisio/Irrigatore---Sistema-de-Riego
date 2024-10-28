<?php
$conn = new mysqli('localhost', 'root', '', 'irrigatore');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temperatura, humedad_aire, humedad_tierra, estado_rele, creacion FROM ciclo ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'No data']);
}

$conn->close();
?>