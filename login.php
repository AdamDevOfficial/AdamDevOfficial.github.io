<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('Query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {
         if (isset($_POST['user_type']) && $_POST['user_type'] === 'admin') {
            if (isset($_POST['pin']) && !empty($_POST['pin'])) {
               $pin = mysqli_real_escape_string($conn, $_POST['pin']);

               if ($row['pin'] === $pin) {
                  $_SESSION['admin_name'] = $row['name'];
                  $_SESSION['admin_email'] = $row['email'];
                  $_SESSION['admin_id'] = $row['id'];
                  header('location: admin_page.php');
                  exit; // Add an exit statement after redirecting to prevent further execution
               } else {
                  $message[] = 'Incorrect PIN!';
               }
            } else {
               $message[] = 'Please enter the PIN!';
            }
         }
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location: home.php');
         exit; // Add an exit statement after redirecting to prevent further execution
      }
   } else {
      $message[] = 'Incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if (isset($message)) {
   foreach ($message as $msg) {
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">
   <form action="" method="post" id="123">
      <h3>Login Now</h3>
      <input type="email" name="email" id="email" placeholder="Enter your email" required class="box">
      <input type="password" name="password" placeholder="Enter your password" required class="box">
      
      <select name="user_type" class="box" required>
         <option value="" disabled selected>Select user type</option>
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      
      <?php if (isset($_POST['user_type']) && $_POST['user_type'] === 'admin'): ?>
         <input type="password" name="pin" placeholder="Enter your PIN" class="box">
      <?php endif; ?>
      <p><a href="reset_password.php">Forgot Your Password?</a></p>
      <input type="submit" name="submit" value="Login Now" class="btn">
      <p>Don't have an account? <a href="index.php">Register Now</a><a href="hidden.php">.</a></p>
   </form>
</div>

</body>
</html>
