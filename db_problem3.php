<?php
include("db_display.php");
$sql = "SELECT * FROM masterfile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>cuscde</th>
                <th>cusdsc</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
            <td>" . $row['cuscde'] . "</td>
            <td>" . $row['cusdsc'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql = "SELECT s.docnum, s.trndte, s.cuscde, m.cusdsc, s.trntot
FROM salesfile1 s
INNER JOIN masterfile m ON s.cuscde = m.cuscde;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>docnum</th>
                <th>trndte</th>
                <th>cuscde</th>
                <th>cusdsc</th>
                <th>trntot</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
            <td>" . $row['docnum'] . "</td>
            <td>" . $row['trndte'] . "</td>
            <td>" . $row['cuscde'] . "</td>
            <td>" . $row['cusdsc'] . "</td>
            <td>" . $row['trntot'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
