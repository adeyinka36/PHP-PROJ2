<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   <?php session_start();?>
   <?php
    if(isset($_POST["choice"])){
       header("Location:index.php");
       session_destroy();
       session_start();
    }
   ?>

   <h2>You scored: <?php echo strval(intval($_SESSION["score"])+1)." of ".$_SESSION["total"]?></h2>
   <form method="post" action="end.php">
       <button type="submit"name="choice" value="play">Play Again</button>
</form>
</body>
</html>