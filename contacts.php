<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>Contacts</title>
</head>

<body>
    <div class="wrapper">
        <?php require "header.php"?>
        <div class="nav">
            <div class="form">
            <div class="title">
                Contact Form</div>
            <form action="check.php" method="post">
                <input class="input_email" type="email" name="email" placeholder="Enter email">
                <textarea class="message" name="message" placeholder="Enter your message"></textarea>
                <button class="button" type="submit" name="send">Send</button>
            </form></div>
        </div>
        <?php require "footer.php"?>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="js/script.js"></script>

</html>