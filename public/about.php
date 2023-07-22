<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <style>
.heading {
   min-height: 30vh;
   display: flex;
   flex-flow: column;
   align-items: center;
   justify-content: center;
   gap: 1rem;
   background:linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(images/12.webp) no-repeat;
   background-size: cover;
   background-position: center;
   text-align: center;
}
.heading h3{
   font-size: 5rem;
   color:var(--white);
   text-transform: uppercase;
}

.heading p{
   font-size: 2.5rem;
   color:var(--light-color);
}

.heading p a{
   color:var(--purple);
}

.heading p a:hover{
   text-decoration: underline;
}
   </style>
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We provide:</p>
      <ul class="features-list" >
      <h1><li>High-quality and reliable code solutions</li></h1>
      <h1><li>A wide selection of programming languages and frameworks</li></h1>
      <h1><li>Experienced and skilled developers</li></h1>
      <h1><li>Secure and convenient purchasing process</li></h1>
      </ul>
         <a href="contact.php" class="btn">contact us</a>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>