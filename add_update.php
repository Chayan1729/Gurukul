
<?php
session_start();



if (!isset($_SESSION['username'])) {
    header("Location: login.php?redirect=add_update.php");
    exit();
}
$filename1 = "conference.txt";
$filename2 = "Journal.txt";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Submit'])) {
    

    $Type=$_POST['publicationType'];

    if($Type==='Conference'){
        $file = fopen($filename1, "a");

        $pub = htmlspecialchars(trim($_POST['publications']));
        if (!empty($pub) && $file) {
            fwrite($file, $pub."\n");
            fclose($file);
        }
    }

    if($Type==='Journal'){
        $file = fopen($filename2, "a");

        $pub = htmlspecialchars(trim($_POST['publications']));
        if (!empty($pub) && $file) {
            fwrite($file,"\n". $pub."\n");
            fclose($file);
        }
    }

    header("Location: index.php");
    exit();



    
} 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>Update Publication Page</title>
</head>
<body>
<div class="body">
    <div class="textbox-container">
        <h2>Enter Your Publications</h2>
        <form action="add_update.php" method="post">
            <label for="publicationType">Choose Type of Publication:</label>
            <select name="publicationType" id="publicationType">
                <option value="Journal">Journal</option>
                <option value="Conference">Conference</option>
            </select>

            <label for="publications">Enter details:</label>
            <textarea class="designer-textbox" rows="8" id="publications" name="publications" type="text" placeholder="Type here..."></textarea>

            <input class="designer-button" type="submit" name= "Submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
