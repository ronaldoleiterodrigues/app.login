<?php 
ob_start();

if(!isset($_SESSION)):
  session_start();
endif;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/css/aurora.css">
</head>
<body>