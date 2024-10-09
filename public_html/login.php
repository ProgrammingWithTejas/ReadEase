<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  header("location: /ReadEase/public_html/");
    exit();
}

$error = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../private/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE Username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['Password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: /ReadEase/public_html/");
            exit();
        } else {
            $error = "Invalid password. Please try again.";
        }
    } else {
        $error = "Username not found. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | ReadEase</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="https://www.unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong>' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="wrapper">
        <h1>ReadEase</h1>
        <form action="login.php" method="post">
            <h1 style="color: #333;">LOGIN</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class="bx bxs-lock-alt"></i>
            </div>
            <button type="submit" class="btn login">Login</button>
        </form>
        <div class="signupDiv">
            <p>Don't have an account?&nbsp;</p><a href="/ReadEase/public_html/signup.php" class="text-decoration-none">Sign Up</a>
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
