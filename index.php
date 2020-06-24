<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time() ?>">
</head>
<body>
    <?php include 'inc/generate_questions.php'?>
    <?php 
    session_start();
    if(!isset($_SESSION["score"])){
        $_SESSION["score"]=0;
    };
    $result=null;
    if(!isset($_SESSION["answers"])){
        $_SESSION["answers"]=[];
    };
    // checking if student had had 10 attempts
    if(isset($_SESSION["number"])&&intval($_SESSION["number"])>=9){
       
       header("Location:end.php");
        // header("Refresh:0; url=index.php");
        $_POST["answer"]=null;
    
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
    <?php generateRandQues();
    $_SESSION["total"]=count($questions);
    ?>
    <?php if(isset($_SESSION["number"])&&intval($_SESSION["number"])<10){
        if(isset($_POST["answer"])){
            $selected=$_POST["answer"];
           
           if($selected==$_SESSION["answers"][count($_SESSION["answers"])-1]){
            $_SESSION["score"]=strval(intval($_SESSION["score"]+1));
            $result="CORRECT!";
           }
           else{
              $result="INCORRECT!";
               
           };
            
            $_POST["answer"]=null;
            // header("Refresh:0; url=index.php");
            }
            
    $questionNumber=intval($_SESSION["number"]);}
    else{
        $questionNumber=0;
    };
    if(isset($_SESSION["answers"])){
    array_push($_SESSION["answers"],$questions[$questionNumber]["correctAnswer"]);
    }
    else{
        $_SESSION["answers"]=[];
        array_push($_SESSION["answers"],$questions[0]["correctAnswer"]);
    }
    ?>
    <?php
    
    // redloadind to clear post and  to generate new question afer each attempt
//     if(isset($_POST["answer"])){
//     $selected=$_POST["answer"];
   
//    if($selected==$_SESSION["answers"][count($_SESSION["answers"])-2]){
//        echo "yaii";
       
//    }
//    else{
//        echo "no";
       
//    };
// //    var_dump($_SESSION["answers"]);
//     $_POST["answer"]=null;
//     // header("Refresh:0; url=index.php");
//     }
    
    
//     ?>
    <div class="container">
          <h1><?php if($result=="CORRECT!"){
              echo $result;
          } 
          else if($result=="INCORRECT!"){
              echo $result;
          }
          ?></h1>
        <div id="quiz-box">
            <p class="breadcrumbs">Question <?php echo $questionNumber+1 ?> of <?php echo count($questions) ?></p>
            <p class="quiz">What is <?php echo $questions[$questionNumber]["leftAdder"] ?>+ <?php echo $questions[$questionNumber]["rightAdder"] ?>?</p>
            <form action="index.php" method="post">
                 <?php
                  $options=[
                      $questions[$questionNumber]["firstIncorrectAnswer"],
                      $questions[$questionNumber]["secondIncorrectAnswer"],
                      $questions[$questionNumber]["correctAnswer"]
                    ];
                  shuffle($options);
                  ?>
                <input type="hidden" name="id" value="0" />
                <input type="submit" class="btn" name="answer" value= <?php echo $options[0] ?> />
                <input type="submit" class="btn" name="answer" value= <?php echo $options[1] ?> />
                <input type="submit" class="btn" name="answer" value=<?php echo $options[2] ?> />
            </form>
        </div>
    </div>
</body>
</html>