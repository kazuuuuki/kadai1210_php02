<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300&family=Noto+Serif+JP&family=Rubik+80s+Fade&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>書籍記録</title>
</head>
<body>
    <!-- header start-->
    <header>
        <h2 class="main_title">Real Bookmark</h2>
        <nav class="navbar">
            <div class="nav">
                <a class="nav_next" href="select.php">data</a>
            </div>
        </nav>
    </header>
    <!-- header end -->

    <!-- main start -->
    <div class="form_wrapper">
        <form action="insert.php" method="post">
            <fieldset>
                <div class="title form_content">
                    <label for="title"><div class="form_hl">Title</div>
                    <input type="text" name="title"></label>
                </div>
                <div class="url form_content">
                    <label for="url"><div class="form_hl">BookURL</div>
                    <input type="text" name="url"></label>
                </div>
                <div class="coment form_content">
                    <label for="coment"><div class="form_hl">Coment</div>
                    <textarea name="coment" rows="4" cols="40"></textarea></label>
                </div>
                <div class="sent_btn">
                    <button type="submit" value="送信">Submit</button>
                </div>
        </form>
    </div>
    <!-- main end -->


</body>
</html>