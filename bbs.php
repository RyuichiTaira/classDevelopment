<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>サークルサイト</title>
        <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>掲示板</h1>
        <form action="write.php" method = "post">
            <div>
                <label>タイトル</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div>
                <label>名前</label>
                <input type="text" name="name">
            </div>
            <div>
                <textarea name="body" rows=5></textarea>
            </div>
            <div>
                <label>削除パスワード</label>
                <input type="text" name="pass">
            </div>
            <input type="submit" value="書き込む" class="btn btn-primary">
        </form>
    </body>
</html>