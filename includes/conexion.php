<?php
//conexion
$server='127.0.0.1';
$username='root';
$password='';
$database='blog_master';

$db= mysqli_connect($server,$username,$password,$database);
mysqli_query($db,"SET NAMES 'utf8'");

//iniciar la sesion
session_start();