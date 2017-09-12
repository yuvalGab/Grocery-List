<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List</title>
    <link rel="icon" type="image/x-icon" href="images/icon.png">
    <link rel="stylesheet" href="stylesheets/global.css">
    <link rel="stylesheet" href="stylesheets/main.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Grocery List</h1>
            <div class="options">
                <button id="info-btn">?</button>
                <button id="logout-btn">X</button>
            </div>
        </header>
        <main>
            <div class="delete-box">
                <form action="main.php?username=<?= $username ?>" method="post">
                    <button name="select-all" id="select-all">select all</button>
                </form>
                <button id="delete-selected">delete selected</button>
            </div>
            <div class="list"> 
                <?php while($row = mysqli_fetch_assoc($items)) : ?>
                    <?php if($row['deleted'] == "false") : ?>
                        <div class="item">
                            <input style="display:none;" type="text" value="<?= $row['id'] ?>">
                            <input style="display:none;" type="text" value="<?= $row['selected'] ?>">
                            <input style="display:none;" type="text" value="<?= $username ?>">
                            <img src="images/check.png">
                            <p dir="auto"><?= $row['item'] ?></p>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </main>
        <footer>
            <form action="main.php?username=<?= $username ?>" method="post">
                <input name="new_item" type="text" placeholder="add new item" dir="auto">
                <input type="submit" value="+">
            </form>
        </footer>
        <div class="info">
            <button id="close-info" class="close-btn">X</button>
            <h2>info</h2>
            <div class="text-box">
                <p>Grocery List helps you to manage your shopping.<br />
                After you create your own user, you able to add item as you wish to the list.<br />
                Its fine that many people use the same account - just reenter is needed to see real-time others changes.<br />
                Hope this app will be useful for you. </p>
            </div>
        </div>
        <div class="pop-up delete">
            <div class="message">
                <button id="close-delete" class="close-btn">X</button>
                <h3>delete<br />selected items</h3>
                <hr />
                <p id="delete-msg">are you sure you want delete x items?</p>
                <form action="main.php?username=<?= $username ?>" method="post">
                    <input name="delete_selected" class="confirm-btn" type="submit" value="confrim">
                </form>
            </div>
        </div>
        <div class="pop-up log-out">
            <div class="message">
                <button id="close-logout"  class="close-btn">X</button>
                <h3>log out</h3>
                <hr />
                <p>are you sure you want to exit?</p>
                <form action="server/logOut.php" method="get">
                    <input class="confirm-btn" type="submit" value="confrim">
                </form>
            </div>
        </div>
        <?php if(isset($error) && $error != "false") : ?>
            <div class="error">
                <?= $error ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="javascripts/global.js"></script>
    <script src="javascripts/main.js"></script>

</body>
</html>