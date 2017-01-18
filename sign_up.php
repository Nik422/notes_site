<?php

$servername='localhost';
$db="site";

$conn = mysqli_connect($servername, "root", NULL, $db);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
}

$c = 'SELECT login FROM users';
$q = mysqli_query($conn, $c);
$i = 0;
foreach ($q as $qu){
    $v[$i] = $qu['login'];
    $i ++;
}

if (in_array($_POST['log'], $v)) {
    echo "This login is already occupied, please return and enter another";
}else{
    if (isset($_POST['log']) && ($_POST['pass'])){
        $d = 'INSERT INTO users (login, password) VALUES ("' . $_POST['log'] . '", "' . $_POST['pass'] . '")';
        $sql = mysqli_query($conn, $d);
        if ($sql){
            header ("Location: sign_in.html");
        }
    }else{
        echo "You have filled not all fields, please return and finish registration";
    }
}