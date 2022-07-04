<?php
include 'connect.php';

$sql = "SELECT * FROM `user` WHERE id='admin'";
$run = mysqli_query($con, $sql);
$values = mysqli_fetch_assoc($run);
$username = $values['username'];
$password = $values['password'];

if (isset($_POST['save'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "UPDATE `user` set username='$user',password='$pass' where id='admin'";
    $run = mysqli_query($con, $sql);
    if ($run) {
        echo 'Changed successfully!!';
        header('location:admin_home.php');
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
                    <input type="text" name="user"
                        value="<?php echo $username ?>">
                    <input type="password" name="pass" id="pass"
                        value="<?php echo $password ?>">
                    <span class="eye" onclick="myFunction()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </div>
                <button type="submit" name="save" class="btn btn-other setbtn-other" >Save</button>
                <button type="button" onclick="location.href='admin_home.php';"
                    class="btn btn-danger setbtn-danger">Cancel</button>
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