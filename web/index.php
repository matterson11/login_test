<?php

session_start();
include('header.php');
include_once '../bootstrap.php';

if (isset($_SESSION['user']) != "") {
    header("Location: account.php");
    exit;
}

if ($_POST['login']) {
    $username = $dbconfig->real_escape_string(trim($_POST['username']));
    $password = $dbconfig->real_escape_string(trim($_POST['password']));

    $login_query = $dbconfig->query("insert into login_attempt(user_id, attempt_at) 
        values ('".$_SESSION['user']."', NOW())");

    $query = $dbconfig->query("SELECT * FROM users WHERE username='".$username."'");
    $row = $query->fetch_array();

    $login_query = $dbconfig->query("insert into login_attempt(user_id, attempt_at) 
        values ('".$row['id']."', NOW())");

    if ($row['username'] == $username && $row['password'] == md5($salt, $password)) {
        $_SESSION['user'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: account.php");
        
    } else {
        $msg = "Email and/or Password Incorrect!";
    }
}

?>
<div class="container">

    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <h2 class="text-center">Log In</h2>
            <form method="post" class="col-md-12">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" name="username" placeholder="enter username" autofocus required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" placeholder="enter password" required>
                </div>
                <input type="submit" class="btn btn-default" name="login" value="Log In">
                <div class="form-group">
                    <span style="color:red;"><?php echo $msg; ?></span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>