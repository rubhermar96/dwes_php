<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $langosta=51;
    $angula=6;
    $caviar=507;
    if(($langosta>50 && $angula>70)||($angula>70 && $caviar>500)||($langosta>50 && $caviar>500)){
        echo '<h1>Es Cierto!!</h1>';
    }else{
        print('Falso<br>D:');
    }
    ?>
</body>
</html>