<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Prateek Kaushik" />
    <title>Form formBuilder</title>
</head>
<body>
<?php
    require_once('class/formBuilder.php');
    $ob = new FormBuilder('Employee');
    $ob->generateForm();
?>
</body>
</html>