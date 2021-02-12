<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/index.css?<?=filemtime("style/index.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,400;1,600&display=swap"
        rel="stylesheet">
    <title>Realtime Chat</title>
</head>

<body>
    <section>
        <div class="container">
            <h2>Make a Group Chat</h2>
            <form action="createRoom.php" method="POST">
                <br>
                <input type="text" placeholder="Create a Room" required name="roomName">
                <br>
                <!-- <input type="password" placeholder="Password" required name="password">
            <br> -->
                <button type="submit">Create</button>
            </form>
            <small class="note">Note: Create a Room & Share a url link to your friends.</small>
        </div>
    </section>
</body>

</html>