<?php

session_start();
include 'dp.php';

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM posts WHERE id=$id");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,
    "UPDATE posts
     SET title='$title',
         content='$content'
     WHERE id=$id");

    echo "<script>
    alert('Post Updated Successfully');
    window.location='dashboard.php';
    </script>";
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Edit Post | BlogCMS</title>

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
    url('https://images.unsplash.com/photo-1499750310107-5fef28a66643');
    background-size:cover;
    background-position:center;
}

.container{
    width:700px;
    max-width:95%;
    padding:40px;
    border-radius:25px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);
    box-shadow:0 8px 32px rgba(0,0,0,0.3);
    color:white;
}

h1{
    text-align:center;
    margin-bottom:30px;
}

.input-box{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

input,
textarea{
    width:100%;
    padding:15px;
    border:none;
    outline:none;
    border-radius:12px;
    font-size:15px;
}

textarea{
    height:220px;
    resize:none;
}

.btn-group{
    display:flex;
    gap:15px;
}

.update-btn{
    flex:1;
    border:none;
    padding:15px;
    border-radius:10px;
    background:#14b8a6;
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
}

.update-btn:hover{
    background:#0f766e;
}

.back-btn{
    flex:1;
    text-decoration:none;
    text-align:center;
    padding:15px;
    border-radius:10px;
    background:#334155;
    color:white;
    font-weight:600;
}

.back-btn:hover{
    background:#1e293b;
}

</style>

</head>

<body>

<div class="container">

```
<h1>✏️ Edit Blog Post</h1>

<form method="POST">

    <div class="input-box">

        <label>Post Title</label>

        <input
        type="text"
        name="title"
        value="<?php echo $row['title']; ?>"
        required>

    </div>

    <div class="input-box">

        <label>Post Content</label>

        <textarea
        name="content"
        required><?php echo $row['content']; ?></textarea>

    </div>

    <div class="btn-group">

        <button
        type="submit"
        name="update"
        class="update-btn">
        ✅ Update Post
        </button>

        <a href="dashboard.php"
        class="back-btn">
        ← Back
        </a>

    </div>

</form>
```

</div>

</body>
</html>
