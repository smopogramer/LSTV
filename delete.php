<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $recid = $_GET['id'];

    $sql = "DELETE FROM employeefile WHERE recid = $recid";
    $result = $conn->query($sql);

    header("Location: read.php");
    exit();
} else {
    echo "Invalid request.";
    exit();
}
