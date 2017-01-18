<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

session_start();
$_SESSION['old_name'] = $_POST['postVar'];

$s = 'SELECT note_text FROM notes WHERE note_name ='. '("' . $_POST['postVar'] . '")';
$sql = mysqli_query($conn, $s);
foreach ($sql as $b){
    echo $b['note_text'];
}