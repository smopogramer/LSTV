<?php


$sql = "SELECT t3.tercde AS TERRITORY,
                    t2.cuscde AS CUSTOMER,
                    COALESCE(SUM(t1.trntot), 0) AS TOTAL
                    FROM salesfile1 t1
                    JOIN customerfile t2 ON t1.cuscde = t2.cuscde
                    JOIN territoryfile t3 ON t2.tercde = t3.tercde
                    GROUP BY t3.tercde, t2.cuscde
                    ORDER BY t3.tercde, t2.cuscde";
$result = $conn->query($sql);

$territoryTotal = array();
$grandTotal = 0;

foreach ($result as $row) {
    $territory = $row['TERRITORY'];
    $customer = $row['CUSTOMER'];
    $total = $row['TOTAL'];

    // Initialize territoryTotal array if not exists
    if (!isset($territoryTotal[$territory])) {
        $territoryTotal[$territory] = 0;
    }

    // Add to territoryTotal and grandTotal
    $territoryTotal[$territory] += $total;
    $grandTotal += $total;

    // Display the result
    echo "$territory\t$customer\t$total\n";
}

// Display subtotals and grand total
foreach ($territoryTotal as $territory => $subtotal) {
    echo "SUBTOTAL\t\t\t$subtotal\n";
}

echo "GRAND TOTAL\t\t\t$grandTotal\n";
