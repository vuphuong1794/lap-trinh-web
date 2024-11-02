<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Ca sĩ và Bài hát</title>
    <style>
        .container {
            width: fit-content;
            margin: 20px;
        }
        .menu {
            border: 1px solid #0080FF;
            padding: 10px 20px;
        }
        .menu a {
            color: #0080FF;
            text-decoration: none;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        .menu ul {
            list-style-type: disc;
            margin: 0;
            padding-left: 20px;
        }
        .menu li {
            padding: 2px 0;
        }
        .menu ul ul {
            list-style-type: circle;
            margin-left: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu">
            <?php
            $link = mysqli_connect("localhost", "root", "") or die("Không thể kết nối CSDL");
            mysqli_select_db($link, "php") or die("Không tồn tại CSDL");

            // Lấy danh sách ca sĩ
            $casi_query = mysqli_query($link, "SELECT * FROM webnhac_casi");
            
            echo "<ul>";
            while ($casi = mysqli_fetch_array($casi_query)) {
                echo "<li>" . htmlspecialchars($casi['HoTenCS']) . "\n";
                
                // Lấy các bài hát của ca sĩ này
                $baihat_query = mysqli_query($link, 
                    "SELECT * FROM webnhac_baihat WHERE idCS = " . $casi['idCS']);
                
                if (mysqli_num_rows($baihat_query) > 0) {
                    echo "<ul>";
                    while ($baihat = mysqli_fetch_array($baihat_query)) {
                        echo "<li><a href='?baihat_id=" . $baihat['idBH'] . "'>" 
                            . htmlspecialchars($baihat['TenBH']) . "</a></li>\n";
                    }
                    echo "</ul>";
                }
                
                echo "</li>\n";
            }
            echo "</ul>";

            mysqli_close($link);
            ?>
        </div>

        <?php
        if(isset($_GET['baihat_id'])) {
            $link = mysqli_connect("localhost", "root", "") or die("Không thể kết nối CSDL");
            mysqli_select_db($link, "php") or die("Không tồn tại CSDL");
            
            $id = mysqli_real_escape_string($link, $_GET['baihat_id']);
            $result = mysqli_query($link, "SELECT b.*, c.HoTenCS 
                FROM webnhac_baihat b 
                JOIN webnhac_casi c ON b.idCS = c.idCS 
                WHERE b.idBH = '$id'");
            
            if($song = mysqli_fetch_array($result)) {
                echo "<div class='song-info'>";
                echo "<h2>" . htmlspecialchars($song['TenBH']) . "</h2>";
                echo "<p>Ca sĩ: " . htmlspecialchars($song['HoTenCS']) . "</p>";
                if (!empty($song['LoiBH'])) {
                    echo "<p>Lời bài hát: " . nl2br(htmlspecialchars($song['LoiBH'])) . "</p>";
                }
                echo "</div>";
            }
            
            mysqli_close($link);
        }
        ?>
    </div>
</body>
</html>