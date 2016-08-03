<?php

$comment = null;
// when the form is submitted this code below will run
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['preview-form-comment'])){
    $comment = $_POST['preview-form-comment'];

}

?>


<?
session_start();
//This is for the real-time chat
if(isset($_GET['logout'])){

    //Simple exit message
    $fp = fopen("log.php", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);

    session_destroy();
    header("Location: index.php"); //Redirect the user
}

function loginForm(){
    echo'
	<div id="loginform">
	<form action="index.php" method="post">
		<p>Enter the name you want to be identified among other Collaborators:</p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" />
		<input type="submit" name="enter" id="enter" value="Enter" />
	</form>
	</div>
	';
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">

    <script src ="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="codemirror/js/jquery.min.js.js"></script>
    <script type="text/javascript" src="codemirror/plugin/codemirror/lib/codemirror.js"></script>
    <script type="text/javascript" src ="codemirror/js/default.js"></script>

</head>

<body>

<header>
<nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-ArrayTech-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <em style="font-family: cursive"> DevCollab  </em> </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-ArrayTech-navbar-collapse-1">
            <ul class="nav navbar-nav nav-tabs lead">
                <li class="active "><a href="index.php">Home </a> </li>
                <li> <a href="features.html"> Features </a> </li>
                <li> <a href="contact.html"> Contact </a> </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav navbar-nav nav-tabs " data-toggle="dropdown">DevCollab  <b class=" caret "> </b> </a>
                    <ul class="dropdown-menu lead">
                        <li class="lead"> <a href="#"> Desktop Platform </a> </li>
                        <li class="lead"> <a href="#"> Mobile Platform </a>  </li>
                        <li class ="divider"> </li>
                        <li class="lead"><a href="#"> Download Link </a> </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
</header>



<div class="jumbotron">
    <div class="container">

        <h4 class="text-center lead"> DevCollab, Optimized for Collaboration...... </h4>

    </div>
</div>


<div class="container">
<div class="row">

    <div class="col-md-8 col-md-8">
        <div class="panel panel-default">
            <form id="preview-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
<label>
        <textarea class="codemirror-textarea" name="preview-form-comment" id="preview-form-comment" rows="20" cols="140">
        <?php echo $comment; ?>
        </textarea>
                </label>
                 <br>
                <input type="submit" name = "preview-form-submit" id="preview-form-submit" value="Submit">

               </form>

                <label>
               <textarea rows="20" cols="140">
               <?php echo $comment; ?>
                </textarea>
                </label>
    </div>
</div>


    <div class="col-md-4 col-md-4">
        <div class="panel panel-default">

            <!-- This codes below are for the GOOGLE hangout, file Upload and messenging box -->
            <div class="panel-heading">
     <h3>  Start Hangout  </h3>
                </div>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <div class="g-hangout" data-render="createhangout"
                 data-initial_apps="[{ app_id : '123456789012', start_data : 'dQw4w9WgXcQ', 'app_type' : 'ROOM_APP' }]">
            </div>
            <div class="panel-heading">

          <h3> Upload Your Files Here </h3>
                </div>


            <?php

            include ("upload.php");
            ?>


<hr>

                <div class="panel panel-default">
                    <div class="panel-heading">
                <h3> Chat Box  </h3>
                        </div>

                    <?php
                    if(!isset($_SESSION['name'])){
                        loginForm();
                    }
                    else{
                        ?>
                        <div id="wrapper">
                            <div id="menu">
                                <p class="welcome">Welcome, <b> <?php echo $_SESSION['name']; ?></b></p>
                                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                                <div style="clear:both"></div>
                            </div>

                            <div id="chatbox">
                                <?php
                                if(file_exists("log.php") && filesize("log.php") > 0){
                                    $handle = fopen("log.php", "r");
                                    $contents = fread($handle, filesize("log.php"));
                                    fclose($handle);

                                    echo $contents;
                                }
                                ?>
                            </div>

                            <form name="message" action="">
                                <input name="usermsg" type="text" id="usermsg" size="63" />
                                <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                            </form>
                        </div>
                        <script type="text/javascript" src="codemirror/js/jquery.min.js"></script>
                        <script type="text/javascript">
                            // jQuery Document
                            $(document).ready(function(){
                                //If user submits the form
                                $("#submitmsg").click(function(){
                                    var clientmsg = $("#usermsg").val();
                                    $.post("post.php", {text: clientmsg});
                                    $("#usermsg").attr("value", "");
                                    return false;
                                });

                                //Load the file containing the chat log
                                function loadLog(){
                                    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                                    $.ajax({
                                        url: "log.php",
                                        cache: false,
                                        success: function(html){
                                            $("#chatbox").html(html); //Insert chat log into the #chatbox div
                                            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
                                            if(newscrollHeight > oldscrollHeight){
                                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                                            }
                                        },
                                    });
                                }
                                setInterval (loadLog, 2500);	//Reload file every 2.5 seconds

                                //If user wants to end session
                                $("#exit").click(function(){
                                    var exit = confirm("Are you sure you want to end the session?");
                                    if(exit==true){window.location = 'index.php?logout=true';}
                                });
                            });
                        </script>
                        <?php
                    }
                    ?>


                    <hr>



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> Geo-Location </h3>
                        </div>

<?php

                        require_once('geoplugin.class.php');
                        $geoplugin = new geoPlugin();
                        // If we wanted to change the base currency, we would uncomment the following line
                        // $geoplugin->currency = 'EUR';

                        $geoplugin->locate();

                        echo "Geolocation results for {$geoplugin->ip}: <br />\n".
                        "City: {$geoplugin->city} <br />\n".
                        "Region: {$geoplugin->region} <br />\n".
                        "Area Code: {$geoplugin->areaCode} <br />\n".
                        "DMA Code: {$geoplugin->dmaCode} <br />\n".
                        "Country Name: {$geoplugin->countryName} <br />\n".
                        "Country Code: {$geoplugin->countryCode} <br />\n".
                        "Longitude: {$geoplugin->longitude} <br />\n".
                        "Latitude: {$geoplugin->latitude} <br />\n".
                        "Currency Code: {$geoplugin->currencyCode} <br />\n".
                        "Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
                        "Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

                        if ( $geoplugin->currency != $geoplugin->currencyCode ) {
                        //our visitor is not using the same currency as the base currency
                        echo "<p>At todays rate, US$100 will cost you " . $geoplugin->convert(100) ." </p>\n";
                        }

                        /* find places nearby */
                        $nearby = $geoplugin->nearby();
                        if ( isset($nearby[0]['geoplugin_place']) ) {
                        echo "<pre><p>Some places you may wish to visit near " . $geoplugin->city . ": </p>\n";
	foreach ( $nearby as $key => $array ) {

		echo ($key + 1) .":<br />";
		echo "\t Place: " . $array['geoplugin_place'] . "<br />";
		echo "\t Country Code: " . $array['geoplugin_countryCode'] . "<br />";
		echo "\t Region: " . $array['geoplugin_region'] . "<br />";
		echo "\t County: " . $array['geoplugin_county'] . "<br />";
		echo "\t Latitude: " . $array['geoplugin_latitude'] . "<br />";
		echo "\t Longitude: " . $array['geoplugin_longitude'] . "<br />";
		echo "\t Distance (miles): " . $array['geoplugin_distanceMiles'] . "<br />";
		echo "\t Distance (km): " . $array['geoplugin_distanceKilometers'] . "<br />";

	}
	echo "</pre>\n";
                        }
                        ?>







    </div>
</div>






</div>
    </div>
    </div>

</div>







<footer class="site-footer">

<div class="container">
     <div class="row">

             <span style="font-family: cursive" class="moveright"> DevCollab App(c) </span>

         <a href="http://www.geoplugin.com/geolocation/" target="_new">IP Geolocation</a> by <a href="http://www.geoplugin.com/" target="_new">geoPlugin</a>

</div>
    <div class="bottom-footer">
        <div class="col-md-5"> Designed by Wale Patrick 2016(c)</div>
        <div class="col-md-7">
            <ul class="footer-nav lead">
                <li><a href="#"> Home </a> </li>
                <li><a href="#"> Features </a> </li>
                <li><a href="#"> Contact </a> </li>
            </ul>
        </div>
</div>

</div>



</footer>


</body>
</html>