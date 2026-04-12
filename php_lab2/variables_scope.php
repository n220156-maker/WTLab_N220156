<?php
// Datatypes
$name = "Shalini";   // string
$age = 21;           // integer
$marks = 85.5;       // float
$isStudent = true;   // boolean
$subjects = array("Maths", "Physics", "Chemistry"); // array

echo "Name: $name <br>";
echo "Age: $age <br>";
echo "Marks: $marks <br>";
echo "Student: $isStudent <br>";
print_r($subjects);

function localTest(){
    $x=10;
    echo "<br>Local: $x";
}
localTest();

$y=20;
function globalTest(){
    $y=10;
    echo "<br>Local: $y";
}
globalTest();

function staticTest() {
    static $z = 0;
    $z++;
    echo "<br>Static: $z";
}
staticTest();
staticTest();
staticTest();



?>