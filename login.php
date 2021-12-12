<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginRegister.css">
    <title>Login</title>
</head>
<body>
    <div class="fundo">
        <?php
        require('connectionBD.php');
        session_start();

        if(isset($_POST['uname'])){
            $uname = $_REQUEST['uname'];
            $psw = $_REQUEST['psw'];
            $loginquery = "SELECT * FROM cliente WHERE username = '$uname' AND password = '$psw';
                        VALUES ('$uname', '$psw')";
            
            $cliente = pg_query($connection, $loginquery);

            $rows = pg_num_rows($cliente);

            if($rows == 1){
                $_SESSION['uname'] = $username;
                header("Location: Homepage.php");
            }
        } else {
        ?>
            <div class="logoLogin">
                <img src="imagens/Logo.png">
            </div>

            <div class="formLogin">
                <form method="post">
                    <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw">
                        
                    <button type="submit" class="mainBtn">Login</button>
                    <span >Haven't registred yet?<a href="register.php">Sign up</a></span>
                    </div>
                </form>
            </div>
        <?php
            }
        ?>
    </div>
</body>
</html>