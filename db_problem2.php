<?php
include("db_display.php");

$sql = "SELECT * FROM customerfile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>

                <th>cuscde</th>
                <th>tercde</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>

            <td>" . $row['cuscde'] . "</td>
            <td>" . $row['tercde'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$sql = "SELECT * FROM territoryfile";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>

                <th>tercde</th>
            </tr>";
    for ($i = 0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_assoc();
        echo "<tr>

            <td>" . $row['tercde'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
    <style>
        .table-box {
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }

        .custom-table {
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-box">
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">TERRITORY</th>
                        <th scope="col">CUSTOMER</th>
                        <th scope="col">TOTAL</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql_total = "SELECT cuscde, SUM(trntot) AS total
                    FROM salesfile1 
                    GROUP BY cuscde";
                    $result_total = $conn->query($sql_total);

                    $customerTotals = array();

                    if ($result_total->num_rows > 0) {
                        while ($row_total = $result_total->fetch_assoc()) {
                            $customerTotals[$row_total['cuscde']] = $row_total['total'];
                        }
                    }

                    $sql_territories = "SELECT tercde, GROUP_CONCAT(cuscde) AS grouped_customers
                          FROM customerfile
                          GROUP BY tercde";
                    $result_territories = $conn->query($sql_territories);

                    $subtotal = 0;
                    $grandTotal = 0;

                    if ($result_territories->num_rows > 0) {
                        while ($row_territory = $result_territories->fetch_assoc()) {
                            $territory = $row_territory['tercde'];
                            $customers = explode(',', $row_territory['grouped_customers']);

                            echo "<tr>
                                    <td><b>$territory</b></td>
                                    <td colspan='2'></td>
                                  </tr>";

                            foreach ($customers as $customer) {
                                $total = isset($customerTotals[$customer]) ? $customerTotals[$customer] : 0;
                                $subtotal += $total;
                                $grandTotal += $total;

                                echo "<tr>
                                        <td></td>
                                        <td>$customer</td>
                                        <td>" . number_format($total, 2) . "</td>
                                      </tr>";
                            }
                            // Display subtotals and grand total in the table
                            echo "<tr><td colspan='2'>SUBTOTAL</td><td>" . number_format($subtotal, 2) . "</td></tr>";
                            $subtotal = 0;
                        }
                    }


                    echo "<tr><td colspan='2'><b>GRAND TOTAL</td><td>" . number_format($grandTotal, 2) . "</b></td></tr>";
                    ?>

                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>