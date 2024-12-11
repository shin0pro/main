<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
<?php
if (isset($_POST['submit'])) {
    // Đường dẫn đến thư mục lưu trữ tệp tải lên
    $targetDir = __DIR__ . "/uploads/";  // Sử dụng __DIR__ để chỉ thư mục hiện tại

    // Kiểm tra và tạo thư mục nếu chưa tồn tại
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Đường dẫn đầy đủ của tệp tải lên
    $targetFile = $targetDir . basename($_FILES["fileUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra loại tệp (ví dụ: chấp nhận JPG, PNG, PDF)
    $allowedTypes = ["jpg", "png", "pdf", "cpp", "py", "html", "php", "js", "css", "txt", "docx"];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Chỉ cho phép các định dạng JPG, PNG, PDF.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu tệp đã tồn tại
    if (file_exists($targetFile)) {
        echo "Tệp đã tồn tại.";
        $uploadOk = 0;
    }

    // Giới hạn kích thước tệp (tối đa 500MB)
    if ($_FILES["fileUpload"]["size"] > 500000000) {
        echo "Dung lượng tệp vượt quá giới hạn cho phép (500MB).";
        $uploadOk = 0;
    }

    // Tiến hành tải lên nếu không có lỗi
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFile)) {
            echo "Đã tải xong";
        } else {
            echo "Có lỗi xảy ra khi tải lên tệp.";
        }
    } else {
        echo "Tệp không thể tải lên.";
    }
}
?>
<br><br>
<a href="http://localhost:8080/test/upload.html">Quay lại</a>
</head>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải lên và hiển thị ảnh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .file-list {
            list-style-type: none;
            padding: 0;
        }
        .file-list li {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .file-list li a {
            text-decoration: none;
            color: #000;
        }
        .file-list li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Danh sách các tệp đã tải lên</h2>
<ul class="file-list">
    <?php
    $dir = "uploads/"; // Thư mục chứa các tệp
    if (is_dir($dir)) {
        $files = scandir($dir); // Lấy danh sách các tệp
        sort($files); // Sắp xếp danh sách tệp theo thứ tự

        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                echo "<li><a href='$dir$file' target='_blank'>$file</a></li>";
            }
        }
    } else {
        echo "Thư mục không tồn tại.";
    }
    ?>
    <br><br>
</ul>

</body>
</html>

