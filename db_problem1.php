<?php
include("db_display.php");



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
                        <th scope="col">Date</th>
                        <th scope="col">DOC. NO.</th>
                        <th scope="col">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM salesfile1 ORDER BY cuscde";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $currentCustomer = null;
                        $subtotal = 0;
                        $grandTotal = 0;
                    }
                    foreach ($result as $row) {
                        if ($currentCustomer !== null && $row['cuscde'] != $currentCustomer) {
                            // Display subtotal for the previous customer
                            echo "
                        <tr>
                            <td colspan='2'><b>Subtotal:</b></td>
                            <td><b>" . number_format($subtotal, 2) . "</b></td>
                        </tr>";
                            echo "<tr><td colspan='3'>---------------</td></tr>";

                            $subtotal = 0; // Reset subtotal for the new customer
                        }

                        if ($row['cuscde'] != $currentCustomer) {
                            // Display customer header
                            echo "
                        <tr>
                            <td colspan='3'><b> $row[cuscde]</b></td>
                        </tr>";
                            $currentCustomer = $row['cuscde'];
                        }

                        // Display transaction information
                        echo "
                    <tr>
                        <td>$row[trndte]</td>
                        <td>$row[docnum]</td>
                        <td>" . number_format($row['trntot'], 2) . "</td>
                    </tr>";

                        // Add transaction amount to subtotal and grand total
                        $subtotal += $row['trntot'];
                        $grandTotal += $row['trntot'];
                    }

                    // Display subtotal for the last customer
                    echo "
                <tr>
                    <td colspan='2'><b>Subtotal:</b></td>
                    <td><b>" . number_format($subtotal, 2) . "</b></td>
                </tr>";

                    // Display grand total for all customers
                    echo "
                <tr>
                    <td colspan='2'><b>Grand Total:</b></td>
                    <td><b>" . number_format($grandTotal, 2) . "</b></td>
                </tr>";
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