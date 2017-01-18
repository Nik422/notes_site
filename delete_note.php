<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
session_start();
$name = $_SESSION['old_name'];

$n = "DELETE FROM notes WHERE note_name='$name'";
$sql = mysqli_query($conn, $n);
if ($sql){
    header('Location: notes.php');
}