<?
include("config.php");
if(isset($_SESSION['user'])){
    ?>
    <h2>Room For ALL</h2>
    <a style="right: 20px;top: 20px;position: absolute;cursor: pointer;" href="logout.php">Log Out</a>
    <div class='msgs'>
        <?include("msgs.php");?>
    </div>
    <form id="msg_form">


        <div class="chat-form">
            <textarea name="msg"> </textarea>
            <button>Send</button>

        </div>

    </form>
    <?
}
?>