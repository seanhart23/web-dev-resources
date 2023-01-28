<?php
?>
<html>
<body>
    <h1>Image Upload & Cropping POC</h1>
    <hr>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file"><h3>Select Image to Crop:</h3></label>
        <input type="file" name="file" id="file"><br><br>
        <input type="submit" name="submit" value="Upload and Crop">
    </form>
</body>
</html>