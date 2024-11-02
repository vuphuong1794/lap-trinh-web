<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Giai Thừa</title>
</head>
<body>
    <?php
        $n = 5; // Số cần tính giai thừa
        
        // Khởi tạo biến lưu kết quả
        $giaiThua = 1;
        
        // Tính giai thừa bằng vòng lặp
        for($i = 1; $i <= $n; $i++) {
            $giaiThua *= $i;
        }
        
        // Hiển thị kết quả
        echo "$n! = $giaiThua";
    ?>
</body>
</html>