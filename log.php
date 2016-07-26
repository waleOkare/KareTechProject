<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<div id="chatbox"><?php
            if(file_exists("log.php") && filesize("log.php") > 0){
    $handle = fopen("log.php", "r");
    $contents = fread($handle, filesize("log.php"));
    fclose($handle);

    echo $contents;
    }
    ?>
</div>
<script>
    //Load the file containing the chat log
    function loadLog(){

        $.ajax({
            url: "log.php",
            cache: false,
            success: function(html){
                $("#chatbox").html(html); //Insert chat log into the #chatbox div
            },
        });
    }
</script>
<script>
    //Load the file containing the chat log
    function loadLog(){
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({
            url: "log.php",
            cache: false,
            success: function(html){
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                //Auto-scroll
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }
            },
        });
    }

    setInterval (loadLog, 2500);







</script>






</body>
</html>