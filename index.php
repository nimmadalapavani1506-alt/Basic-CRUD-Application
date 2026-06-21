<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BlogCMS | Home</title>

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
    background:linear-gradient(135deg,#667eea,#764ba2);
}

.container{
    width:900px;
    max-width:95%;
    background:white;
    border-radius:25px;
    overflow:hidden;
    display:flex;
    box-shadow:0 20px 50px rgba(0,0,0,0.2);
}

.left{
    flex:1;
    background:linear-gradient(135deg,#14b8a6,#0f766e);
    color:white;
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.left h1{
    font-size:50px;
    margin-bottom:20px;
}

.left p{
    font-size:18px;
    line-height:1.8;
}

.right{
    flex:1;
    padding:60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.right h2{
    margin-bottom:15px;
    color:#1e293b;
}

.right p{
    text-align:center;
    color:#666;
    margin-bottom:30px;
}

.btn{
    display:block;
    width:220px;
    text-align:center;
    padding:14px;
    margin:10px 0;
    text-decoration:none;
    color:white;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.register{
    background:#14b8a6;
}

.login{
    background:#2563eb;
}

.btn:hover{
    transform:translateY(-3px);
}

</style>

</head>
<body>

<div class="container">

```
<div class="left">
    <h1>📝 BlogCMS</h1>

    <p>
        Welcome to BlogCMS. Create, manage,
        edit and publish your blog posts easily
        using PHP and MySQL CRUD operations.
    </p>
</div>

<div class="right">

    <h2>Welcome</h2>

    <p>
        Start your blogging journey by creating
        an account or login if you already have one.
    </p>

    <a href="register.php" class="btn register">
        Create Account
    </a>

    <a href="login.php" class="btn login">
        Login
    </a>

</div>
```

</div>

</body>
</html>
