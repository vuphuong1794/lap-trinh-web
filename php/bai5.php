<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 5</title>
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
    $a = 3;

    echo "<table>";

    for ($i = 1; $i <= $a; $i++) {
        echo "<tr>";
        echo "<td> $i </td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>