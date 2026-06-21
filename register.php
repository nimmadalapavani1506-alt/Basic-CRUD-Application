<?php

include 'dp.php';

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$hashedPassword')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('Registration Successful');
                window.location='login.php';
              </script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | BlogCMS</title>

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
    url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d');
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
    margin-top:8px;
    color:#ddd;
}

.input-box{
    margin-bottom:20px;
}

.input-box label{
    display:block;
    margin-bottom:8px;
    font-weight:500;
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
    color:#fff;
    font-weight:600;
    text-decoration:none;
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
    <p>Create your account</p>
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
               placeholder="Create Password"
               required>
    </div>

    <button type="submit"
            name="register"
            class="btn">
        Register
    </button>

</form>

<div class="bottom">
    Already have an account?
    <a href="login.php">Login</a>
</div>
```

</div>

</body>
</html>
