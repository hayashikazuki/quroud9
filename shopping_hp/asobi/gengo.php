<!DOCTYPE>
<html lang=ja>
    <head>
        <meta charset="UTF-8">
        <title>元号変換</title>
    </head>
    <body>
        
    <?php
    
    require_once('../common/common.php');
    
    $seireki=$_POST['seireki'];
    
    $wareki=gengo($seireki);
    print $wareki;
    

    ?>    
    </body>
</html>