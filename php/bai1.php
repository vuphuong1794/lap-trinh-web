<!DOCTYPE html>
<html>

<head>
    <title>bai 1</title>
    <style>
        .container {
            width: 500px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .red-bg {
            background-color: red;
        }

        .yellow-bg {
            background-color: yellow;
        }

        .blue-bg {
            background-color: blue;
        }
    </style>
</head>

<body>
    <?php
    echo '<div class="container">';

    echo '<table>';

    echo "<tr>";
    echo "<td class='red-bg'>Cot 1</td>";
    echo "<td class='yellow-bg'>Cot 2</td>";
    echo "<td class='blue-bg'>Cot 3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td >Cot 1</td>";
    echo "<td >Cot 2</td>";
    echo "<td >Cot 3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td >Cot 1</td>";
    echo "<td >Cot 2</td>";
    echo "<td >Cot 3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td >Cot 1</td>";
    echo "<td >Cot 2</td>";
    echo "<td >Cot 3</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td >Cot 1</td>";
    echo "<td >Cot 2</td>";
    echo "<td >Cot 3</td>";
    echo "</tr>";

    echo '</table>';
    echo '</div>';
    ?>
</body>

</html>