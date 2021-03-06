
<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}

?>

<?php

// This is a boolean that only equals true when teh  page is reloaded


if (isset($_POST['submit'])) {
    $selectedValue = $_POST['color'];
    $userfilename = $selectedValue;
    $oldfile = file_get_contents("http://karetechapp.azurewebsites.net/usercodes/" . $selectedValue);
    $comment = $oldfile;

}else {


    //$comment = null;
    $userfilename = $_SESSION['login_user'] . '_' . 'codes.txt';
    $oldfile = file_get_contents("http://karetechapp.azurewebsites.net/usercodes/" . $userfilename);
    $comment = $oldfile;

}

// when the form is submitted this code below will run
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['preview-form-comment'])) {

    date_default_timezone_set('Europe/London');
    $today = date("Y-m-d H:i:s");
    $comment = $_POST['preview-form-comment'] . "\r\n" . 'Codes Saved by:' . $_SESSION['login_user'] . ' at ' . $today;
    $content = $comment;
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/usercodes/" . $userfilename, "wb");
    fwrite($fp, $content);
    fclose($fp);


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
    <script src="https://simplewebrtc.com/latest-v2.js"></script>

    <script src ="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="codemirror/js/jquery.min.js.js"></script>
    <script type="text/javascript" src ="default.js"></script>
    <link rel="stylesheet" href="lib/codemirror.css">
    <script src="lib/codemirror.js"> </script>

    <script src="mode/xml/xml.js"></script>

    <script src="hint/show-hint.js"></script>
    <script src="hint/css-hint.js"></script>
    <link rel="stylesheet" href="theme/night.css">
    <link rel="stylesheet" href="hint/show-hint.css">
    <link href="chat.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-1.9.0.js"> </script>

    <script>
        function submitChat(){
            if (form1.msg.value == ''){
                alert('ENTER A MESSAGE!!!');
                return;
            }
            $('#imageload').show();
            var msg = form1.msg.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState ==4&&xmlhttp.status==200){
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                    $('#imageload').hide();
                }
            }
            xmlhttp.open('GET', 'insert.php?&msg='+msg,true);
            xmlhttp.send();
        }
        $(document).ready(function(e){
            $.ajaxSetup({cache:false});
            setInterval(function(){$('#chatlogs').load('logs.php');}, 2000);
        });
    </script>


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
                <a class="navbar-brand" href="Home.php"> <em style="font-family: cursive"> DevCollab  </em> </a>
            </div>


            <div class="collapse navbar-collapse" id="bs-ArrayTech-navbar-collapse-1">
                <ul class="nav navbar-nav nav-tabs lead">
                    <li class="active "><a href="Home.php">Home </a> </li>
                    <li> <a href="features.php"> Features </a> </li>
                    <li> <a href="contact.php"> Contact </a> </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle nav navbar-nav nav-tabs " data-toggle="dropdown">DevCollab  <b class=" caret "> </b> </a>
                        <ul class="dropdown-menu lead">
                            <li class="lead"> <a href="#"> Desktop Platform </a> </li>
                            <li class="lead"> <a href="#"> Mobile Platform </a>  </li>
                            <li class ="divider"> </li>
                            <li class="lead"><a href="#"> Download Link </a> </li>

                        </ul>
                    </li>
                    <li style="float: right" class="pull-right"> <a href = "logout.php"> Log Out </a>  </li>

                </ul>


            </div>
        </div>
    </nav>
</header>



<div class="jumbotron">

    <div class="container">


        <p style="color: darkred"> Welcome, <?php echo $_SESSION['login_user']; ?> </p>
        <h2 class="display-4: text-center lead">DevCollab, Optimized for Collaboration....</h2>


    </div>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3> CODE EDITOR  </h3>
                </div>


                <div>

                    <form id="preview-form"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                           <textarea class="codemirror-textarea" name="preview-form-comment" id="preview-form-comment" rows="" cols=""   >

                           <?php echo $comment; ?>

                           </textarea>
                        <input type="submit" name = "preview-form-submit" id="preview-form-submit" value="Save">

                    </form>

                          <textarea rows="20" cols="">

                          <?php echo $comment; ?>

                          </textarea>

                    <br>
                    <br>


                    <p>  Code Results </p>
                    <?php include("readUserCodes.php");
                    //
                    echo '<form action="Home.php" method="post">';

                    echo '<select name="color">';
                    for($i =0; $i< count($files);$i++){

                        echo'<option>' .$files[$i] . '</option>';
                    }

                    echo'</select>';
                    //
                    echo '<input type="submit" value="submit" name="submit">' ;

                    echo '</form>';

                    ?>






                    <!-- do not touch this div's  -->

                </div>

            </div>

        </div>
        <!-- do not touch this div's  -->


        <div class="col-sm-4 col-sm-4">
            <div class="panel panel-default">

                <!-- This codes below are for the video Conferencing, file Upload and messenging box -->
                <div class="panel-heading">
                    <h3>  VIDEO CONFERENCE  </h3>
                </div>
                <div>



                    <?php
                    include('videoConf.php');
                    ?>



                </div>


                <div class="panel-heading">


                    <h3> FILE SHARING </h3>
                </div>

                <?php
                include("fileSharing.php");
                include("readUploadFile.php");
                ?>


                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3> CHAT  </h3>
                    </div>
                    <div style="background-color: #00ccaa">

                        <form name="form1">
                            <b> <?php echo $_SESSION['username']; ?></b><br>

                            <div id="imageload" style="display:none;">
                                <img src=""/>
                            </div>
                            <div id="chatlogs" style="width:100%; text-align: ;">
                                Loading Chat Logs please wait........<img src=""/>
                            </div>
                            <br>
                            <label> Enter Your Message   <br>
                        <textarea name="msg" style="width:; height: 70px">
                        </textarea>
                            </label>
                            <br>
                            <a href="#" onclick="submitChat(); return true;" class="button"> Send</a><br> <br>

                        </form>

                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> GEO-LOCATION </h3>
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
                            "Latitude: {$geoplugin->latitude} <br />\n";
                        //  "Currency Code: {$geoplugin->currencyCode} <br />\n".
                        // "Currency Symbol: {$geoplugin->currencySymbol} <br />\n".
                        // "Exchange Rate: {$geoplugin->currencyConverter} <br />\n";

                        if ( $geoplugin->currency != $geoplugin->currencyCode ) {
                            //our visitor is not using the same currency as the base currency
                            //  echo "<p>At today's rate, US$100 will cost you " . $geoplugin->convert(100) ." </p>\n";
                        }



                        ?>

                        <a href="Geolocate.php" style="color: darkred">CLICK TO GET INFORMATION ABOUT THE CITIES NEAR YOU </a>


                    </div>
                </div>


            </div>
        </div>
    </div>

</div>



























<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<footer class="site-footer">

    <div class="container">
        <div class="row">

            <span style="font-family: cursive" class="moveright"> (c)DevCollab App </span>

            <a href="http://www.geoplugin.com/geolocation/" target="_new">IP Geolocation</a> by <a href="http://www.geoplugin.com/" target="_new">geoPlugin</a>

        </div>
        <div class="bottom-footer">
            <div class="col-sm-5"> (c) Designed by Wale Patrick 2016</div>
            <div class="col-sm-7">
                <ul class="footer-nav lead">
                    <li class="active"><a href="Home.php"> Home </a> </li>
                    <li><a href="features.php"> Features </a> </li>
                    <li><a href="contact.php"> Contact </a> </li>
                </ul>
            </div>
        </div>

    </div>



</footer>


</body>
</html>





