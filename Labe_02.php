<?php 
//Rafiullah Siddiqi
//ID:R010003

//task 1
class Library{
    const MAX_BOOKS=3;
}
     
    echo "Maximum booksallowds: " . Library::MAX_BOOKS;
    echo "<br>";
    //task2
    class StudentsCounter{
        public static $count=0;
        public static function addStudent(){
self::$count++;

        }
}
studentCounter::addStudent();
studentCounter::addStudent();
studentCounter::addStudent();

 echo"Total Students:" . StudentCounter ::$count;
 echo "<br>";

 //task 3
 abstract class Vehicle{
    abstract public  function start(){
        echo "Car engine Strated.";

    }
 }
 class Bike extends Vehicle{
    public function start(){
        echo"Bike started.";
    }
 }

 $car=new Car();
 $bike=new Bike();

 $car->start();
 echo "<br>";
 $bike->start;

?>