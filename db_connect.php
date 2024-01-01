<?php

$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'lstv';


try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
} catch (mysqli_sql_exception) {
    echo "could not connect";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">CRUD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="db_problem1.php">Problem 1</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="db_problem2.php">Problem 2</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="db_problem3.php">Problem 3</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="db_problem4.php">Problem 4</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="db_problem5.php">Problem 5</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="basic SQL statements">Basic SQL Statement</a>
            </li>
    </nav>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>