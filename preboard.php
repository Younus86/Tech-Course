<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 /* Data Types:
    premitive / builtin data types
    Integer 1,2 3,4
    Char a, b, c
    bool False, True
    string 'waqas'
    float 22.3 4.5. 6.5

    array: 
    PHP is a loosely typed languages
     

 */
    //$a = 45;
    //$b = 10;

    //$x = $a + $b;

/*
    $color = "Green";
print_r($color);
$unit_price = 89;
$cost = 10;
    
$total_cost = $unit_price * $cost;

    
print_r($total_cost);
echo "<br>";
var_dump($unit_price);

echo "<br>";
var_dump ("This ", "string ", "was ", "made ", "with multiple parameters.");

$x = 100;  
$y = 50;

echo $x && $y;
*/

//for ($i = 0; $i < 3; ++$i){
 //   echo "#";
 //   echo "<br>";
//}


/**
 * Please write a computer program that can write the values
 * N number of students, where each student's Maths are Given.
 * 
 * Provided that N is an iniger, whose values are:
 * 0 < N < 500
 * where marks are 4, 5 ,33, 66, 88, 11, 22, 33, 44, 55
 * 
 * */
// Array: an arra yis a collection of memory cells where you store similar records
//in consecutive locations where first element is 0 and last is n - 1


 
$marks = array(
    array(42, 46, 80),
    array(84, 34, 24),
    array(1000, 30, 80),
    array(65, 50, 45),
    array(20, 45, 75),
    array(88, 28, 36),
    array(44, 66, 40),
    array(45, 60, 45),
    array(10, 60, 80),
    array(50, 70, 30),
    array(60, 30, 60),
    array(70, 30, 50),
    array(60, 20, 70),
    array(45, 45, 60),
    array(40, 50, 60)
);
// Marks of N Student is 150 Which is Sum of English, Maths and Sciece.
$n = 15;
for ($i = 0; $i < $n; $i++) {
    $sum_total = $marks[$i][0] + $marks[$i][1] + $marks[$i][2];
    echo "Marks for Student: " . $sum_total . " where 150 is sum of English: " 
    .$marks[$i][0]. ", Maths: " .$marks[$i][1]. ", Science: " .$marks[$i][2];
    echo "<br>";
}


// Average of English Marks
$sum_eng = 0;

for ($i = 0; $i < count($marks); $i++) {
    $sum_eng += $marks[$i][0];
    echo $marks[$i][0];
    echo "<br>";
    echo "<br>";
}

$average_eng = $sum_eng / $n;
$average_eng = number_format($average_eng, 1);

echo "Average English marks for whole class  " . $average_eng;

//Average of Maths Marks
$sum_math = 0;

for ($i = 0; $i < count($marks); $i++) {
    $sum_math += $marks[$i][1];
    echo $marks[$i][1];
    echo "<br>";
}

$average_math = $sum_math / $n;
$average_math = number_format($average_math, 1);

echo "Average Maths marks for whole class : " . $average_math;

// Average of Science Marks
$sum_sci = 0;

for ($i = 0; $i < count($marks); $i++) {
    $sum_sci += $marks[$i][2];
    echo $marks[$i][2];
    echo "<br>";
}

$average_sci = $sum_sci / $n;
$average_sci = number_format($average_sci, 1);

echo "Average Science marks for whole class : " . $average_sci;



 ?>