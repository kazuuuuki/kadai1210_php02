<html>

<head>
    <meta charset="utf-8">
    <title>大切なことは全て映画が教えてくれた</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- フォームラッパー -->
    <div class="form_wrapper">
    <!-- フォーム開始 -->
    <form action="insert.php" method="post" class="form">
    <h1 class="main_title">#徒然映画記</h1>
    <a href="read.php" class="conf">記録を確認</a>

        <!-- 名前の入力 -->
        <div class="name_all content">
            <input type="text" name="name" placeholder="お名前" class="name">
        </div>
        <!-- 年齢の入力 -->
        <div class="age_all content">
            <select name="age" class="age">
                <option value="未選択">年齢を選択</option>
                <?php
                for($i=18; $i<=70; $i++){
                    echo "<option value='{$i}'>{$i}歳</option>";
                }
                ?>
            </select>
        </div>
        <!-- ジャンルの入力 -->
        <div class="genre_all content">
            <?php
            $genres = array("アクション", "コメディ", "ヒューマンドラマ", "サスペンス", "SF", "スポーツ", "ホラー", "ミリタリー", "ミュージカル", "ラブロマンス", "社会派");
            ?>
            <select name="genre" class="genre">
               <option value="未選択">ジャンルを選択</option> 
               <?php
                foreach ($genres as $genre){
                   echo "<option value='{$genre}'>{$genre}</option>";
                }
               ?>
            </select>
        </div>
        <!-- 作品名の入力 -->
        <div class="title_all content">
            <input type="text" name="title" placeholder="作品名" class="title">
        </div>
        <!-- 評価の入力 -->
        <div class="review_all content">
            <?php
            $reviews = array("★","★★","★★★","★★★★","★★★★★");
            ?>
            <select name="review" class="review">
                <option value="未選択">スコアを選択</option>
                <?php
                foreach($reviews as $review){
                    echo "<option value='{$review}'>{$review}</option>";
                }
                ?>
            </select>
        </div>
        <!-- 鑑賞日の入力 -->
        <div class="date_all content">
            <input type="date" name="date" class="date" >
            <p class="data_text">(鑑賞日を入力)</p>
        </div>
        <!-- 送信ボタン -->
        <div class="sent_all">
            <button value="登録" class="sent">登録</button><br>

        </div>
    </form>
    </div>
    <!-- フォームラッパーここまで -->
</body>

</html>
