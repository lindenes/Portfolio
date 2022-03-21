<?php
$PersonName = $_POST['name'];
$PersonMail = $_POST['mail'];
$PersonPhone = $_POST['phone'];
$PersonComm = $_POST['comm'];


$DayStart =  $_POST['StartDay'];

$MonthStart = $_POST['StartMonth'];

$TimeStart =   $_POST['time'];

$DayStop = $_POST['StopDay'];

$MonthStop = $_POST['StopMonth'];

$TimeStop =  $_POST['Stoptime'];
$YearStart = $_POST['startYear'];

$YearStop = $_POST['stopYear'];




$ThisTime = $YearStart."-".$MonthStart."-".$DayStart."-".$TimeStart;
$ThanTime = $YearStop."-".$MonthStop."-".$DayStop."-".$TimeStop;

    // timestamp первой даты
 

// Количество секунд
// Функция abs нужна, чтобы не проверять какая из двух дат больше
//2021-08-23T13:30
$output_format = 'Y-m-d-H';
$step = '+1 hour';
$dates = array();
$current = strtotime($ThisTime)-10800;
$last = strtotime($ThanTime)-10800;
while( $current <= $last ) {
$dates[] = date($output_format, $current);
$current = strtotime($step, $current);
}


for($i=0;$i < count($dates); ++$i){


$host = 'localhost'; // адрес сервера 
$database = 'u1225959_info_order'; // имя базы данных
$user = 'u1225959_user_up'; // имя пользователя
$password = 'G3f2Y5e'; // пароль
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));

    $query ="INSERT INTO `Bronirovanie` (`Data`) VALUES ('$dates[$i]')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
   
    mysqli_close($link);

}
header('Location: http://slyfoxmedia.ru/studio.php');


?>

