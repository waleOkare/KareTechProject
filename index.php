<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>DevCollab Sign-in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrapmin.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script
    <script src ="js/jquery.js"> </script>
    <script src="js/bootstrap.min.js"></script>
<style>
    h1{
        color: darkred;
    }
span{
    text-align: center;
    color: darkred;
}
    input[type=submit]{
        color: darkred; !important;
    }

</style>
</head>
<body>
<header>

    <hr style="color: darkred">

</header>


<div class="modal-dialog">
<div class="modal-content">

    <div class="modal-header">
        <h1 class="text-center" style="font-family: cursive"> DevCollab </h1>


    <div class="modal-body">

        <form method="post" action="login.php" class="col-md-12 center-block">
            <div class="form-group">

                <input type="text" class="form-control input-lg" name="username" placeholder="Username">

            </div>
        <div class="form-group">

    <input type="password" class="form-control input-lg" name="password" placeholder="Password">
          </div>
            <div class="form-group">
    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Login">

           </div>

        </form>
    </div>

</div>


</div>


    <hr style="color: darkred">

    <footer class="site-footer">

        <div class="container">
            <div class="row">

                 <span style="font-family: cursive: color: darkred;"> DevCollab App(c) </span>


            </div>

            <div class="bottom-footer">

            </div>

        </div>



    </footer>

</body>
</html>


