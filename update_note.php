<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
session_start();

$note_name = $_POST['note_name_show'];
$note_text = $_POST['note_text_show'];
$user = $_SESSION['user'];
$old_name = $_SESSION['old_name'];

$n = "UPDATE notes SET note_name='$note_name',note_text='$note_text' WHERE note_name='$old_name' AND user_login='$user'";
$sql = mysqli_query($conn, $n);
if ($sql){
    header('Location: notes.php');
}