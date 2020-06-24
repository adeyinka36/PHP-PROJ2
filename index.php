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
    <?php include 'inc/generate_questions.php'?>
    <?php 
    session_start();
    // checking if student had had 10 attempts
    if(isset($_SESSION["number"])&&intval($_SESSION["number"])>=10){
       
        session_destroy();
        session_start();
    }
    

     ?>
    <?php
    //  recieving student answer and storing number of attempts in sessions or initialing number of attempted questions to 1 if its first question 
    if(isset($_POST["answer"])){
     if(isset($_SESSION["number"])){
        $_SESSION["number"]=strval(intval($_SESSION["number"]+1));
    }
    else{
        $_SESSION["number"]=strval(1);
    }
}
    ?>
    <!-- genrating questions and getting corret question number from sessions -->
    <?php generateRandQues()?>
    <?php if(isset($_SESSION["number"])&&intval($_SESSION["number"])<10){
    $questionNumber=intval($_SESSION["number"]);}
    else{
        $questionNumber=0;
    };?>
    <?php
    
    // redloadind to clear post and  to generate new question afer each attempt
    if(isset($_POST["answer"])){
    $selected=$_POST["answer"];
    header("Refresh:0; url=index.php");
    }
    
    
    ?>
    <div class="container">
    
        <div id="quiz-box">
            <p class="breadcrumbs">Question <?php echo $questionNumber+1 ?> of <?php echo count($questions) ?></p>
            <p class="quiz">What is <?php echo $questions[$questionNumber]["leftAdder"] ?>+ <?php echo $questions[$questionNumber]["rightAdder"] ?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="0" />
                <input type="submit" class="btn" name="answer" value=<?php echo $questions[$questionNumber]["firstIncorrectAnswer"] ?> />
                <input type="submit" class="btn" name="answer" value= <?php echo $questions[$questionNumber]["secondIncorrectAnswer"] ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $questions[$questionNumber]["correctAnswer"] ?> />
            </form>
        </div>
    </div>
</body>
</html>