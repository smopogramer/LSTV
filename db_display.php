<?php
include('db_connect.php');

$sql = "SELECT * FROM salesfile1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>docnum</th>
                <th>trndte</th>
                <th>cuscde</th>
                <th>trntot</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
            <td>" . $row['docnum'] . "</td>
            <td>" . $row['trndte'] . "</td>
            <td>" . $row['cuscde'] . "</td>
            <td>" . $row['trntot'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
