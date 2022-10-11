<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
    </head>

    <body>
        <h1>アンケート送信テスト</h1>
        <form action="post.php" method="post">
            <p>お名前:<input type="text" name="name"></p>
            <p>性別：
                <input type="radio" name="gender" value="man">男性
                <input type="radio" name="gender" value="woman">女性
            </p>
            <p>評価：
                <select name="star">
                    <option value="1">★</option>
                    <option value="2">★★</option>
                    <option value="3">★★★</option>
                    <option value="4">★★★★</option>
                    <option value="5">★★★★★</option>
                </select>
            </p>
            <p>ご意見</p>
            <p><textarea name="other"></textarea></p>
            <input type="submit" value="送信">
        </form>
    </body>

</html>