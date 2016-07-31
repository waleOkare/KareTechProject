<?php
if(isset($_POST['name']) && !isset($display_case)){
    $name=htmlspecialchars($_POST['name']);
    $sql=$dbh->prepare("SELECT name FROM chatters WHERE name=?");
    $sql->execute(array($name));
    if($sql->rowCount()!=0){
        $ermsg="<h2 class='error'>Name Taken. <a href='index.php'>Try another Name.</a></h2>";
    }else{
        $sql=$dbh->prepare("INSERT INTO chatters (name,seen) VALUES (?,NOW())");
        $sql->execute(array($name));
        $_SESSION['user']=$name;
    }
}elseif(isset($display_case)){
    if(!isset($ermsg)){
        ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <title> ChatBox</title>

    <link href="style2.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">

           <form action="index.php" method="POST">
               <div class="form-input">
                   <div>Enter Chat Name  <input name="name" placeholder="A Name Please"/></div>
               </div>

            <button class="btn-submit">Start Chatting</button>

        </form>
    <p> A Name to be recognize during Chat Session </p>
</div>



</body>
</html>


        <?
    }else{
        echo $ermsg;
    }
}
?>
