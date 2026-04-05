<?php
session_start();
require_once 'dbcon.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $db_connection->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password && $user['role'] === 'admin') {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = true;

        header("Location: /SAAD-WALEED/index.php");
        exit();
    } else {
        $error = "Admin login incorrect";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<style>
    body {
    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url("/SAAD-WALEED/background.png");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    height: 100vh;          
    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;      /* Niet omhoog of omlaag */   
    margin: 0;              
}
      form {
            background-color: rgba(44, 41, 41, 0.85); 
            padding: 30px;
            border-radius: 8px; 
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.8); 
            z-index: 10;
        }
         button {
            background-color: #32312f;
            color: #222;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

       

</style>
<body>
    <h2>Admin Login</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button style="color: #f1c40f;font-family: 'Kalam', cursive; 
        " type="submit">Login</button>  <button><a style="text-decoration: none;color: #f1c40f;font-family: 'Kalam', cursive; 
         " href="/SAAD-WALEED/index.php">Back</a></button>
    </form>
</body>
</html>