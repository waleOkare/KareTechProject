<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feature</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">

    <script src ="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"></script>

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
                    <li><a href="Home.php">Home </a> </li>
                    <li class="active "> <a href="features.php"> Features </a> </li>
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


<marquee> <span class="lead" style="color: darkred">  Developement On Going  </span> </marquee>
<h1> Project Specification in a Nutshell </h1>

<p>

    Code written in the Coding Window – could it be saved to file in some way.

    Login / Accounts – could a user login be setup / could one also have a facility to collect together a number of accounts to form a Group (i.e. a Group of Collaborators – all working on the same project).  Chat – facility could automatically take the users login ID as the name.

    Can the look / feel be improved UI


</p>

<strong>
     The M-learning framework Should consist of an integrated development
     environment, which allows the creation of dynamic student teams that can
     work together to rapidly develop a mobile application. This project is
     inherently about harnessing current messaging, file transfer, discussion
     forum, video conferencing technologies and packaging them all together into
     one single system. One could make use of tools such as dropbox, google
     drive for file storage, integrate google hangouts for video conferencing, make
     use of an instant messaging service, for real-time discussions, discussion
     forums for larger queries, social media integration, project management
     tools, code sharing and version control facilities and so on.
     The Application should have multiple Features(Collaborative feature) that will help in a Collaborative Learning Environment(Session management). <br>
     Key Features are; A Collaborative Code Editor, Audio/Video Conferencing, mobile framework,file Upload Option and Text Chatting in real-time.

</strong>
<br>
<br>
<br>
<ul>

     <li>The Application Must have a collaborative web editor- Something Similar to the one <a href="https://madeye.io/"> Mad Eye </a> or  <a href="https://codeshare.io/"> CodeShare Editor </a> use,  and the codes should be savable if possible </li>
     <li> The Application must make use of Google Hangout Audio and Video Conferencing in Real-time. </li>
     <li> The Application Must make use of bootstrap Framework to make it responsive on multiple devices </li>
     <li>  Real-time chat/Messaging similar to Facebook Messenger pop up</li>
     <li> The Application must be downloadable from an App Store irrespective of the Mobile OS using PhoneGap as a Native wrapper- similar to the way Instagram or Facebook Mobile App works</li>
     <li> The Application Must make use of any file Upload API's for file Sharing preferably dropbox API <span style="color: darkred;"> BUT NOT GOOGLE DRIVE API</span> </li>
     <li> Makes use of Azure Cloud-based Services, GitHub </li>
     <li> Optional-  More Interactive and Dynamic UI desgin and Color Scheme which will make it more Appealing to Mobile Users. </li>
    <li>  Finally, downloaded from the Apple, Google PlayStore and other App store </li>

</ul>
<br>
<br>

<h4> This Project takes big inspiration from CodeShare, Madeye and other existing systems Like
    <a href="https://iprodev.com/20-best-code-editors-for-real-time-collaboration/"> this </a> </h4>

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

            <span style="font-family: cursive" class="moveright"> DevCollab App(c) </span>


        </div>

        <div class="bottom-footer">
            <div class="col-md-5"> Designed by Wale Patrick 2016(c)</div>
            <div class="col-md-7">
                <ul class="footer-nav lead">
                    <li><a href="Home.php"> Home </a> </li>
                    <li class="active"><a href="features.php"> Features </a> </li>
                    <li><a href="contact.php"> Contact </a> </li>
                </ul>
            </div>
        </div>

    </div>



</footer>

</body>
</html>