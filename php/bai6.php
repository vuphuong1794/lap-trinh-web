<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6 - Hiển thị điểm với màu nền</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        .result-row {
            padding: 10px;
            margin: 5px 0;
        }
        .chan {
            background-color: yellow;
        }
        .le {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        // Mảng các điểm để hiển thị
        $diemArray = array(3, 5, 7, 9, 4, 6, 8, 10);
        
        // Biến đếm để xác định dòng chẵn/lẻ
        $count = 1;
        
        foreach($diemArray as $diem) {
            // Xác định class cho màu nền
            $rowClass = ($count % 2 == 0) ? 'chan' : 'le';
            
            // Mở thẻ div với class tương ứng
            echo "<div class='result-row $rowClass'>";
            
            // Hiển thị điểm
            echo "Điểm: $diem - ";
            
            // Xét điều kiện và hiển thị kết quả
            if ($diem < 5) {
                echo "Xém đậu";
            } elseif ($diem <= 8) {
                echo "Đậu rồi";
            } else {
                echo "Bé học giỏi quá nha!";
            }
            
            echo "</div>";
            
            // Tăng biến đếm
            $count++;
        }
    ?>
</body>
</html>