{"filter":false,"title":"king_info_delete_done.php","tooltip":"/king HP/info/king_info_delete_done.php","undoManager":{"mark":24,"position":24,"stack":[[{"start":{"row":0,"column":0},"end":{"row":63,"column":7},"action":"insert","lines":["<?php","session_start();","session_regenerate_id(true);","if(isset($_SESSION['login'])==false)","{","    print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();","}","else","{","    print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';","}","?>","<!DOCTYPE html>","<html lang=\"ja\">","    <head>","        <meta charset=\"UTF-8\">","        <title>ろくまる農園</title>","    </head>","    <body>","    ","    <?php   ","    ","    try","    {","    ","    $pro_code = $_POST['code'];","    $pro_gazou_name = $_POST['gazou_name'];","    ","    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'DELETE FROM mst_product WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $pro_code;","    $stmt->execute($data); ","    ","    $dbh = null;","    ","    if($pro_gazou_name != '')","    {","        unlink('./gazou/'.$pro_gazou_name);","    }","    }","    catch (Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ","    ?>","    ","    削除しました。<br />","    <br />","    <a href =\"pro_list.php\">戻る</a>","        ","    </body>","</html>"],"id":1}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":3},"action":"insert","lines":["// "],"id":2},{"start":{"row":2,"column":0},"end":{"row":2,"column":3},"action":"insert","lines":["// "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":3},"action":"insert","lines":["// "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":3},"action":"insert","lines":["// "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":3},"action":"insert","lines":["// "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":3},"action":"insert","lines":["// "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":3},"action":"insert","lines":["// "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":3},"action":"insert","lines":["// "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":3},"action":"insert","lines":["// "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":3},"action":"insert","lines":["// "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":3},"action":"insert","lines":["// "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":3},"action":"insert","lines":["// "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":3},"action":"insert","lines":["// "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":3},"action":"insert","lines":["// "]}],[{"start":{"row":20,"column":20},"end":{"row":20,"column":21},"action":"remove","lines":["園"],"id":3},{"start":{"row":20,"column":19},"end":{"row":20,"column":20},"action":"remove","lines":["農"]},{"start":{"row":20,"column":18},"end":{"row":20,"column":19},"action":"remove","lines":["る"]},{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"remove","lines":["ま"]},{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"remove","lines":["く"]},{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"remove","lines":["ろ"]}],[{"start":{"row":20,"column":15},"end":{"row":20,"column":16},"action":"insert","lines":["C"],"id":4},{"start":{"row":20,"column":16},"end":{"row":20,"column":17},"action":"insert","lines":["O"]},{"start":{"row":20,"column":17},"end":{"row":20,"column":18},"action":"insert","lines":["N"]},{"start":{"row":20,"column":18},"end":{"row":20,"column":19},"action":"insert","lines":["T"]},{"start":{"row":20,"column":19},"end":{"row":20,"column":20},"action":"insert","lines":["A"]},{"start":{"row":20,"column":20},"end":{"row":20,"column":21},"action":"insert","lines":["C"]}],[{"start":{"row":20,"column":21},"end":{"row":20,"column":22},"action":"insert","lines":["T"],"id":5}],[{"start":{"row":20,"column":22},"end":{"row":20,"column":27},"action":"insert","lines":["管理ページ"],"id":6}],[{"start":{"row":30,"column":4},"end":{"row":30,"column":43},"action":"remove","lines":["$pro_gazou_name = $_POST['gazou_name'];"],"id":7},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"remove","lines":["    "]},{"start":{"row":29,"column":31},"end":{"row":30,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":44,"column":4},"end":{"row":47,"column":5},"action":"remove","lines":["if($pro_gazou_name != '')","    {","        unlink('./gazou/'.$pro_gazou_name);","    }"],"id":8}],[{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"remove","lines":["o"],"id":9},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"remove","lines":["r"]},{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"remove","lines":["p"]}],[{"start":{"row":29,"column":5},"end":{"row":29,"column":6},"action":"insert","lines":["k"],"id":10},{"start":{"row":29,"column":6},"end":{"row":29,"column":7},"action":"insert","lines":["i"]},{"start":{"row":29,"column":7},"end":{"row":29,"column":8},"action":"insert","lines":["n"]},{"start":{"row":29,"column":8},"end":{"row":29,"column":9},"action":"insert","lines":["g"]}],[{"start":{"row":31,"column":26},"end":{"row":31,"column":27},"action":"remove","lines":["p"],"id":11},{"start":{"row":31,"column":25},"end":{"row":31,"column":26},"action":"remove","lines":["o"]},{"start":{"row":31,"column":24},"end":{"row":31,"column":25},"action":"remove","lines":["h"]},{"start":{"row":31,"column":23},"end":{"row":31,"column":24},"action":"remove","lines":["s"]}],[{"start":{"row":31,"column":23},"end":{"row":31,"column":24},"action":"insert","lines":["k"],"id":12},{"start":{"row":31,"column":24},"end":{"row":31,"column":25},"action":"insert","lines":["i"]},{"start":{"row":31,"column":25},"end":{"row":31,"column":26},"action":"insert","lines":["n"]},{"start":{"row":31,"column":26},"end":{"row":31,"column":27},"action":"insert","lines":["g"]}],[{"start":{"row":31,"column":27},"end":{"row":31,"column":28},"action":"insert","lines":["_"],"id":13}],[{"start":{"row":31,"column":28},"end":{"row":31,"column":29},"action":"insert","lines":["h"],"id":14},{"start":{"row":31,"column":29},"end":{"row":31,"column":30},"action":"insert","lines":["p"]},{"start":{"row":31,"column":30},"end":{"row":31,"column":31},"action":"insert","lines":["_"]}],[{"start":{"row":31,"column":31},"end":{"row":31,"column":32},"action":"insert","lines":["c"],"id":15},{"start":{"row":31,"column":32},"end":{"row":31,"column":33},"action":"insert","lines":["o"]},{"start":{"row":31,"column":33},"end":{"row":31,"column":34},"action":"insert","lines":["n"]},{"start":{"row":31,"column":34},"end":{"row":31,"column":35},"action":"insert","lines":["t"]}],[{"start":{"row":31,"column":35},"end":{"row":31,"column":36},"action":"insert","lines":["a"],"id":16},{"start":{"row":31,"column":36},"end":{"row":31,"column":37},"action":"insert","lines":["c"]},{"start":{"row":31,"column":37},"end":{"row":31,"column":38},"action":"insert","lines":["t"]}],[{"start":{"row":37,"column":34},"end":{"row":37,"column":35},"action":"remove","lines":["t"],"id":17},{"start":{"row":37,"column":33},"end":{"row":37,"column":34},"action":"remove","lines":["c"]},{"start":{"row":37,"column":32},"end":{"row":37,"column":33},"action":"remove","lines":["u"]},{"start":{"row":37,"column":31},"end":{"row":37,"column":32},"action":"remove","lines":["d"]},{"start":{"row":37,"column":30},"end":{"row":37,"column":31},"action":"remove","lines":["o"]},{"start":{"row":37,"column":29},"end":{"row":37,"column":30},"action":"remove","lines":["r"]},{"start":{"row":37,"column":28},"end":{"row":37,"column":29},"action":"remove","lines":["p"]},{"start":{"row":37,"column":27},"end":{"row":37,"column":28},"action":"remove","lines":["_"]},{"start":{"row":37,"column":26},"end":{"row":37,"column":27},"action":"remove","lines":["t"]},{"start":{"row":37,"column":25},"end":{"row":37,"column":26},"action":"remove","lines":["s"]},{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"remove","lines":["m"]}],[{"start":{"row":37,"column":24},"end":{"row":37,"column":25},"action":"insert","lines":["k"],"id":18},{"start":{"row":37,"column":25},"end":{"row":37,"column":26},"action":"insert","lines":["i"]},{"start":{"row":37,"column":26},"end":{"row":37,"column":27},"action":"insert","lines":["n"]},{"start":{"row":37,"column":27},"end":{"row":37,"column":28},"action":"insert","lines":["g"]}],[{"start":{"row":37,"column":28},"end":{"row":37,"column":29},"action":"insert","lines":["_"],"id":19},{"start":{"row":37,"column":29},"end":{"row":37,"column":30},"action":"insert","lines":["i"]},{"start":{"row":37,"column":30},"end":{"row":37,"column":31},"action":"insert","lines":["n"]},{"start":{"row":37,"column":31},"end":{"row":37,"column":32},"action":"insert","lines":["f"]},{"start":{"row":37,"column":32},"end":{"row":37,"column":33},"action":"insert","lines":["o"]}],[{"start":{"row":39,"column":17},"end":{"row":39,"column":18},"action":"remove","lines":["o"],"id":20},{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"remove","lines":["r"]},{"start":{"row":39,"column":15},"end":{"row":39,"column":16},"action":"remove","lines":["p"]},{"start":{"row":39,"column":14},"end":{"row":39,"column":15},"action":"remove","lines":["$"]}],[{"start":{"row":39,"column":14},"end":{"row":39,"column":15},"action":"insert","lines":["$"],"id":21},{"start":{"row":39,"column":15},"end":{"row":39,"column":16},"action":"insert","lines":["k"]},{"start":{"row":39,"column":16},"end":{"row":39,"column":17},"action":"insert","lines":["i"]},{"start":{"row":39,"column":17},"end":{"row":39,"column":18},"action":"insert","lines":["n"]},{"start":{"row":39,"column":18},"end":{"row":39,"column":19},"action":"insert","lines":["g"]}],[{"start":{"row":56,"column":16},"end":{"row":56,"column":17},"action":"remove","lines":["o"],"id":22},{"start":{"row":56,"column":15},"end":{"row":56,"column":16},"action":"remove","lines":["r"]},{"start":{"row":56,"column":14},"end":{"row":56,"column":15},"action":"remove","lines":["p"]}],[{"start":{"row":56,"column":14},"end":{"row":56,"column":15},"action":"insert","lines":["k"],"id":23},{"start":{"row":56,"column":15},"end":{"row":56,"column":16},"action":"insert","lines":["i"]},{"start":{"row":56,"column":16},"end":{"row":56,"column":17},"action":"insert","lines":["n"]},{"start":{"row":56,"column":17},"end":{"row":56,"column":18},"action":"insert","lines":["g"]},{"start":{"row":56,"column":18},"end":{"row":56,"column":19},"action":"insert","lines":["_"]}],[{"start":{"row":56,"column":19},"end":{"row":56,"column":20},"action":"insert","lines":["i"],"id":24},{"start":{"row":56,"column":20},"end":{"row":56,"column":21},"action":"insert","lines":["n"]},{"start":{"row":56,"column":21},"end":{"row":56,"column":22},"action":"insert","lines":["f"]},{"start":{"row":56,"column":22},"end":{"row":56,"column":23},"action":"insert","lines":["o"]}],[{"start":{"row":1,"column":0},"end":{"row":1,"column":3},"action":"remove","lines":["// "],"id":25},{"start":{"row":2,"column":0},"end":{"row":2,"column":3},"action":"remove","lines":["// "]},{"start":{"row":3,"column":0},"end":{"row":3,"column":3},"action":"remove","lines":["// "]},{"start":{"row":4,"column":0},"end":{"row":4,"column":3},"action":"remove","lines":["// "]},{"start":{"row":5,"column":0},"end":{"row":5,"column":3},"action":"remove","lines":["// "]},{"start":{"row":6,"column":0},"end":{"row":6,"column":3},"action":"remove","lines":["// "]},{"start":{"row":7,"column":0},"end":{"row":7,"column":3},"action":"remove","lines":["// "]},{"start":{"row":8,"column":0},"end":{"row":8,"column":3},"action":"remove","lines":["// "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":3},"action":"remove","lines":["// "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":3},"action":"remove","lines":["// "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":3},"action":"remove","lines":["// "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":3},"action":"remove","lines":["// "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":3},"action":"remove","lines":["// "]},{"start":{"row":14,"column":0},"end":{"row":14,"column":3},"action":"remove","lines":["// "]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":1,"column":0},"end":{"row":14,"column":1},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1593402064080,"hash":"c02134e94c49adfa9f205ebc7294972c050ca3b5"}