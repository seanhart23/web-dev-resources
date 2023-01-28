selection = $('#photo').imgAreaSelect({
    handles: true,
    instance: true,
    aspectRatio : '4:4',
    x1: 0,
    y1: 0,
    x2: 200,
    y2: 200
});

$("#crop").click(function(){
    var s = selection.getSelection();
    var width = s.width;
    var height = s.height;
    var x = s.x1;
    var y = s.y1;

    var request = $.ajax({
        url: "crop.php",
        type: "GET",
        data: {
            x: x,
            y: y,
            height: height,
            width: width,
            image: $("#photo").attr("src")
        }
    });
    
    request.done(function(msg) {
        console.log("Done Cropping")
        $("#photo").attr("src", msg);
        selection.cancelSelection();
    });
});