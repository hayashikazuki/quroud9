{"filter":false,"title":"staff_delete_done.php","tooltip":"/shopping_hp/staff_delete_done.php","undoManager":{"mark":12,"position":12,"stack":[[{"start":{"row":0,"column":0},"end":{"row":49,"column":7},"action":"insert","lines":["<!DOCTYPE html>","<html lang=\"ja\">","    <head>","        <meta charset=\"UTF-8\">","        <title>ろくまる農園</title>","    </head>","    <body>","    ","    <?php   ","    ","    try","    {","    ","    $staff_code = $_POST['code'];","    $staff_name = $_POST['name'];","    $staff_pass = $_POST['pass'];","    ","    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');","    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');","    ","    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $staff_name;","    $data[] = $staff_pass;","    $data[] = $staff_code;","    $stmt->execute($data); ","    ","    $dbh = null;","    ","    }","    catch (Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ","    ?>","    ","    修正しました。<br />","    <br />","    <a href =\"staff_list.php\">戻る</a>","        ","    </body>","</html>"],"id":1}],[{"start":{"row":44,"column":5},"end":{"row":44,"column":6},"action":"remove","lines":["正"],"id":2},{"start":{"row":44,"column":4},"end":{"row":44,"column":5},"action":"remove","lines":["修"]}],[{"start":{"row":44,"column":4},"end":{"row":44,"column":6},"action":"insert","lines":["削除"],"id":3}],[{"start":{"row":14,"column":4},"end":{"row":18,"column":67},"action":"remove","lines":["$staff_name = $_POST['name'];","    $staff_pass = $_POST['pass'];","    ","    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');","    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');"],"id":4}],[{"start":{"row":22,"column":17},"end":{"row":22,"column":18},"action":"remove","lines":["E"],"id":5},{"start":{"row":22,"column":16},"end":{"row":22,"column":17},"action":"remove","lines":["T"]},{"start":{"row":22,"column":15},"end":{"row":22,"column":16},"action":"remove","lines":["A"]},{"start":{"row":22,"column":14},"end":{"row":22,"column":15},"action":"remove","lines":["D"]},{"start":{"row":22,"column":13},"end":{"row":22,"column":14},"action":"remove","lines":["P"]},{"start":{"row":22,"column":12},"end":{"row":22,"column":13},"action":"remove","lines":["U"]}],[{"start":{"row":22,"column":12},"end":{"row":22,"column":13},"action":"insert","lines":["D"],"id":6},{"start":{"row":22,"column":13},"end":{"row":22,"column":14},"action":"insert","lines":["E"]},{"start":{"row":22,"column":14},"end":{"row":22,"column":15},"action":"insert","lines":["L"]}],[{"start":{"row":22,"column":15},"end":{"row":22,"column":16},"action":"insert","lines":["E"],"id":7}],[{"start":{"row":22,"column":16},"end":{"row":22,"column":17},"action":"insert","lines":["T"],"id":8},{"start":{"row":22,"column":17},"end":{"row":22,"column":18},"action":"insert","lines":["E"]}],[{"start":{"row":22,"column":29},"end":{"row":22,"column":51},"action":"remove","lines":["SET name=?,password=? "],"id":9}],[{"start":{"row":22,"column":19},"end":{"row":22,"column":20},"action":"insert","lines":["F"],"id":10},{"start":{"row":22,"column":20},"end":{"row":22,"column":21},"action":"insert","lines":["R"]},{"start":{"row":22,"column":21},"end":{"row":22,"column":22},"action":"insert","lines":["O"]}],[{"start":{"row":22,"column":22},"end":{"row":22,"column":23},"action":"insert","lines":["M"],"id":11}],[{"start":{"row":22,"column":23},"end":{"row":22,"column":24},"action":"insert","lines":[" "],"id":12}],[{"start":{"row":24,"column":4},"end":{"row":25,"column":26},"action":"remove","lines":["$data[] = $staff_name;","    $data[] = $staff_pass;"],"id":13},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"remove","lines":["    "]},{"start":{"row":23,"column":32},"end":{"row":24,"column":0},"action":"remove","lines":["",""]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":23,"column":32},"end":{"row":23,"column":32},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1592638001056,"hash":"7a14bbcbcb8d39573c49ac5c6e571918377bae10"}