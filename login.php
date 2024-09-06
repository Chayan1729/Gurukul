<?php
session_start(); // Start the session

function findUser($username) {
    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $userData = json_decode(trim($line), true);
        if ($userData['username'] === $username) {
            return $userData;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
    $username = trim($_POST['username']);
    $Pass = trim($_POST['password']);

    $userdata = findUser($username);

    if ($userdata && password_verify($Pass, $userdata['password'])) {
        $_SESSION['username'] = $username; // Store username in session


        if($userdata['firstlogin']){
            header("Location: reset_password.php");
            echo "redirected to reset password";
            exit();
        }


        $redirectUrl = isset($_GET['redirect']) ? $_GET['redirect'] : 'add_update.php';
        header("Location: " . $redirectUrl);
        exit();
    } else {
        echo "Invalid username or password";
    }
}


if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['reset']))
    {
        $username=trim($_POST['username'],true);
        $Pass=trim($_POST['password'],true);

        $userdata=findUser($username);

        if($userdata && password_verify($Pass, $userdata['password'])){
            
                $_SESSION['username'] = $username;
                header("Location: reset_password.php");
                echo "redirected to reset password";
                exit();
        }

        else{
            echo "invalid Password or username";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./edit_pro.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container-fluid">
    <!-- Ensure the redirect parameter is preserved in the form action -->
    <form action="login.php<?php echo isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : ''; ?>" method="post" class="mx-auto">
        <h4 class="text-center">Login</h4>
        <div class="mb-3 mt-5">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <input type="submit" class="btn btn-primary mt-5" name="sub" value="Login">
        <input type="submit" class="btn btn-primary mt-5" name="reset" value="Reset Password">
    </form>
</div>
</body>
</html>
