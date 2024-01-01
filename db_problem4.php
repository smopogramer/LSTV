<?php

include("db_connect.php");


$sql = "SELECT * FROM db_problem4";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>recid</th>
                <th>trndte</th>
                <th>cremon</th>
                <th>creyer</th>
                <th>datetyp</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
            <td>" . $row['recid'] . "</td>
            <td>" . $row['trndte'] . "</td>
            <td>" . $row['cremon'] . "</td>
            <td>" . $row['creyer'] . "</td>
            <td>" . $row['datetyp'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$sql = "UPDATE `db_problem4`
SET `trndte` = 
    CASE 
        WHEN `datetyp` = 'F' THEN STR_TO_DATE(CONCAT(`creyer`, '-', `cremon`, '-', '01'), '%Y-%m-%d')
        WHEN `datetyp` = 'L' THEN LAST_DAY(STR_TO_DATE(CONCAT(`creyer`, '-', `cremon`, '-', '01'), '%Y-%m-%d'))
    END";

$result = $conn->query($sql);
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>
    <pre>$sql = "UPDATE `db_problem4`
        SET `trndte` =
        CASE
        WHEN `datetyp` = 'F' THEN STR_TO_DATE(CONCAT(`creyer`, '-', `cremon`, '-', '01'), '%Y-%m-%d')
        WHEN `datetyp` = 'L' THEN LAST_DAY(STR_TO_DATE(CONCAT(`creyer`, '-', `cremon`, '-', '01'), '%Y-%m-%d'))
        END";

        $result = $conn->query($sql);</p>
</body>

</html>