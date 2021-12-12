<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginRegister.css">
    <title>Register</title>
</head>
<body>
    <div class="fundo">
        <?php
            require('connectionBD.php');
            // When form submitted, insert values into the database.
            if (isset($_POST['uname'], $_POST['psw'])) {
                $uname = ($_POST['uname']);
                $psw = ($_POST['psw']);
                $regsquery    = "INSERT into cliente (username, password)
                    VALUES ('$uname', '$psw')";
                $resultados   = pg_query($connection, $regsquery);  

                if ($resultados) {
                    echo "<div class='form'>
                        <h3>You are registered!!</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                        </div>";
                } else {
                    echo "<div class='form'>
                        <h3>Required fields must be filled</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                        </div>";
                }
            } else {
        ?>
            <div class="logoLogin">
                <img src="imagens/Logo.png">
            </div>

            <div class="formLogin">
                <form method="POST">
                    <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit" class="mainBtn">Sign up</button>
                    <span >Already have an account?<a href="login.php">Login</a></span>
                    </div>
                </form>
            </div>
        <?php
            }
            exit();
        ?>
    </div>
</body>
</html>