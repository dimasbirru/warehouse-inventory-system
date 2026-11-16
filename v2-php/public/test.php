<?php
session_start();
$_SESSION['test'] = 'Berhasil';
echo "Session status: " . session_status() . "<br>";
echo "Session value: " . $_SESSION['test'];