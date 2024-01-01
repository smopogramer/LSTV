<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM registerforms WHERE username = '$username'";
    $result = $conn->query($sql);


    if (empty($username) || empty($password)) {
        echo "Username and password is required.";
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password = 'admin') {
                $_SESSION['username'] = $username;
                header("Location: menu.php");
            } else {
                echo "Invalid password";
                echo "$password . $row[password]";
            }
        } else {
            echo "User not found";
        }
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page">LSTV admin DB</a>
            </li>
    </nav>
    <h1 class="display-4">Login Page</h1>


    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" minlength="5" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" minlength="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>