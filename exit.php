<?php
unset($_SESSION['user']);
unset($_SESSION['old_name']);

header('Location: index.html');