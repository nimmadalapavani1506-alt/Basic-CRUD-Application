<?php
session_start();
include 'dp.php';

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM posts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard | BlogCMS</title>

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
    background:
    linear-gradient(rgba(0,0,0,.35),rgba(0,0,0,.35)),
    url('https://images.unsplash.com/photo-1499750310107-5fef28a66643');
    background-size:cover;
    background-position:center;
    padding:30px;
}

.navbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 40px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    border-radius:15px;
    margin-bottom:25px;
}

.logo{
    color:white;
    font-size:30px;
    font-weight:700;
}

.logout-btn{
    text-decoration:none;
    background:#ef4444;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    font-weight:600;
}

.welcome{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    padding:35px;
    border-radius:20px;
    color:white;
    margin-bottom:25px;
}

.welcome h1{
    margin-bottom:15px;
}

.add-btn{
    display:inline-block;
    text-decoration:none;
    background:#14b8a6;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    margin-top:10px;
    font-weight:600;
}

.table-box{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    border-radius:20px;
    padding:25px;
}

.table-box h2{
    color:white;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:15px;
    overflow:hidden;
}

th{
    background:#14b8a6;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f5f9;
}

.edit{
    color:#2563eb;
    text-decoration:none;
    font-weight:600;
}

.delete{
    color:#ef4444;
    text-decoration:none;
    font-weight:600;
}

</style>

</head>
<body>

<div class="navbar">

    <div class="logo">
        📝 BlogCMS
    </div>

    <a href="logout.php" class="logout-btn">
        Logout
    </a>

</div>

<div class="welcome">

    <h1>
        Welcome,
        <?php echo $_SESSION['username']; ?> 👋
    </h1>

    <p>
        Manage your blog posts easily from your dashboard.
    </p>

    <a href="create.php" class="add-btn">
        ➕ Add New Post
    </a>

</div>

<div class="table-box">

    <h2>📚 All Blog Posts</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while($row=mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['title']; ?></td>

            <td><?php echo $row['content']; ?></td>

            <td><?php echo $row['created_at']; ?></td>

            <td>
                <a class="edit"
                href="edit.php?id=<?php echo $row['id']; ?>">
                Edit
                </a>

                |

                <a class="delete"
                href="delete.php?id=<?php echo $row['id']; ?>">
                Delete
                </a>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>