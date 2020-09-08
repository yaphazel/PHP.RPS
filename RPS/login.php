<?php
if (isset($_POST['cancel'])){
  header("Location:index.php");
  return;
}
$message='';

if (isset($_POST['pass']) && isset($_POST['who'])){

  if (strlen($_POST['pass']) < 1 || strlen($_POST['who']) < 1){
          $message="*User name and password are required";
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
    <title>HAZEL PIK YEN YAP | Rock Paper Scissors</title>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
      <h1>Rock Paper Scissors</h1>
      <div class="form-container">
        <h2>User Login</h2>
        <p id="htmlent"><?= htmlentities($message); ?></p>
        <form action="login.php" method="post">
          <input type="text" name="who" placeholder="Username" > <br>
          <input type="password" name="pass" placeholder="Password"> <br>
          <input class="button" type="submit" name="login" value="LOGIN"> <br>
          <input class="button" type="submit" name="cancel" value="CANCEL">
          <p>For a password hint, view source and find a password hint in the HTML comments. <!-- Hint: The password is the three character name of the
  programming language used in this class (all lower case)
  followed by 123. --></p>
        </form>
      </div>

  </body>
</html>
