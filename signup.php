<?php

    function validatePassword($password) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{7,}$/', $password);
    }

    if($_SERVER['REQUEST_METHOD']=== "POST"){
        if(isset($_POST['sub'])){
        $username=$_POST['username'];
        $pass=$_POST['password'];

        $valid_password=validatePassword($pass);
        if($valid_password){
            $hashedPassword=password_hash($pass,PASSWORD_BCRYPT);
            $user=array('username'=>$username,
            'password'=>$hashedPassword,
            'firstlogin'=>true);
            $fp=fopen("users.txt",'w');
            if(!($fp=fopen("users.txt",'w')))
            {
                exit("unable to open the file");
            }

            $userJosn=json_encode($user);
            fwrite($fp,$userJosn . PHP_EOL);

            fclose($fp);
            echo "Sign Up Successful";
        }

        else{
            echo "Weak Password";
        }
        }    
}


    else{
        echo "Invalid request method";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./edit_pro.css" rel="stylesheet" >
    <title>Sign Up</title>
</head>
<body>
<div class="container-fluid">
            <form action="signup.php" method="post" class="mx-auto">
                <h4 class="text-center">Sign Up </h4>
                <div class="mb-3 mt-5">
                  <label for="exampleInputEmail1" class="form-label">User Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>

                </div>

                <input type="submit" class="btn btn-primary mt-5" name="sub" value="Sign Up">
              </form>
        </div>

</body>
</html>


