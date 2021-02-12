<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/msg.css?<?=filemtime("style/msg.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,400;1,600&display=swap"
        rel="stylesheet">
    <title>Chat</title>
</head>

<body>
    <section>
        <div class="header">
            <h2>Chat Messages</h2>
            <a href="index.php">&#10539;</a>
        </div>
        <div id="chat-container" class="big-container"></div>
        <div class="bottom">
            <form id="form">
                <div class="show-msg hide">
                    <input id="msg" type="text" placeholder="Message..." required disabled>
                    <input id="roomname" type="hidden" value="<?php echo $_GET['roomname'];?>">
                    <button id="btn" type="submit" disabled>Send</button>
                </div>
                <div class="show-name">
                    <input id="userName" type="text" placeholder="Enter Your Name" required>
                    <button id="nameBtn" type="button">Submit</button>
                </div>
            </form>
        </div>
    </section>


</body>

<script src="main.js" type="text/javascript"></script>

</html>