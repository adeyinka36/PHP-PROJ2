<?php
// Generate random questions
$questions=[];


function generateRandQues(){
    $num1 = rand(10,99);
    $num2= rand(10,99);
    while($num1==$num2){
    $num2=rand(10,99);
    }
    $answer=$num1+$num2;
    
    // get random incorrect numbers 
    $num1high=$answer+10;
    $num1Low=$answer-10;
    $wrong1= rand(20,198);
    while($wrong1==$num1||$wrong1==$num2||$wrong1==$answer||$wrong1<$num1Low||$wrong1>$num1high){
        $wrong1= rand(20,198);
    }

    $num2high=$answer+10;
    $num2Low=$answer-10;
    $wrong2= rand(20,198);
    while($wrong2==$num1||$wrong2==$num2||$wrong2==$answer||$wrong2==$wrong1||$wrong2<$num2Low||$wrong2>$num2high){
        $wrong2= rand(20,198);
    }
   

    return [
        
        "leftAdder" =>$num1,
        "rightAdder" =>$num2,
        "correctAnswer" =>$answer,
        "firstIncorrectAnswer" =>$wrong1,
        "secondIncorrectAnswer" => $wrong2,
    ];
}


// Loop for required number of questions
while(count($questions)<10){
    $answers=[];

   if(count($questions)!=0){
       foreach($questions as $ques){
           array_push($answers,$ques["correctAnswer"]);
       }
   }
   $newQues=generateRandQues();
   foreach($answers as $ans){
       while($newQues["correctAnswer"]==$ans){
           $newQues=generateRandQues();
       }
   }
   
   array_push($questions,$newQues);
    

}

// Get random numbers to add

// Calculate correct answer

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

// Add question and answer to questions array