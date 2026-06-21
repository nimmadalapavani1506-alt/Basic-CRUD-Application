<?php

session_start();

include 'dp.php';

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['add_post']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(title,content)
            VALUES('$title','$content')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
                alert('Post Added Successfully');
                window.location='dashboard.php';
              </script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Create Post | BlogCMS</title>

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
    linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
    url('https://images.unsplash.com/photo-1455390582262-044cdead277a');
    background-size:cover;
    background-position:center;
}


.container{
    width:650px;
    padding:40px;

    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(12px);

    border-radius:20px;

    box-shadow:0 8px 30px rgba(0,0,0,.2);

    color:white;
}

h1{
    text-align:center;
    margin-bottom:30px;
}

.input-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:500;
}

input,
textarea{

    width:100%;
    padding:14px;

    border:none;
    outline:none;

    border-radius:10px;

    font-size:15px;
}

textarea{
    height:180px;
    resize:none;
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
    background:#0d9488;
}

.back-btn{

    display:inline-block;

    margin-top:15px;

    text-decoration:none;

    color:white;

    padding:12px 20px;

    border-radius:8px;

    background:#334155;
}

.back-btn:hover{
    background:#1e293b;
}

</style>

</head>
<body>

<div class="container">

    <h1>📝 Create New Post</h1>

    <form method="POST">

        <div class="input-group">

            <label>Post Title</label>

            <input
            type="text"
            name="title"
            placeholder="Enter Post Title"
            required>

        </div>

        <div class="input-group">

            <label>Post Content</label>

            <textarea
            name="content"
            placeholder="Write your blog content here..."
            required></textarea>

        </div>

        <button
        type="submit"
        name="add_post"
        class="btn">

        ➕ Publish Post

        </button>

    </form>

    <a href="dashboard.php" class="back-btn">
        ⬅ Back to Dashboard
    </a>


</div>

</body>
</html>