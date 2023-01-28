<?php
if (isset($_FILES["file"])) {
    $tmpFile = $_FILES["file"]["tmp_name"];
    $name = $_FILES["file"]["name"];
    $fileName = "cropped_" . $name; 

    list($width, $height) = getimagesize($tmpFile);
    if ($width == null && $height == null) {
        header("Location: index.php");
        return;
    }

    if ($width >= 100 && $height >= 100) {
        $image = new Imagick($tmpFile);
        $image-> ThumbnailImage(400, 400, true);
        $image->writeImage($fileName);
    }
    else {
        move_uploaded_file($tmpFile, $fileName);
    }
}

?>

<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/js/jquery.imgareaselect.pack.js" integrity="sha512-ALBRD8RI3E1FAUPtPZ4bEEZ7EdfRT/gOxkX1CrrS9pMfxRrTPIFhglvfFs3puB4CenVg9SD0m3uydtBYHFny9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/imgareaselect/0.9.10/css/imgareaselect-default.css" integrity="sha512-wUdm/cyWPwiPypgc4kem0zyqbdCfAFIMElxGR1LOTgIT4uS9KSi5XwBLnQtGFC5QGmtcwPSnuGaDrFzD1T1ilA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <img src="/<?php echo $fileName ?>" id="photo">
    <br><br>
    <button id="crop">Crop Photo</button>
    <script src="./crop.js"></script>
</body>
</html>