<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai 3</title>
</head>
<body>
    <?php
    $diem = -100;
    echo "<div class='hocluc'>";
    echo "<h1> Điểm số = $diem</h1>";
    if($diem > 10 || $diem < 0){
        echo "<p> Điem so khong hop le </p>";
    }
    else if ($diem >= 8) {
        echo "<p> Bé học giỏi quá nha! </p>";
    } else if ($diem >= 5 and $diem < 8) {
        echo "<p> Đậu rồi! </p>";
    }
    else{
        echo "<p> Xém đậu </p>";
    }
    echo "</div>";
    ?>
</body>
</html>