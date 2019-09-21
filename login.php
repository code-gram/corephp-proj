<?php
session_start();
if(isset($_SESSION['uid'])){
    header('location:user/taskdashboard.php');
}

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css">
        <title>Task Mgmt | Login</title>
    </head>

    <body>
        <div class="container">
            <h1>Project Management App | Login</h1>

            <form action="login.php" method="post">

                <table border="1">
                    <tr>
                        <td>Login Name</td>
                        <td><input type="text" name="loginName" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>

                        <td colspan="2" align="right">
                            <a href="#">Registration</a>
                            <input type="submit" name="login" value="Login" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>

    </html>


    <?php
   include('db.php');
   if(isset($_POST['login'])) {
       $loginName = $_POST['loginName'];
       $password = $_POST['password'];
       $query = "SELECT * FROM users where loginname='$loginName' and password='$password'";
       $run = mysqli_query($con,$query);
       $row = mysqli_num_rows($run);
       if($row<1){
           ?>
        <script>
            alert("LoginName or Password is incorrect");
            window.open('location:login.php');

        </script>
        <?php
       }
       else{
           $data = mysqli_fetch_assoc($run);
           // session management
           
           $_SESSION['uid'] =$data['id'];
           header('location:user/taskdashboard.php');
           
           
       }
   }

?>
