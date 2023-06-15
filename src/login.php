<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BuBu</title>
    <link rel="stylesheet" href="./css1/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Header -->
    <?php
        require_once 'header.php';
    ?>

    <?php
    require_once 'connectProduct.php';
    if (isset($_POST['btnLogin'])) 
    {
        if (isset($_POST['txtpassword']) && isset($_POST['txtemail']))
        {
            $email = $_POST['txtemail'];
            $pwd = $_POST['txtpassword'];
            $c = new Connect();
            $dblink = $c->connectToPDO();
            $sql = "select * from staff where email = ? and password = ?";
            $stmt = $dblink->prepare($sql);
            $re = $stmt->execute(array("$email","$pwd"));
            $numrow = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_BOTH);
            if ($numrow == 1) 
            {
                echo "Login successfully";
                $_SESSION['Email'] = $row['email'];
                $_SESSION['ID'] = $row['staff_id'];
                $_SESSION['Shop_id'] = $row['shop_id'];
                header("Location: homepage.php");
            } 
            else
            {
                echo "Login failed <br>";
            }
        } 
        else
        {
            echo "Please enter your info";
        }
    }
    ?>
    <main>
        <div class="container">
            <div class="login">
                <h2>LOGIN</h2>
                <form action="#" method="post">
                    <div class="col-sm-10"><input type="text" name="txtemail" id="email" class="form-control" placeholder="Email" value="" required/></div>
                    <div class="col-sm-10"><input type="password" name="txtpassword" id="password" class="form-control" placeholder="Password" value="" required/></div>
                    <div class="login-btn"><input type="submit" class="btn btn-primary" name="btnLogin" id="btnLogin" value="Login"/></div>
                    <div class="register-btn"><a href="register.php">Sign up</a></div>
                    <br>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
        require_once 'footer.php';
    ?>
</body>
</html>