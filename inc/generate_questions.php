<?php
// Generate random questions
$questions=[];


function generateRandQues(){
    $num1 = rand(100,999);
    $num2= rand(100,999);
    while($num1==$num2){
    $num2=rand(100,999);
    }
    $answer=$num1+$num2;
    
    // get random incorrect numbers 

    $wrong1= rand(200,1100);
    if($wrong1==$num1||$wrong1==$num2||$wrong1==$answer){
        $wrong1= rand(200,1100);
    }

    
    $wrong2= rand(200,1100);
    if($wrong2==$num1||$wrong2==$num2||$wrong2==$answer||$wrong2==$wrong1){
        $wrong2= rand(200,1100);
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