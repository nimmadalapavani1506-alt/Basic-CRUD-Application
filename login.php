<?php

session_start();
include 'dp.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username'");

    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password']))
    {
        $_SESSION['username'] = $user['username'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | BlogCMS</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
    linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),
    url('https://images.unsplash.com/photo-1499750310107-5fef28a66643');
    background-size:cover;
    background-position:center;
}

.container{
    width:420px;
    padding:40px;
    border-radius:25px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    box-shadow:0 8px 32px rgba(0,0,0,0.3);
    color:white;
}

.logo{
    text-align:center;
    margin-bottom:30px;
}

.logo h1{
    font-size:35px;
}

.logo p{
    color:#ddd;
    margin-top:8px;
}

.input-box{
    margin-bottom:20px;
}

.input-box label{
    display:block;
    margin-bottom:8px;
}

.input-box input{
    width:100%;
    padding:14px;
    border:none;
    outline:none;
    border-radius:10px;
    font-size:15px;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#14b8a6;
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#0f766e;
}

.bottom{
    text-align:center;
    margin-top:20px;
}

.bottom a{
    color:white;
    text-decoration:none;
    font-weight:600;
}

.bottom a:hover{
    text-decoration:underline;
}

</style>

</head>
<body>

<div class="container">

```
<div class="logo">
    <h1>📝 BlogCMS</h1>
    <p>Welcome Back</p>
</div>

<form method="POST">

    <div class="input-box">
        <label>Username</label>
        <input type="text"
               name="username"
               placeholder="Enter Username"
               required>
    </div>

    <div class="input-box">
        <label>Password</label>
        <input type="password"
               name="password"
               placeholder="Enter Password"
               required>
    </div>

    <button type="submit"
            name="login"
            class="btn">
        Login
    </button>

</form>

<div class="bottom">
    Don't have an account?
    <a href="register.php">Register</a>
</div>
```

</div>

</body>
</html>
