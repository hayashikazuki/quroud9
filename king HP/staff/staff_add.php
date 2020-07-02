<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>CONTACT管理ページ</title>
    </head>
    <body>
        スタッフ追加<br />
        <br />
        <form method ="post" action="staff_add_cheak.php">
            
            スタッフ名を入力してください。<br />
            <input type="text" name="name" style="width:200px"><br />
            パスワードを入力してください。<br />
            <input type="password" name="pass" style="width:100px"><br />
            パスワードをもう１度入力してください。<br />
            <input type="password" name="pass2" style="width:100px"><br />
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="OK">
            
        </form>
        
        
        
        
        
    </body>
</html>