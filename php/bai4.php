<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 4</title>
</head>
<body>
    <?php
    echo "<div>";
    echo "<h1> Các số chẵn trong khoảng từ 10 đến 100 </h1>";
    for ($i = 10; $i <= 100; $i+=2) {
        echo "<p>$i</p>";
    }
    echo "</div>";
    ?>
</body>
</html>