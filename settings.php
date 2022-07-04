<?php
include 'connect.php';

if (isset($_POST['go'])) {
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `user` WHERE id='admin'";
    $run = mysqli_query($con, $sql);
    $values = mysqli_fetch_assoc($run);
    $password = $values['password'];
    if ($pass == $password) {
        header('location:change.php');
    } else {
        echo 'Wrong password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Settings</title>
    <link rel="stylesheet" href="settingshotel.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="outset">
        <div class="inset">
            <form method="post">
                <div class="text">
                    <input type="password" name="pass" id="pass" style="margin-top: 8%;"
                        placeholder="Enter your password">
                    <span class="eye" style="postion: absolute; top: 55%;"onclick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit" name="go" class="btn btn-other setbtn-other">Go</button>
                <button type="button" onclick="location.href='admin_home.php';" class="btn btn-danger setbtn-danger">Cancel</button>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("pass");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if (x.type === 'password') {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>

</html>