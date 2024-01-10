<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    $page = null;
    if($_SERVER['PHP_SELF'] == "/BPMS/index.php") {
    $page = "HOME";
    }elseif($_SERVER['PHP_SELF'] == "/BPMS/login.php"){
    $page = "LOGIN";
    }elseif($_SERVER['PHP_SELF'] == "/BPMS/signup.php"){
    $page = "SIGN UP";
    }elseif($_SERVER['PHP_SELF'] == "/BPMS/account.php"){
    $page = "ACCOUNT";
    }elseif($_SERVER['PHP_SELF'] == "/BPMS/change_pass.php"){
    $page = "RESET";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backpacks</title>
    <link rel="icon" href="./assets/images/logoo.png">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="full_content">

        <div class="side_bar_cont">
            <div class="side_bar_info"><span class="info"><?php echo $page;?></span></div>
            <div class="side_bar_title"><span class="title">Backpacks Management System</span></div>
            <div class="side_bar_logo"><img class="sb_logo" src="./assets/images/logoo.png" alt="Logo"></div>
        </div>

        <div class="main_content">
            <div class="top_bar_cont">
                <div class="top_bar_logo"><a href="./index.php"><img class="tb_logo" src="./assets/images/logoo.png" alt="Logo"></a></div>
            </div>

            <div class="main_content_without_topbar">






