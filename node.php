
<?php
if(isset($_POST['submit'])) {
    // 获取输入框的内容
    $content = $_POST['content'];

    // 分割内容
    $lines = explode("\n", $content);

    // 写入文件
    for($i=0; $i<count($lines); $i++) {
        $filename = ($i+1) . '.txt';
        // 将内容转换成 base64 编码再写入文件
        file_put_contents($filename, base64_encode($lines[$i]));
    }

    echo "分割完成！";
}

if(isset($_POST['delete'])) {
    // 删除所有txt文件
    $files = glob('*.txt');
    foreach($files as $file) {
        unlink($file);
    }

    echo "删除完成！";
}

if(isset($_POST['upload'])) {
    if(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['uploadedFile']['name'];
        $fileTmpName = $_FILES['uploadedFile']['tmp_name'];

        $content = file_get_contents($fileTmpName);
        echo "<script>document.getElementById('content').value = " . json_encode($content) . ";</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>分割文本</title>
    <style>
        #form-container {
            text-align: center;
            margin-top: 50px;
        }
        .btn-group {
            margin-top: 10px;
        }
        .btn-group input {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <form method="post" enctype="multipart/form-data">
            <label>选择文件：</label>
            <input type="file" name="uploadedFile">
            <div class="btn-group">
                <input type="submit" name="submit" value="分割">
                <input type="submit" name="delete" value="删除txt">
                <input type="submit" name="upload" value="上传">
            </div>
            <br>
            <label>或输入内容：</label>
            <br>
            <textarea name="content" id="content" rows="10"><?php if(isset($content)) { echo $content; } ?></textarea>
        </form>
    </div>
    <script>
        // After the document is ready, update the content of the textarea from the PHP variable
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            if(isset($content)) {
                echo "document.getElementById('content').value = " . json_encode($content) . ";";
            }
            ?>
        });
    </script>
</body>
  </html>
