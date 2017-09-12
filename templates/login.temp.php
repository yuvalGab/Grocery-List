<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List</title>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <link rel="stylesheet" href="stylesheets/global.css">
    <link rel="stylesheet" href="stylesheets/login.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Grocery List</h1>
        </header>
        <main>
            <form action="login.php" method="post">
                <input id="user" name="username" class="field" type="text" placeholder="username">
                <input name="password" class="field" type="password" placeholder="password">
                <?php if($loginError) : ?>
                <div class="error"><?=$loginError?></div>
                <?php endif; ?>
                
                <input type="submit" value="log in">
            </form>
        </main>
        <footer>
            <button id="open-create">create new user</button>
        </footer>
        <div class="create-user">
            <button id="close-btn">X</button>
            <form action="login.php" method="post">
                <input class="field" id="new-user" name="new_user" type="text" placeholder="username">
                <input class="field" name="new_password" type="password" placeholder="password">
                <?php if($createError) : ?>
                <div class="error"><?=$createError?></div>
                <?php endif; ?>
                <input type="submit" value="create">
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="javascripts/global.js"></script>
    <script src="javascripts/login.js"></script>

</body>
</html>