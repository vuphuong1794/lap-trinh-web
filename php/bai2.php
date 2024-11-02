<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2 - Phép tính cơ bản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .calculation {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        $a = 12;
        $b = 3;

        // Phép cộng
        echo "<div class='calculation'>";
        echo "<span>$a + $b = </span>";
        echo "<span class='result'>" . ($a + $b) . "</span>";
        echo "</div>";

        // Phép trừ
        echo "<div class='calculation'>";
        echo "<span>$a - $b = </span>";
        echo "<span class='result'>" . ($a - $b) . "</span>";
        echo "</div>";

        // Phép nhân
        echo "<div class='calculation'>";
        echo "<span>$a × $b = </span>";
        echo "<span class='result'>" . ($a * $b) . "</span>";
        echo "</div>";

        // Phép chia
        echo "<div class='calculation'>";
        echo "<span>$a ÷ $b = </span>";
        echo "<span class='result'>" . ($a / $b) . "</span>";
        echo "</div>";

        // Phép chia lấy dư
        echo "<div class='calculation'>";
        echo "<span>$a % $b = </span>";
        echo "<span class='result'>" . ($a % $b) . "</span>";
        echo "</div>";
    ?>
</body>
</html>