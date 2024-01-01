<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class='btn btn-primary btn-sm' href=/LSTV/CRUD/main/create.php>Create</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
    </nav>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Record ID</th>
                <th scope="col">EMP Full Name</th>
                <th scope="col">Address</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Civil Status</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Salary</th>
                <th scope="col">Active</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connection.php");

            $sql = "SELECT * from employeefile";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Invalid query" . $conn->error);
            }
            while ($row = mysqli_fetch_assoc($result)) {
                $status = ($row['isactive'] == 1) ? 'Active' : 'Inactive';
                echo "
            <tr>
            <td>$row[recid]</td>
            <td>$row[fullname]</td>
            <td>$row[address]</td>
            <td>$row[birthdate]</td>
            <td>$row[age]</td>
            <td>$row[gender]</td>
            <td>$row[civilstat]</td>
            <td>$row[contactnum]</td>
            <td>$row[salary]</td>
            <td>$status</td>
            <td>
                <a class='btn btn-success btn-sm' href='/LSTV/CRUD/main/update.php?id=$row[recid];'>Update</a>
                <a class='btn btn-danger btn-sm' href='/LSTV/CRUD/main/delete.php?id=$row[recid];'>Delete</a>
            </td>
        </tr>
</tbody>";
            }
            ?>

    </table>


    <!-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-primary">CREATE</button>
        <button type="button" class="btn btn-success">READ</button>
        <button type="button" class="btn btn-warning">UPDATE</button>
        <button type="button" class="btn btn-danger">DELETE</button>
    </div> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>