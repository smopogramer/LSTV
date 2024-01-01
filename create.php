<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civilstat = $_POST['civilstat'];
    $contactnum = $_POST['contactnum'];
    $salary = $_POST['salary'];
    $isactive = isset($_POST['isactive']) ? 1 : 0;
    if (!empty($fullname) || !empty($address) || !empty($birthdate) || !empty($age) || !empty($gender) || !empty($civilstat) || !empty($contactnum) || !empty($salary)) {
        // Check if the account already exists
        $query = "SELECT * FROM employeefile WHERE fullname = '$fullname' OR contactnum = '$contactnum'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "Employee already exists!";
        } else {
            $sql = "INSERT INTO employeefile (fullname, address, birthdate, age, gender, civilstat, contactnum,salary,isactive)
                                VALUES('$fullname','$address','$birthdate','$age','$gender','$civilstat','$contactnum','$salary','$isactive')";
            try {
                $result = mysqli_query($conn, $sql);
                header("Location: read.php");
                echo "registered";
            } catch (mysqli_sql_exception) {
                echo "Error";
            }
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar" style="background-color: #e3f2fd;">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Logout</a>
            </li>
    </nav>
    <form method="post">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="fullname" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="address" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Birthdate</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputPassword3" name="birthdate" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPassword3" name="age" required>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="female">
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="other">
                    <label class="form-check-label" for="gridRadios3">
                        Other
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Civil Status</label>
            <select class="form-select" id="inputGroupSelect01" name="civilstat">
                <option value="Single" selected>Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact no</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputEmail3" name="contactnum" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Salary</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputEmail3" name="salary" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="isactive" name="isactive">
                    <label class="form-check-label" for="isactive">
                        Active
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Record</button>
    </form>
</body>

</html>