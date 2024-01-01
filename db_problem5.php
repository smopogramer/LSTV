<?php
include("db_connect.php");

$sql = "SELECT * FROM db_problem5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>recid</th>
                <th>field1</th>
                <th>field2</th>
                <th>field3</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>
            <td>" . $row['recid'] . "</td>
            <td>" . $row['field1'] . "</td>
            <td>" . $row['field2'] . "</td>
            <td>" . $row['field3'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql = "DELETE t1 FROM `db_problem5` t1
JOIN (
    SELECT *,
           ROW_NUMBER() OVER (PARTITION BY field1, field2, field3 ORDER BY recid) as row_num
    FROM `db_problem5`
) t2 ON t1.recid = t2.recid
WHERE t2.row_num > 1";

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
    <pre>
        $sql = "DELETE t1 FROM `db_problem5` t1
        JOIN (
        SELECT recid, field1, field2, field3,
           ROW_NUMBER() OVER (PARTITION BY field1, field2, field3 ORDER BY recid) as row_num
        FROM `db_problem5`
        ) t2 ON t1.recid = t2.recid
        WHERE t2.row_num > 1";

$result = $conn->query($sql);</p>

</body>

</html>