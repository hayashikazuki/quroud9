<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
        <p>仕入れ情報を入力して下さい。</p>
        <br />
        <form action="hurugi_add_check.php" method="post" enctype="multipart/form-data">
            <p>商品コード</p>
            <input type="text" name="namecode" required>
            <br />
            <p>商品名</p>
            <input type="text" name="name" required>
            <br />
            <p>仕入額</p>
            <input type="text" name="stocking" value="0">円
            <br />
            <p>販売予想額</p>
            <input type="text" name="expect" value="0">円
            <br />
            <p>販売額</p>
            <input type="text" name="sale" value="0">円
            <br />
            <p>仕入先</p>
            <input type="text" name="shop" required>
            <br />
            <p>購入日</p>
            <input type="date" name="date">
            <br />
            <p>販売日</p>
            <input type="date" name="saledate">
            <br />
            <p>備考欄</p>
            <input type="text" name="remarks">
            <br />
            <p>画像</p>
            <input type="file" name="gazou">
            <br />
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
        </form>
    </body>
</html>