const express = require('express');
const multer = require('multer');
const { Octokit } = require('@octokit/rest');

const app = express();
const upload = multer();
const octokit = new Octokit({
  auth: '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',
});

app.post('/upload', upload.single('image'), async (req, res) => {
  const { buffer, originalname } = req.file;

  try {
    await octokit.rest.repos.createOrUpdateFileContents({
      owner: 'shin0pro',
      repo: 'main',
      path: `uploads/${originalname}`,
      message: 'Upload new image',
      content: buffer.toString('base64'),
    });

    res.send('Image uploaded successfully');
  } catch (error) {
    console.error(error);
    res.status(500).send('Error uploading image');
  }
});

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

