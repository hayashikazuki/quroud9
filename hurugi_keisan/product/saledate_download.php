<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
    </head>
    <body>
        
    <?php require_once('../common/common.php'); ?>
    
    <p>ダウンロードしたい日を選んでください。</p>
    <form method="post" action="saledate_download_done.php">
        <?php pulldown_year() ?>
        <p>年</p>
        <?php pulldown_month() ?>
        <p>月</p>
        <?php pulldown_day() ?>
        <p>日</p>
        <input type="submit" value="ダウンロード">
    </form>
    
    </body>
</html>
    