<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
session_start();

$note_name = $_POST['note_name'];
$note_text = $_POST['note_content'];
$user = $_SESSION['user'];

$n = 'INSERT INTO notes(note_name,note_text,user_login) VALUES ("' . $note_name . '", "' . $note_text . '", "' . $user . '")';
$sql = mysqli_query($conn, $n);
if ($sql){
    header('Location: notes.php');
}