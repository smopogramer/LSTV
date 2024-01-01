<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM registerforms WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            $sql = "INSERT INTO registerforms (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
                sleep(1);
                header("Location: login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }


        // $sql = "INSERT INTO registerforms (username, password) VALUES('$username', '$hash')";
        // try {
        //     mysqli_query($conn, $sql);
        //     echo "Registered";
        //     header("Location: login.php");
        // } catch (mysqli_sql_exception) {
        //     echo "Username taken";
        // }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            </li>

    </nav>

    <h1 class="display-4">Sign-up Page</h1>

    <form action="signup.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" minlength="6" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="6" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>