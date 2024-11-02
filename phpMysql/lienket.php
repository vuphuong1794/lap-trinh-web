<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Categories</title>
    <style>
        .container {
            width: 250px;
        }

        .menu {
            border: 1px solid blue;
        }

        .menu a {
            display: block;
            padding: 5px 0;
            color: #0066cc;
        }

        .content {
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu">
            <?php
            $link = mysqli_connect("localhost", "root", "") or die("Không thể kết nối CSDL");
            mysqli_select_db($link, "php") or die("Không tồn tại CSDL");

            $kq = mysqli_query($link, "SELECT * FROM lienket");
            echo "<ul>";
            while ($row = mysqli_fetch_array($kq)) {
                echo "<li><a href='" . $row['Url'] . "'>" . $row['Ten'] . "</a></li>";
            }
            echo "</ul>";
            ?>
        </div>
    </div>
</body>

</html>