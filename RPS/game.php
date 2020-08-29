<?php
if (isset($_POST['logout']) ) {
    header('Location:index.php');
    return;
}
if (isset($_GET['name'])){
    $message=$_GET['name'];
} else {
    die('Name parameter missing');
}

function check($computer, $human) {
  if ($human==$computer){
    return "Tie";
  }elseif ($human-$computer==1 || $human-$computer==-2){
    return "You Win";
  } else{
    return "You Lose";
  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HAZEL PIK YEN YAP 12a9d091 | Rock Paper Scissors</title>
    <style media="screen">
      pre{
        font-family: Times;
      }
    </style>
  </head>
  <body>
    <h1>Rock Paper Scissors</h1>
    <p>Welcome : <?=htmlentities($message)?></p>
    <form class="choose" method="post">
      <select class="choose" name="choose">
        <option value="-1" selected>Select</option>
        <option value="0">Rock</option>
        <option value="1">Paper</option>
        <option value="2">Scissors</option>
        <option value="3">Test</option>
      </select>
      <input type="submit" name="play" value="Play">
      <input type="submit" name="logout" value="Logout">
    </form>
<pre>
<?php
$names=array(0 => "Rock" , 1 => "Paper", 2 => "Scissors");
if (isset($_POST['choose'])){
        $human = $_POST['choose'];
        $computer = rand(0,2);
        $r=check($computer, $human);
        if ($human == -1){
          print "Please select a strategy and press Play.\n";
        }

        elseif ($human == 3) {
          for ($c=0;$c<3;$c++){
            for ($h=0;$h<3;$h++){
              $r= check($c,$h);
              print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
            }
          }
        }
        else {
            print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$r\n";
          }
      }
  else{
    print "Please select a strategy and press Play.\n";
  }
?>

</pre>
  </body>
</html>
