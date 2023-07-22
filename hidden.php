<?php
// Establish a database connection
include 'config.php';

// Handle form submission
if (isset($_POST['submit'])) {
   // Retrieve the form inputs
   $email = $_POST['email'];
   $pin = $_POST['pin'];

   // Perform necessary validation and sanitize the inputs
   // ...

   // Update the PIN for the existing user in the database
   $sql = "UPDATE users SET pin = '$pin' WHERE email = '$email'";
   if (mysqli_query($conn, $sql)) {
      // Display a success message or redirect to a success page
      $message[] = 'PIN updated successfully!';
   } else {
      // Display an error message or handle the error
      $message[] = 'Erorr: ' . mysqli_error($conn) ;
   }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Pin</title>

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
   <form action="" method="post">
      <h3>Create Pin</h3>
      <input type="email" name="email" placeholder="Enter your email" required class="box">
      <input type="password" name="pin" placeholder="Enter your PIN" required class="box">
      
      <input type="submit" name="submit" value="Update PIN" class="btn">
      <p>Get Back? <a href="login.php">Back</a></p>
   </form>
</div>

</body>
</html>
