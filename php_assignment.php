<?php
$marks = array(
    array(40, 40, 70),
    array(84, 34, 32),
    array(60, 30, 60),
    array(60, 50, 40),
    array(30, 45, 75),
    array(86, 28, 36),
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