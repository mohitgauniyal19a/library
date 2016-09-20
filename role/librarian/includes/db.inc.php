<?php
$link=  mysqli_connect('localhost', 'root', '', 'library') or die("Can't connect to the server");
date_default_timezone_set('Asia/Calcutta');
session_start();