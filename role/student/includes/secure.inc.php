<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location:../../index.php?'.'error=true');
} else if ($_SESSION['role'] != 'hod') {
    header('Location:../../index.php?'.'error=true');
}