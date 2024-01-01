<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $recid = $_GET['id'];

    $sql = "SELECT * FROM employeefile WHERE recid = $recid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $recid = $row["recid"];
        $fullname = $row['fullname'];
        $address = $row['address'];
        $birthdate = $row['birthdate'];
        $age = $row['age'];
        $gender = $row['gender'];
        $civilstat = $row['civilstat'];
        $contactnum = $row['contactnum'];
        $salary =  $row['salary'];
        $isactive = $row['isactive'];
    } else {
        echo "Record not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recid = $_POST['recid'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civilstat = $_POST['civilstat'];
    $contactnum = $_POST['contactnum'];
    $salary = $_POST['salary'];
    $isactive = isset($_POST['isactive']) ? 1 : 0;


    $sql = "UPDATE employeefile SET fullname='$fullname', address='$address', birthdate='$birthdate', age='$age', gender='$gender'
    , civilstat='$civilstat', contactnum='$contactnum', salary='$salary', isactive='$isactive' WHERE recid='$recid'";
    $result = $conn->query($sql);

    header("Location: read.php");
    exit();
}
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
                <a class="nav-link active" aria-current="page" href="read.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
    </nav>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="recid" value="<?php echo $recid ?>">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="fullname" value="<?php echo $fullname; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $address; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Birthdate</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputPassword3" name="birthdate" value="<?php echo $birthdate; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPassword3" name="age" value="<?php echo $age; ?>" required>
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
                <option selected value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact no</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputEmail3" name="contactnum" value="<?php echo $contactnum; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Salary</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputEmail3" name="salary" value="<?php echo $salary; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="isactive" name="isactive" value="<?php echo $isactive; ?>">
                    <label class="form-check-label" for="isactive">
                        Active
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>

</html>