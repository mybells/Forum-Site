<?php
//退出登录
header("content-type:text/html;charset=utf-8");
session_start();
require_once('connect.php');
unset($_SESSION['username']);
echo "<script>window.location.href='index.php';</script>";
?>