<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 8</title>
</head>
<body>
    <?php
    echo "<div>";
    echo "<h1> Các số chia hết cho 13 từ 2839 đến 7827 </h1>";
    for ($i = 2839; $i <= 7827; $i+=2) {
        if ($i % 13 == 0) {
            echo "<p>$i</p>";
        }
    }
    echo "</div>";
    ?>
</body>
</html>