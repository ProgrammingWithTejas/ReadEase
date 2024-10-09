<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  header("location: /ReadEase/public_html/");
  exit();
}
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../private/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $sql_check = "SELECT * FROM `users` WHERE `Username` = ?";
    $stmt = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result_check = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result_check) > 0) {
        $showError = "User already exists! Please login instead.";
    } else {
        if ($password == $cpassword) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`Username`, `Password`) VALUES (?, ?);";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $username, $hash_password);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                $showAlert = true;
            } else {
                $showError = "Something went wrong. Please try again.";
            }
        } else {
            $showError = "Passwords do not match! Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | ReadEase</title>
    <link rel="stylesheet" href="signup.css" />
    <link rel="stylesheet" href="https://www.unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>'. $showError.'</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="wrapper">
        <h1>ReadEase</h1>
        <form action="signup.php" method="post">
            <h1 style="color: #333;">SignUp</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="password" name="cpassword" placeholder="Confirm Password" required />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button type="submit" class="btn signup">SignUp</button>
        </form>
        <div class="signupDiv">
            <p>Already have an account?&nbsp;</p><a href="/ReadEase/public_html/login.php" class="text-decoration-none">Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
    const alert = document.getElementsByClassName("alert")[0];
    setTimeout(()=>{
        alert.classList.add("opacity-0")
    }, 5000);
    setTimeout(()=>{
        alert.classList.add("d-none");
    },5500);
    </script>
</body>
</html>
