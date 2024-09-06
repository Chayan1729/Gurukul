<?php
session_start();

// Check if the username is available in the session
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect back to login if username is not set
    exit();
}

$username = $_SESSION['username'];

function validatePassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{7,}$/', $password);
}


function findUser($username) {
    $lines = file("users.txt",FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $userData = json_decode(trim($line), true);
        if ($userData['username'] === $username) {
            return $userData;
        }
    }
    return null;
}
function FindAndUpdate($username,$updatedData){
    
    $updated_lines=[];
    $lines = file("users.txt",FILE_IGNORE_NEW_LINES);
    foreach($lines as $line)
    {
        $userdata=json_decode(trim($line), true);
        if($userdata['username']=== $username){
            $userdata = array_merge($userdata, $updatedData);
        }

        $updated_lines[] = json_encode($userdata) . PHP_EOL;

    }

    $fp=fopen('users.txt','w');
    if(!$fp){
        exit('unable to open the file');
    }

    foreach($updated_lines as $line){
        fwrite($fp,$line);
    }

    fclose($fp);
}


    if($_SERVER['REQUEST_METHOD']=== 'POST')
    {
        if(isset($_POST['sub'])){
            $oldPassword = trim($_POST['oldpassword']);
            $newPassword = trim($_POST['password']);
            $confirmPassword = trim($_POST['cnfpassword']);

            $userData = findUser($username);

            if($userData && password_verify($oldPassword, $userData['password'])){
                if ($newPassword === $confirmPassword && validatePassword($newPassword)){
                    $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                    FindAndUpdate($username, [
                        'password' => $newHashedPassword,
                        'firstlogin' => false
                    ]);
                    header("Location: login.php");
                    echo "Password reset successful!";
                }
                else{
                    echo "passwords donot matches or do meet the requirements ";
                }
            }
            else{
                echo "either username or password is invalid";
            }

        }
    }




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./edit_pro.css" rel="stylesheet" >
    <title>Reset Password</title>
</head>
<body>
        <div class="container-fluid">
        <form action="reset_password.php" method="post" class="mx-auto">
            <h4 class="text-center">Reset Password</h4>
            <div class="mb-3 mt-5">
                  <!-- <label for="exampleInputEmail1" class="form-label">User Name</label> -->
                  <input type="hidden" class="form-control" id="exampleInputEmail1" name="username" value="<?php echo htmlspecialchars($username)?>">
                </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="oldpassword" required>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="cnfpassword" required>

            </div>


            <input type="submit" class="btn btn-primary mt-5" name="sub" value="Sign Up">
            </form>
        </div>
           
        </form>
    </div></div>
    </body>
</html>
