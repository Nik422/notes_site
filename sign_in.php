<?php
$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$l = 'SELECT login FROM users';
$sql = mysqli_query($conn, $l);

foreach ($sql as $b){
    if ($b['login'] == $_POST['log']){
        $bb = $_POST['log'];
        $p = 'SELECT password FROM users WHERE login='. '("' . $bb . '")';
        $sq = mysqli_query($conn, $p);
        session_start();
        $_SESSION['user'] = $_POST['log'];

        foreach ($sq as $a){
            if ($a['password'] == $_POST['pass']){
                    header('Location: notes.php');
            }else{
                echo 'Password is incorect';
            }
        }
    }else{
        echo 'Login is incorect!';
    }
}