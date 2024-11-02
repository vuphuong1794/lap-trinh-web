<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 7</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $dong = 5;
    $cot = 3;
    echo "<table>";
    for($i = 1; $i <= $dong; $i++) {
        echo "<tr>";
        for($j = 1; $j <= $cot; $j++) {
            echo "<td> cot $j </td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>