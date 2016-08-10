<?php
$path = './/uploads/';
$comment = null;
// when the form is submitted this code below will run
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['preview-form-comment'])) {
    $comment = $_POST['preview-form-comment'];

    if ($_POST['preview-form-comment'] == 'save') {

        $content = stripslashes($_POST['code']);

        $username = addslashes(strip_tags($_POST['username'])); //i.e. markrummel

        $filename = addslashes(strip_tags($_POST['filename'])); //i.e. test, index

        $ext = addslashes(strip_tags($_POST['filetype'])); //i.e. html, css, js

        $path = './/uploads/' . $username . '/';
        $URL = $path . $filename . '.' . $ext;

        file_put_contents($URL, $content);
echo $URL;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page </title>
    <script src ="js/jquery.js"> </script>
    <link href="style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="lib/codemirror.css">
    <script src="lib/codemirror.js"> </script>

    <script type="text/javascript" src="codemirror/js/jquery.min.js.js"></script>
    <script type="text/javascript" src="codemirror/plugin/codemirror/lib/codemirror.js"></script>

    <script type="text/javascript" src ="default.js"></script>
<!--



-->

    <script src="mode/javascript/javascript.js"></script>

    <script src="hint/show-hint.js"></script>
    <script src="hint/css-hint.js"></script>
    <link rel="stylesheet" href="theme/night.css">
    <link rel="stylesheet" href="hint/show-hint.css">




</head>
<body>

<div style="width: 50%">
    <form id="preview-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">

                  <textarea class="codemirror-textarea" name="preview-form-comment" id="preview-form-comment" rows="20" cols="20">

                 <?php echo $comment; ?>

                 </textarea>

        <input type="submit" name = "preview-form-submit" id="preview-form-submit" value="Save">

    </form>
</div>
    <br>
    <br>
    <br>


                <textarea rows="10" cols="89">

                   <?php echo $comment; ?>


                 </textarea>

</body>
</html>
<!--
<script>
$(".save-file").click(function (){
editor.save();
var content = editor.getValue(); //textarea text
var path = $("#hiddenFilePath").text(); //path of the file to save
var response = confirm("Do you want to save?");
if(response)
{
$.ajax({
type: "POST",
url: "saveFile.php",
data: {c:content,p:path},
dataType: 'text',
success: function(){
alert("File saved!");
}
});
}
else{
alert("File not saved!");
}
});

</script>
-->
<!--
<script>

    var editor = CodeMirror(document.getElementById("preview-form-comment"),{

        mode: "javascript",
        theme: "night",
        tabSize: 20,
        lineNumbers: true,
        firstLineNumber:1,
        extraKeys:{"Ctrl": "autocomplete"}
    });

</script>




