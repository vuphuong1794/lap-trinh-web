<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Họ Tên</th>
            <th>Mật khẩu</th>
            <th>Email</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "php");
        if($conn) {
            $query = mysqli_query($conn, "SELECT * FROM user");
            while($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $row['idUser'] . "</td>";
                echo "<td>" . $row['HoTen'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "</tr>";
            }
            mysqli_close($conn);
        }
        ?>
    </table>
</body>
</html>