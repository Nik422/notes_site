<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

session_start();

$s = 'SELECT note_name FROM notes WHERE user_login ='. '("' . $_SESSION['user'] . '")';
$sql = mysqli_query($conn, $s);
$i = 0;
foreach ($sql as $b){
    $d[$i] = $b['note_name'];
    $i++;
}
$count = count($d);
$js = array($d, $count);
$json = json_encode($js);
echo $json;