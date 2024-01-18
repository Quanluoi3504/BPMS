<?php include_once("master/header.php");
include_once ('master/database.php');
?>

    <div id="signup_login_contact_form">
        <h1 class="text-center">RESET PASSWORD</h1>
        <div class="signup_login_contact_form_box">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") { //Check if reset button submit
                    if (empty($_POST['email'])) { //Check if any fields submitted but empty
                        echo "<p class=".htmlspecialchars('text-danger').">Please enter your email</p> ";
                    }elseif (empty($_POST['username'])) {
                        echo "<p class=".htmlspecialchars('text-danger').">Please enter your username</p> ";
                    }elseif (empty($_POST['new_password'])) {
                        echo "<p class=".htmlspecialchars('text-danger').">Please enter your new password</p> ";
                    }elseif (empty($_POST['password_retyped'])) {
                        echo "<p class=".htmlspecialchars('text-danger').">Retyped your password please</p> ";
                    }else { //If not empty
                        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
                        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
                        $new_password = $_POST['new_password'];
                        $new_hashed_password = password_hash($new_password,PASSWORD_DEFAULT);
                        $retyped_password = $_POST['password_retyped'];
                        if(!filter_var($email,FILTER_VALIDATE_EMAIL) || !preg_match('/@gmail\.com$/', $email)) { //Check if email submitted valid
                            echo "<p class=".htmlspecialchars('text-danger').">That's not a valid format of an email</p> ";
                        }elseif ($new_password != $retyped_password) { //Check if 2 password fields is match
                            echo "<p class=".htmlspecialchars('text-danger').">Password is not match</p> ";
                        }else { //If email is valid and password match
                            $email = mysqli_real_escape_string($conn, $_POST['email']);
                            $sql = "select username,user_pass,email from tbl_user where email = '$email'";
                            $result = mysqli_query($conn,$sql);
                            if ($result->num_rows == 0) { //Check if email  not existed
                                echo "<p class=".htmlspecialchars('text-danger').">Your email you typed in is not registered</p> ";
                            }else { //If existed
                                $row = $result->fetch_assoc();
                                if($row['username'] != $username) {
                                    echo "<p class=".htmlspecialchars('text-danger').">Wrong username</p> ";
                                }else {
                                    $update_new_pass = "update tbl_user set user_pass = '$new_hashed_password' where email = '$email'";
                                    $updated_new_pass = mysqli_query($conn,$update_new_pass);
                                    echo '<script>alert("Password changed successfully")</script>';
                                    header("Location:index.php");
                                }
                            }
                        }
                    }
                }?>
                <div class="row">
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Email: </label>
                    <div class="col-lg-8">
                        <input type="email" name="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Enter your email">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Username: </label>
                    <div class="col-lg-8">
                        <input name="username" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Enter your username">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">New pass: </label>
                    <div class="col-lg-8">
                        <input type="password" name="new_password" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Enter your new password">
                    </div>
                </div>
                <br>
                <div class="row">
                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg">Retype Pass: </label>
                    <div class="col-lg-8">
                        <input type="password" name="password_retyped" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Retype your new password">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-primary col-12">Reset</button>
            </form>
            <br>
            <div class="row">
                <a href="signup.php" class="text-info col-6">Signup?</a>
                <a href="login.php" class="text-info col-6">Login?</a>
            </div>
        </div>
    </div>
<?php $conn->close();?>
<?php include_once("master/footer.php"); ?>