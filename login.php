<?php
if (isset($_POST['cancel'])){
  header("Location:index.php");
  return;
}
$message='';

if (isset($_POST['pass']) && isset($_POST['who'])){

  if (strlen($_POST['pass']) < 1 || strlen($_POST['who']) < 1){
          $message="User name and password are required";
        } else {
          $password = $_POST['pass'];
          $salt = 'XyZzy12*_';
          $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

          $correctpassword=$salt.$password;
          $md5 = hash('md5', $correctpassword);

          if ($md5==$stored_hash){
            header("Location: game.php?name=".urlencode($_POST['who']));
          }
          else{
            $message="Incorrect Password";
          }
        }
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HAZEL PIK YEN YAP 12a9d091 | Rock Paper Scissors</title>
    <style media="screen">
      h1{
        font-family:  Times;
      }
      #htmlent{
        color:red;
      }
      input{
        margin:4px;
      }
    </style>
  </head>
  <body>
      <h1>Please Log In</h1>
      <p id="htmlent"><?= htmlentities($message); ?></p>
      <form action="login.php" method="post">
        <label for="who">User Name</label>
        <input type="text" name="who" > <br>
        <label for="pass">Password</label>
        <input type="password" name="pass"> <br>
        <input type="submit" name="login" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
        <p>For a password hint, view source and find a password hint in the HTML comments. <!-- Hint: The password is the three character name of the
programming language used in this class (all lower case)
followed by 123. --></p>
      </form>
  </body>
</html>
