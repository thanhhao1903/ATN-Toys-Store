<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BuBu</title>
    <link rel="stylesheet" href="../css1/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Header -->
    <?php
        require_once 'header.php';
    ?>

    <?php
    include_once 'connectProduct.php';
    if(isset($_POST['btnRegister']))
    {
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $staffname = $_POST['staff_name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $sql = "INSERT INTO `staff`(`staff_name`, `email`, `address`, `password`, `phone`, `shop_id`) VALUES  (?,?,?,?,?,?)"; //where product_id = $_GET['product_id']
        $re = $dblink->prepare($sql);

        $stmt = $re->execute(array("$staffname","$email","$address","$password","$phone",1));
        if($stmt){
                echo "Success";
        }else{
                echo "Error";
        }
    }
    ?>

    <!-- Registration -->
    <main>
        <div class="container">
            <div class="register">
                <h2>REGISTER NEW MEMBER</h2>
                <form action="#" method="post">
                    <div class="col-sm-10"><input type="text" name="staff_name" id="staff_name" class="form-control" placeholder="Full Name" value="" required/></div>
                    <div class="col-sm-10"><input type="text" name="address" id="address" class="form-control" placeholder="Address" value="" required/></div>
                    <div class="col-sm-10"><input type="text" name="email" id="email" class="form-control" placeholder="Email" value="" required/></div>
                    <div class="col-sm-10"><input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="" required/></div>
                    <div class="col-sm-10"><input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" required/></div>
                    <div class="register-btn"><input type="submit" class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/></div>
                    <div class="back-btn"><a href="login.php">Back to Login</a></div>
                    <br>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>