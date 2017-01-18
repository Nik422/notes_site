<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="notes.js"></script>
    <link href="notes.css" rel="stylesheet">
</head>
<body>
<div id="p_prldr"><div class="contpre"><span class="svg_anm"></span><br>Подождите<br><small>идет загрузка</small></div></div>
<div class="add_note">
    <form method="post" align="center" action="add_note.php">
        <input type="text" id="note_name" name="note_name" placeholder="Notes name">
        <br>
        <textarea id="note_text" name="note_content" placeholder="Your text here"></textarea>
        <br>
        <input id="send" type="image" src="images/Галочка.png" width="20%" height="20%">
        <img id="close" src="images/Отмена.png" width="20%" height="20%" onclick="cancel()">
    </form>
</div>

<div class="show_note">
    <form method="post" align="center" action="update_note.php">
        <img src="images/ИКОНКИ.png" width="15%" height="15%" id="delete" onclick="delete_note()"><input type="image" src="images/Галочка.png" width="15%" height="15%" id="update">

        <textarea type="text" id="note_name_show" name="note_name_show"></textarea>
        <br>
        <textarea id="note_text_show" name="note_text_show"></textarea>
    </form>
</div>

<div class="menu" align="center">
    <div id="logo">G<sub>A<sup>KI</sup></sub></div>
    <div class="icons">
        <img src="images/новая-заметка.png" id="new" onclick="new_note()">
        <br>
        <a href="exit.php"><img src="images/выход.png"></a>
    </div>
</div>
<div id="notes_name" align="center">
    <div id="text">Your notes</div>
</div>
</body>
</html>