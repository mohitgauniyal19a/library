<?php
$link=  mysqli_connect('localhost', 'root', '', 'at') or die("Can't connect to the server");
session_start();
$login = "student_login_".$_SESSION['branch'].'_'.$_SESSION['semester'];
$attendance = "student_attendance_".$_SESSION['username'];
$query = "SHOW TABLES LIKE '$login'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    $query = "CREATE TABLE `at`.`$login` (`sno` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,`name` VARCHAR(50) NOT NULL ,`dob` DATE NOT NULL , `semester` INT(2))";
}