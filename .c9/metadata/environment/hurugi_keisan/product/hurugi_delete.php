{"filter":false,"title":"hurugi_delete.php","tooltip":"/hurugi_keisan/product/hurugi_delete.php","undoManager":{"mark":94,"position":94,"stack":[[{"start":{"row":0,"column":0},"end":{"row":66,"column":4},"action":"insert","lines":["<!DOCTTYPE>","<html lang=\"ja\">","    <head>","        <meta charaset=\"UTF-8\">","        <title>古着管理アプリ</title>","    </head>","    <body>","    <?php","    ","    try","    {","        ","    require_once('../common/common.php');","    ","    $post = sanitize($_POST);","    $hurugi_code=$post['code'];","    $hurugi_name=$post['name'];","    $hurugi_stocking=$post['stocking'];","    $hurugi_sale=$post['sale'];","    $hurugi_shop=$post['shop'];","    $hurugi_date=$post['date'];","    $hurugi_remarks=$post['remarks'];","    ","    ","     if(preg_match('/\\A[0-9]+\\z/',$hurugi_stocking)==0 || preg_match('/\\A[0-9]+\\z/',$hurugi_sale)==0)","    {","        print'正しく半角数字で記入して下さい。';","        print'<br />';","        print'<form>';","        print'<input type=\"button\" onclick=\"history.back()\" value=\"戻る\">';","        print'</form>';","        exit();","    ","    }","    ","    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'UPDATE hurugi_product SET name=?,stocking=?,sale=?,shop=?,date=?,remarks=? WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[]=$hurugi_name;","    $data[]=$hurugi_stocking;","    $data[]=$hurugi_sale;","    $data[]=$hurugi_shop;","    $data[]=$hurugi_date;","    $data[]=$hurugi_remarks;","    $data[]=$hurugi_code;","    $stmt->execute($data);","    ","    $dbh = null;","    ","    }","    catch(Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ?>","    ","    <p>修正しました。</p>","    <a href=\"hurugi_list.php\">戻る</a>","    </body>","</html>","    "],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":66,"column":4},"action":"remove","lines":["<!DOCTTYPE>","<html lang=\"ja\">","    <head>","        <meta charaset=\"UTF-8\">","        <title>古着管理アプリ</title>","    </head>","    <body>","    <?php","    ","    try","    {","        ","    require_once('../common/common.php');","    ","    $post = sanitize($_POST);","    $hurugi_code=$post['code'];","    $hurugi_name=$post['name'];","    $hurugi_stocking=$post['stocking'];","    $hurugi_sale=$post['sale'];","    $hurugi_shop=$post['shop'];","    $hurugi_date=$post['date'];","    $hurugi_remarks=$post['remarks'];","    ","    ","     if(preg_match('/\\A[0-9]+\\z/',$hurugi_stocking)==0 || preg_match('/\\A[0-9]+\\z/',$hurugi_sale)==0)","    {","        print'正しく半角数字で記入して下さい。';","        print'<br />';","        print'<form>';","        print'<input type=\"button\" onclick=\"history.back()\" value=\"戻る\">';","        print'</form>';","        exit();","    ","    }","    ","    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'UPDATE hurugi_product SET name=?,stocking=?,sale=?,shop=?,date=?,remarks=? WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[]=$hurugi_name;","    $data[]=$hurugi_stocking;","    $data[]=$hurugi_sale;","    $data[]=$hurugi_shop;","    $data[]=$hurugi_date;","    $data[]=$hurugi_remarks;","    $data[]=$hurugi_code;","    $stmt->execute($data);","    ","    $dbh = null;","    ","    }","    catch(Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ?>","    ","    <p>修正しました。</p>","    <a href=\"hurugi_list.php\">戻る</a>","    </body>","</html>","    "],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":72,"column":4},"action":"insert","lines":["<!DOCTTYPE>","<html lang=\"ja\">","    <head>","        <meta charaset=\"UTF-8\">","        <title>古着管理アプリ</title>","    </head>","    <body>","    <?php","    ","    try","    {","        ","    require_once('../common/common.php');","    ","    $hurugi_code=$GET['hurugicode'];","    ","    $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql ='SELECT name,stocking,sale,shop,date,remarks FROM hurugi_product WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[]=$hurugi_code;","    $stmt->execute($data);","    ","    $rec = $stmt->fetch(PDO::FETCH_ASSOC);","    $hurugi_name=$rec['name'];","    $hurugi_stocking=$rec['stocking'];","    $hurugi_sale=$rec['sale'];","    $hurugi_shop=$rec['shop'];","    $hurugi_date=$rec['date'];","    $hurugi_remarks=$rec['remarks'];","    ","    $dbh=null;","    ","    }","    catch(Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ?>","    ","    商品修正","    ","    <form action=\"hurugi_edit_done.php\" method=\"post\">","        <input type=\"hidden\" name=\"code\" value=\"<?php print $hurugi_code; ?>\">","            <p>商品名</p>","            <input type=\"text\" name=\"name\" required value=\"<?php print $hurugi_name; ?>\">","            <br />","            <p>仕入額</p>","            <input type=\"text\" name=\"stocking\" value=\"<?php print $hurugi_stocking; ?>\">円","            <br />","            <p>販売額</p>","            <input type=\"text\" name=\"sale\" value=\"<?php print $hurugi_sale; ?>\">円","            <br />","            <p>仕入先</p>","            <input type=\"text\" name=\"shop\" required value=\"<?php print $hurugi_shop; ?>\">","            <br />","            <p>購入日</p>","            <input type=\"date\" name=\"date\" required value=\"<?php print $hurugi_date; ?>\">","            <br />","            <p>備考欄</p>","            <input name=\"remarks\" rows=\"5\" cols=\"30\" style=\"resize:none\" value=\"<?php print $hurugi_remarks; ?>\">","            <br />","            <br />","            <input type=\"button\" onclick=\"history.back()\" value=\"戻る\">","            <input type=\"submit\" value=\"OK\">","    </body>","</html>","    "],"id":3}],[{"start":{"row":45,"column":4},"end":{"row":45,"column":5},"action":"insert","lines":["<"],"id":4},{"start":{"row":45,"column":5},"end":{"row":45,"column":6},"action":"insert","lines":["p"]}],[{"start":{"row":45,"column":6},"end":{"row":45,"column":11},"action":"insert","lines":["></p>"],"id":5}],[{"start":{"row":45,"column":7},"end":{"row":45,"column":11},"action":"insert","lines":["商品修正"],"id":6}],[{"start":{"row":45,"column":18},"end":{"row":45,"column":19},"action":"remove","lines":["正"],"id":7},{"start":{"row":45,"column":17},"end":{"row":45,"column":18},"action":"remove","lines":["修"]},{"start":{"row":45,"column":16},"end":{"row":45,"column":17},"action":"remove","lines":["品"]},{"start":{"row":45,"column":15},"end":{"row":45,"column":16},"action":"remove","lines":["商"]}],[{"start":{"row":47,"column":28},"end":{"row":47,"column":29},"action":"remove","lines":["t"],"id":8},{"start":{"row":47,"column":27},"end":{"row":47,"column":28},"action":"remove","lines":["i"]},{"start":{"row":47,"column":26},"end":{"row":47,"column":27},"action":"remove","lines":["d"]},{"start":{"row":47,"column":25},"end":{"row":47,"column":26},"action":"remove","lines":["e"]}],[{"start":{"row":47,"column":25},"end":{"row":47,"column":26},"action":"insert","lines":["d"],"id":9},{"start":{"row":47,"column":26},"end":{"row":47,"column":27},"action":"insert","lines":["e"]},{"start":{"row":47,"column":27},"end":{"row":47,"column":28},"action":"insert","lines":["l"]},{"start":{"row":47,"column":28},"end":{"row":47,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":47,"column":29},"end":{"row":47,"column":30},"action":"insert","lines":["t"],"id":10},{"start":{"row":47,"column":30},"end":{"row":47,"column":31},"action":"insert","lines":["e"]}],[{"start":{"row":49,"column":12},"end":{"row":49,"column":22},"action":"remove","lines":["<p>商品名</p>"],"id":11}],[{"start":{"row":49,"column":12},"end":{"row":49,"column":13},"action":"insert","lines":["¥"],"id":12}],[{"start":{"row":49,"column":12},"end":{"row":49,"column":13},"action":"remove","lines":["¥"],"id":13},{"start":{"row":49,"column":8},"end":{"row":49,"column":12},"action":"remove","lines":["    "]},{"start":{"row":49,"column":4},"end":{"row":49,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":51,"column":12},"end":{"row":52,"column":22},"action":"remove","lines":["<br />","            <p>仕入額</p>"],"id":14}],[{"start":{"row":53,"column":12},"end":{"row":54,"column":22},"action":"remove","lines":["<br />","            <p>販売額</p>"],"id":15},{"start":{"row":53,"column":8},"end":{"row":53,"column":12},"action":"remove","lines":["    "]},{"start":{"row":53,"column":4},"end":{"row":53,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":55,"column":12},"end":{"row":56,"column":22},"action":"remove","lines":["<br />","            <p>仕入先</p>"],"id":16}],[{"start":{"row":57,"column":12},"end":{"row":58,"column":22},"action":"remove","lines":["<br />","            <p>購入日</p>"],"id":17}],[{"start":{"row":59,"column":12},"end":{"row":60,"column":22},"action":"remove","lines":["<br />","            <p>備考欄</p>"],"id":18}],[{"start":{"row":61,"column":12},"end":{"row":62,"column":18},"action":"remove","lines":["<br />","            <br />"],"id":19}],[{"start":{"row":50,"column":8},"end":{"row":50,"column":12},"action":"remove","lines":["    "],"id":20},{"start":{"row":50,"column":4},"end":{"row":50,"column":8},"action":"remove","lines":["    "]},{"start":{"row":50,"column":0},"end":{"row":50,"column":4},"action":"remove","lines":["    "]},{"start":{"row":49,"column":4},"end":{"row":50,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":48,"column":4},"end":{"row":48,"column":8},"action":"remove","lines":["    "],"id":21}],[{"start":{"row":51,"column":8},"end":{"row":51,"column":12},"action":"remove","lines":["    "],"id":22},{"start":{"row":51,"column":4},"end":{"row":51,"column":8},"action":"remove","lines":["    "]},{"start":{"row":51,"column":0},"end":{"row":51,"column":4},"action":"remove","lines":["    "]},{"start":{"row":50,"column":12},"end":{"row":51,"column":0},"action":"remove","lines":["",""]},{"start":{"row":50,"column":8},"end":{"row":50,"column":12},"action":"remove","lines":["    "]},{"start":{"row":50,"column":4},"end":{"row":50,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":52,"column":10},"end":{"row":52,"column":11},"action":"remove","lines":[" "],"id":23},{"start":{"row":52,"column":9},"end":{"row":52,"column":10},"action":"remove","lines":[" "]},{"start":{"row":52,"column":8},"end":{"row":52,"column":9},"action":"remove","lines":[" "]},{"start":{"row":52,"column":4},"end":{"row":52,"column":8},"action":"remove","lines":["    "]},{"start":{"row":52,"column":0},"end":{"row":52,"column":4},"action":"remove","lines":["    "]},{"start":{"row":51,"column":4},"end":{"row":52,"column":0},"action":"remove","lines":["",""]},{"start":{"row":51,"column":0},"end":{"row":51,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":51,"column":0},"end":{"row":51,"column":1},"action":"insert","lines":[" "],"id":24},{"start":{"row":51,"column":1},"end":{"row":51,"column":2},"action":"insert","lines":[" "]},{"start":{"row":51,"column":2},"end":{"row":51,"column":3},"action":"insert","lines":[" "]},{"start":{"row":51,"column":3},"end":{"row":51,"column":4},"action":"insert","lines":[" "]}],[{"start":{"row":51,"column":0},"end":{"row":51,"column":4},"action":"remove","lines":["    "],"id":25}],[{"start":{"row":51,"column":0},"end":{"row":51,"column":1},"action":"insert","lines":[" "],"id":26},{"start":{"row":51,"column":1},"end":{"row":51,"column":2},"action":"insert","lines":[" "]},{"start":{"row":51,"column":2},"end":{"row":51,"column":3},"action":"insert","lines":[" "]},{"start":{"row":51,"column":3},"end":{"row":51,"column":4},"action":"insert","lines":[" "]}],[{"start":{"row":51,"column":0},"end":{"row":51,"column":4},"action":"remove","lines":["    "],"id":27}],[{"start":{"row":51,"column":1},"end":{"row":51,"column":2},"action":"insert","lines":[" "],"id":28},{"start":{"row":51,"column":2},"end":{"row":51,"column":3},"action":"insert","lines":[" "]},{"start":{"row":51,"column":3},"end":{"row":51,"column":4},"action":"insert","lines":[" "]}],[{"start":{"row":53,"column":8},"end":{"row":53,"column":12},"action":"remove","lines":["    "],"id":29},{"start":{"row":53,"column":4},"end":{"row":53,"column":8},"action":"remove","lines":["    "]},{"start":{"row":53,"column":0},"end":{"row":53,"column":4},"action":"remove","lines":["    "]},{"start":{"row":52,"column":12},"end":{"row":53,"column":0},"action":"remove","lines":["",""]},{"start":{"row":52,"column":8},"end":{"row":52,"column":12},"action":"remove","lines":["    "]},{"start":{"row":52,"column":4},"end":{"row":52,"column":8},"action":"remove","lines":["    "]},{"start":{"row":52,"column":0},"end":{"row":52,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":[" "],"id":30},{"start":{"row":52,"column":1},"end":{"row":52,"column":2},"action":"insert","lines":[" "]},{"start":{"row":52,"column":2},"end":{"row":52,"column":3},"action":"insert","lines":[" "]},{"start":{"row":52,"column":3},"end":{"row":52,"column":4},"action":"insert","lines":[" "]}],[{"start":{"row":54,"column":8},"end":{"row":54,"column":12},"action":"remove","lines":["    "],"id":31},{"start":{"row":54,"column":4},"end":{"row":54,"column":8},"action":"remove","lines":["    "]},{"start":{"row":54,"column":0},"end":{"row":54,"column":4},"action":"remove","lines":["    "]},{"start":{"row":53,"column":12},"end":{"row":54,"column":0},"action":"remove","lines":["",""]},{"start":{"row":53,"column":8},"end":{"row":53,"column":12},"action":"remove","lines":["    "]},{"start":{"row":53,"column":4},"end":{"row":53,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":55,"column":8},"end":{"row":55,"column":12},"action":"remove","lines":["    "],"id":32},{"start":{"row":55,"column":4},"end":{"row":55,"column":8},"action":"remove","lines":["    "]},{"start":{"row":55,"column":0},"end":{"row":55,"column":4},"action":"remove","lines":["    "]},{"start":{"row":54,"column":12},"end":{"row":55,"column":0},"action":"remove","lines":["",""]},{"start":{"row":54,"column":8},"end":{"row":54,"column":12},"action":"remove","lines":["    "]},{"start":{"row":54,"column":4},"end":{"row":54,"column":8},"action":"remove","lines":["    "]},{"start":{"row":54,"column":0},"end":{"row":54,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":[" "],"id":33},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"insert","lines":[" "]},{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"insert","lines":[" "]},{"start":{"row":54,"column":3},"end":{"row":54,"column":4},"action":"insert","lines":[" "]}],[{"start":{"row":56,"column":8},"end":{"row":56,"column":12},"action":"remove","lines":["    "],"id":34},{"start":{"row":56,"column":4},"end":{"row":56,"column":8},"action":"remove","lines":["    "]},{"start":{"row":56,"column":0},"end":{"row":56,"column":4},"action":"remove","lines":["    "]},{"start":{"row":55,"column":12},"end":{"row":56,"column":0},"action":"remove","lines":["",""]},{"start":{"row":55,"column":8},"end":{"row":55,"column":12},"action":"remove","lines":["    "]},{"start":{"row":55,"column":4},"end":{"row":55,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":56,"column":8},"end":{"row":56,"column":12},"action":"remove","lines":["    "],"id":35},{"start":{"row":56,"column":4},"end":{"row":56,"column":8},"action":"remove","lines":["    "]}],[{"start":{"row":49,"column":20},"end":{"row":49,"column":21},"action":"remove","lines":["t"],"id":36},{"start":{"row":49,"column":19},"end":{"row":49,"column":20},"action":"remove","lines":["x"]},{"start":{"row":49,"column":18},"end":{"row":49,"column":19},"action":"remove","lines":["e"]},{"start":{"row":49,"column":17},"end":{"row":49,"column":18},"action":"remove","lines":["t"]}],[{"start":{"row":49,"column":17},"end":{"row":49,"column":18},"action":"insert","lines":["h"],"id":37},{"start":{"row":49,"column":18},"end":{"row":49,"column":19},"action":"insert","lines":["i"]},{"start":{"row":49,"column":19},"end":{"row":49,"column":20},"action":"insert","lines":["d"]},{"start":{"row":49,"column":20},"end":{"row":49,"column":21},"action":"insert","lines":["d"]}],[{"start":{"row":49,"column":21},"end":{"row":49,"column":22},"action":"insert","lines":["e"],"id":38},{"start":{"row":49,"column":22},"end":{"row":49,"column":23},"action":"insert","lines":["n"]}],[{"start":{"row":50,"column":20},"end":{"row":50,"column":21},"action":"remove","lines":["t"],"id":39},{"start":{"row":50,"column":19},"end":{"row":50,"column":20},"action":"remove","lines":["x"]},{"start":{"row":50,"column":18},"end":{"row":50,"column":19},"action":"remove","lines":["e"]},{"start":{"row":50,"column":17},"end":{"row":50,"column":18},"action":"remove","lines":["t"]}],[{"start":{"row":50,"column":17},"end":{"row":50,"column":18},"action":"insert","lines":["h"],"id":40},{"start":{"row":50,"column":18},"end":{"row":50,"column":19},"action":"insert","lines":["e"]}],[{"start":{"row":50,"column":18},"end":{"row":50,"column":19},"action":"remove","lines":["e"],"id":41}],[{"start":{"row":50,"column":18},"end":{"row":50,"column":19},"action":"insert","lines":["i"],"id":42},{"start":{"row":50,"column":19},"end":{"row":50,"column":20},"action":"insert","lines":["d"]},{"start":{"row":50,"column":20},"end":{"row":50,"column":21},"action":"insert","lines":["d"]},{"start":{"row":50,"column":21},"end":{"row":50,"column":22},"action":"insert","lines":["e"]},{"start":{"row":50,"column":22},"end":{"row":50,"column":23},"action":"insert","lines":["n"]}],[{"start":{"row":51,"column":20},"end":{"row":51,"column":21},"action":"remove","lines":["t"],"id":43},{"start":{"row":51,"column":19},"end":{"row":51,"column":20},"action":"remove","lines":["x"]},{"start":{"row":51,"column":18},"end":{"row":51,"column":19},"action":"remove","lines":["e"]},{"start":{"row":51,"column":17},"end":{"row":51,"column":18},"action":"remove","lines":["t"]}],[{"start":{"row":51,"column":17},"end":{"row":51,"column":18},"action":"insert","lines":["h"],"id":44},{"start":{"row":51,"column":18},"end":{"row":51,"column":19},"action":"insert","lines":["i"]},{"start":{"row":51,"column":19},"end":{"row":51,"column":20},"action":"insert","lines":["d"]},{"start":{"row":51,"column":20},"end":{"row":51,"column":21},"action":"insert","lines":["d"]},{"start":{"row":51,"column":21},"end":{"row":51,"column":22},"action":"insert","lines":["e"]}],[{"start":{"row":51,"column":22},"end":{"row":51,"column":23},"action":"insert","lines":["n"],"id":45}],[{"start":{"row":52,"column":20},"end":{"row":52,"column":21},"action":"remove","lines":["t"],"id":46},{"start":{"row":52,"column":19},"end":{"row":52,"column":20},"action":"remove","lines":["x"]},{"start":{"row":52,"column":18},"end":{"row":52,"column":19},"action":"remove","lines":["e"]},{"start":{"row":52,"column":17},"end":{"row":52,"column":18},"action":"remove","lines":["t"]}],[{"start":{"row":52,"column":17},"end":{"row":52,"column":18},"action":"insert","lines":["h"],"id":47},{"start":{"row":52,"column":18},"end":{"row":52,"column":19},"action":"insert","lines":["i"]},{"start":{"row":52,"column":19},"end":{"row":52,"column":20},"action":"insert","lines":["d"]}],[{"start":{"row":52,"column":20},"end":{"row":52,"column":21},"action":"insert","lines":["d"],"id":48},{"start":{"row":52,"column":21},"end":{"row":52,"column":22},"action":"insert","lines":["e"]},{"start":{"row":52,"column":22},"end":{"row":52,"column":23},"action":"insert","lines":["n"]}],[{"start":{"row":53,"column":20},"end":{"row":53,"column":21},"action":"remove","lines":["e"],"id":49},{"start":{"row":53,"column":19},"end":{"row":53,"column":20},"action":"remove","lines":["t"]},{"start":{"row":53,"column":18},"end":{"row":53,"column":19},"action":"remove","lines":["a"]},{"start":{"row":53,"column":17},"end":{"row":53,"column":18},"action":"remove","lines":["d"]}],[{"start":{"row":53,"column":17},"end":{"row":53,"column":18},"action":"insert","lines":["h"],"id":50},{"start":{"row":53,"column":18},"end":{"row":53,"column":19},"action":"insert","lines":["i"]},{"start":{"row":53,"column":19},"end":{"row":53,"column":20},"action":"insert","lines":["d"]},{"start":{"row":53,"column":20},"end":{"row":53,"column":21},"action":"insert","lines":["d"]},{"start":{"row":53,"column":21},"end":{"row":53,"column":22},"action":"insert","lines":["e"]}],[{"start":{"row":53,"column":22},"end":{"row":53,"column":23},"action":"insert","lines":["n"],"id":51}],[{"start":{"row":54,"column":23},"end":{"row":54,"column":24},"action":"remove","lines":["s"],"id":52},{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"remove","lines":["k"]},{"start":{"row":54,"column":21},"end":{"row":54,"column":22},"action":"remove","lines":["r"]},{"start":{"row":54,"column":20},"end":{"row":54,"column":21},"action":"remove","lines":["a"]},{"start":{"row":54,"column":19},"end":{"row":54,"column":20},"action":"remove","lines":["m"]}],[{"start":{"row":54,"column":18},"end":{"row":54,"column":19},"action":"remove","lines":["e"],"id":53}],[{"start":{"row":54,"column":17},"end":{"row":54,"column":18},"action":"remove","lines":["r"],"id":54}],[{"start":{"row":54,"column":17},"end":{"row":54,"column":18},"action":"insert","lines":["h"],"id":55},{"start":{"row":54,"column":18},"end":{"row":54,"column":19},"action":"insert","lines":["i"]},{"start":{"row":54,"column":19},"end":{"row":54,"column":20},"action":"insert","lines":["d"]},{"start":{"row":54,"column":20},"end":{"row":54,"column":21},"action":"insert","lines":["d"]},{"start":{"row":54,"column":21},"end":{"row":54,"column":22},"action":"insert","lines":["e"]},{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"insert","lines":["m"]}],[{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"remove","lines":["m"],"id":56}],[{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"insert","lines":["n"],"id":57}],[{"start":{"row":45,"column":15},"end":{"row":46,"column":0},"action":"insert","lines":["",""],"id":58},{"start":{"row":46,"column":0},"end":{"row":46,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":46,"column":4},"end":{"row":46,"column":5},"action":"insert","lines":["<"],"id":59}],[{"start":{"row":46,"column":5},"end":{"row":46,"column":6},"action":"insert","lines":["?"],"id":60}],[{"start":{"row":46,"column":5},"end":{"row":46,"column":6},"action":"remove","lines":["?"],"id":61},{"start":{"row":46,"column":4},"end":{"row":46,"column":5},"action":"remove","lines":["<"]}],[{"start":{"row":46,"column":4},"end":{"row":46,"column":32},"action":"insert","lines":["<?php print $hurugi_code; ?>"],"id":62}],[{"start":{"row":46,"column":32},"end":{"row":46,"column":33},"action":"insert","lines":["<"],"id":63},{"start":{"row":46,"column":33},"end":{"row":46,"column":34},"action":"insert","lines":["p"]}],[{"start":{"row":46,"column":34},"end":{"row":46,"column":39},"action":"insert","lines":["></p>"],"id":64}],[{"start":{"row":46,"column":32},"end":{"row":47,"column":0},"action":"insert","lines":["",""],"id":65},{"start":{"row":47,"column":0},"end":{"row":47,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":46,"column":32},"end":{"row":46,"column":33},"action":"insert","lines":["<"],"id":66},{"start":{"row":46,"column":33},"end":{"row":46,"column":34},"action":"insert","lines":["b"]},{"start":{"row":46,"column":34},"end":{"row":46,"column":35},"action":"insert","lines":["r"]}],[{"start":{"row":46,"column":35},"end":{"row":46,"column":36},"action":"insert","lines":[" "],"id":67},{"start":{"row":46,"column":36},"end":{"row":46,"column":37},"action":"insert","lines":["/"]},{"start":{"row":46,"column":37},"end":{"row":46,"column":38},"action":"insert","lines":[">"]}],[{"start":{"row":47,"column":7},"end":{"row":47,"column":8},"action":"insert","lines":["を"],"id":68}],[{"start":{"row":47,"column":8},"end":{"row":47,"column":13},"action":"insert","lines":["消去しても"],"id":69}],[{"start":{"row":47,"column":13},"end":{"row":47,"column":17},"action":"insert","lines":["よろしい"],"id":70}],[{"start":{"row":47,"column":17},"end":{"row":47,"column":20},"action":"insert","lines":["ですか"],"id":71}],[{"start":{"row":47,"column":20},"end":{"row":47,"column":21},"action":"insert","lines":["？"],"id":72}],[{"start":{"row":14,"column":18},"end":{"row":14,"column":19},"action":"insert","lines":["_"],"id":73}],[{"start":{"row":46,"column":27},"end":{"row":46,"column":28},"action":"remove","lines":["e"],"id":74},{"start":{"row":46,"column":26},"end":{"row":46,"column":27},"action":"remove","lines":["d"]},{"start":{"row":46,"column":25},"end":{"row":46,"column":26},"action":"remove","lines":["o"]},{"start":{"row":46,"column":24},"end":{"row":46,"column":25},"action":"remove","lines":["c"]}],[{"start":{"row":46,"column":24},"end":{"row":46,"column":25},"action":"insert","lines":["n"],"id":75},{"start":{"row":46,"column":25},"end":{"row":46,"column":26},"action":"insert","lines":["a"]},{"start":{"row":46,"column":26},"end":{"row":46,"column":27},"action":"insert","lines":["m"]},{"start":{"row":46,"column":27},"end":{"row":46,"column":28},"action":"insert","lines":["e"]}],[{"start":{"row":56,"column":25},"end":{"row":56,"column":64},"action":"remove","lines":["rows=\"5\" cols=\"30\" style=\"resize:none\" "],"id":76}],[{"start":{"row":57,"column":61},"end":{"row":58,"column":0},"action":"insert","lines":["",""],"id":77},{"start":{"row":58,"column":0},"end":{"row":58,"column":4},"action":"insert","lines":["    "]},{"start":{"row":58,"column":4},"end":{"row":58,"column":5},"action":"insert","lines":["<"]},{"start":{"row":58,"column":5},"end":{"row":58,"column":6},"action":"insert","lines":["b"]},{"start":{"row":58,"column":6},"end":{"row":58,"column":7},"action":"insert","lines":["r"]}],[{"start":{"row":58,"column":7},"end":{"row":58,"column":8},"action":"insert","lines":[" "],"id":78},{"start":{"row":58,"column":8},"end":{"row":58,"column":9},"action":"insert","lines":["/"]},{"start":{"row":58,"column":9},"end":{"row":58,"column":10},"action":"insert","lines":[">"]}],[{"start":{"row":56,"column":65},"end":{"row":57,"column":0},"action":"insert","lines":["",""],"id":79},{"start":{"row":57,"column":0},"end":{"row":57,"column":4},"action":"insert","lines":["    "]},{"start":{"row":57,"column":4},"end":{"row":57,"column":5},"action":"insert","lines":["<"]}],[{"start":{"row":57,"column":5},"end":{"row":57,"column":6},"action":"insert","lines":["b"],"id":80},{"start":{"row":57,"column":6},"end":{"row":57,"column":7},"action":"insert","lines":["r"]}],[{"start":{"row":57,"column":7},"end":{"row":57,"column":8},"action":"insert","lines":[" "],"id":81},{"start":{"row":57,"column":8},"end":{"row":57,"column":9},"action":"insert","lines":["/"]},{"start":{"row":57,"column":9},"end":{"row":57,"column":10},"action":"insert","lines":[">"]}],[{"start":{"row":56,"column":25},"end":{"row":56,"column":26},"action":"insert","lines":["n"],"id":82},{"start":{"row":56,"column":26},"end":{"row":56,"column":27},"action":"insert","lines":["a"]},{"start":{"row":56,"column":27},"end":{"row":56,"column":28},"action":"insert","lines":["m"]},{"start":{"row":56,"column":28},"end":{"row":56,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":56,"column":29},"end":{"row":56,"column":30},"action":"insert","lines":["="],"id":83},{"start":{"row":56,"column":30},"end":{"row":56,"column":31},"action":"insert","lines":["\""]},{"start":{"row":56,"column":31},"end":{"row":56,"column":32},"action":"insert","lines":["\""]}],[{"start":{"row":56,"column":32},"end":{"row":56,"column":33},"action":"insert","lines":[" "],"id":84}],[{"start":{"row":56,"column":31},"end":{"row":56,"column":32},"action":"insert","lines":["r"],"id":85},{"start":{"row":56,"column":32},"end":{"row":56,"column":33},"action":"insert","lines":["e"]},{"start":{"row":56,"column":33},"end":{"row":56,"column":34},"action":"insert","lines":["m"]},{"start":{"row":56,"column":34},"end":{"row":56,"column":35},"action":"insert","lines":["a"]},{"start":{"row":56,"column":35},"end":{"row":56,"column":36},"action":"insert","lines":["r"]}],[{"start":{"row":56,"column":36},"end":{"row":56,"column":37},"action":"insert","lines":["k"],"id":86},{"start":{"row":56,"column":37},"end":{"row":56,"column":38},"action":"insert","lines":["s"]}],[{"start":{"row":51,"column":45},"end":{"row":51,"column":46},"action":"remove","lines":[" "],"id":87},{"start":{"row":51,"column":44},"end":{"row":51,"column":45},"action":"remove","lines":["d"]},{"start":{"row":51,"column":43},"end":{"row":51,"column":44},"action":"remove","lines":["e"]},{"start":{"row":51,"column":42},"end":{"row":51,"column":43},"action":"remove","lines":["r"]},{"start":{"row":51,"column":41},"end":{"row":51,"column":42},"action":"remove","lines":["i"]},{"start":{"row":51,"column":40},"end":{"row":51,"column":41},"action":"remove","lines":["u"]},{"start":{"row":51,"column":39},"end":{"row":51,"column":40},"action":"remove","lines":["q"]},{"start":{"row":51,"column":38},"end":{"row":51,"column":39},"action":"remove","lines":["e"]},{"start":{"row":51,"column":37},"end":{"row":51,"column":38},"action":"remove","lines":["r"]}],[{"start":{"row":54,"column":45},"end":{"row":54,"column":46},"action":"remove","lines":[" "],"id":88},{"start":{"row":54,"column":44},"end":{"row":54,"column":45},"action":"remove","lines":["d"]},{"start":{"row":54,"column":43},"end":{"row":54,"column":44},"action":"remove","lines":["e"]},{"start":{"row":54,"column":42},"end":{"row":54,"column":43},"action":"remove","lines":["r"]},{"start":{"row":54,"column":41},"end":{"row":54,"column":42},"action":"remove","lines":["i"]},{"start":{"row":54,"column":40},"end":{"row":54,"column":41},"action":"remove","lines":["u"]},{"start":{"row":54,"column":39},"end":{"row":54,"column":40},"action":"remove","lines":["q"]},{"start":{"row":54,"column":38},"end":{"row":54,"column":39},"action":"remove","lines":["e"]},{"start":{"row":54,"column":37},"end":{"row":54,"column":38},"action":"remove","lines":["r"]}],[{"start":{"row":55,"column":45},"end":{"row":55,"column":46},"action":"remove","lines":[" "],"id":89},{"start":{"row":55,"column":44},"end":{"row":55,"column":45},"action":"remove","lines":["d"]},{"start":{"row":55,"column":43},"end":{"row":55,"column":44},"action":"remove","lines":["e"]},{"start":{"row":55,"column":42},"end":{"row":55,"column":43},"action":"remove","lines":["r"]},{"start":{"row":55,"column":41},"end":{"row":55,"column":42},"action":"remove","lines":["i"]},{"start":{"row":55,"column":40},"end":{"row":55,"column":41},"action":"remove","lines":["u"]},{"start":{"row":55,"column":39},"end":{"row":55,"column":40},"action":"remove","lines":["q"]},{"start":{"row":55,"column":38},"end":{"row":55,"column":39},"action":"remove","lines":["e"]},{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"remove","lines":["r"]}],[{"start":{"row":52,"column":82},"end":{"row":52,"column":83},"action":"remove","lines":["円"],"id":90}],[{"start":{"row":53,"column":74},"end":{"row":53,"column":75},"action":"remove","lines":["円"],"id":91}],[{"start":{"row":56,"column":14},"end":{"row":56,"column":15},"action":"remove","lines":["e"],"id":92},{"start":{"row":56,"column":13},"end":{"row":56,"column":14},"action":"remove","lines":["m"]},{"start":{"row":56,"column":12},"end":{"row":56,"column":13},"action":"remove","lines":["a"]},{"start":{"row":56,"column":11},"end":{"row":56,"column":12},"action":"remove","lines":["n"]}],[{"start":{"row":56,"column":11},"end":{"row":56,"column":12},"action":"insert","lines":["t"],"id":93},{"start":{"row":56,"column":12},"end":{"row":56,"column":13},"action":"insert","lines":["y"]},{"start":{"row":56,"column":13},"end":{"row":56,"column":14},"action":"insert","lines":["o"]},{"start":{"row":56,"column":14},"end":{"row":56,"column":15},"action":"insert","lines":["p"]},{"start":{"row":56,"column":15},"end":{"row":56,"column":16},"action":"insert","lines":["e"]}],[{"start":{"row":56,"column":13},"end":{"row":56,"column":14},"action":"remove","lines":["o"],"id":94}],[{"start":{"row":59,"column":9},"end":{"row":59,"column":10},"action":"remove","lines":[">"],"id":95},{"start":{"row":59,"column":8},"end":{"row":59,"column":9},"action":"remove","lines":["/"]},{"start":{"row":59,"column":7},"end":{"row":59,"column":8},"action":"remove","lines":[" "]},{"start":{"row":59,"column":6},"end":{"row":59,"column":7},"action":"remove","lines":["r"]},{"start":{"row":59,"column":5},"end":{"row":59,"column":6},"action":"remove","lines":["b"]},{"start":{"row":59,"column":4},"end":{"row":59,"column":5},"action":"remove","lines":["<"]},{"start":{"row":59,"column":0},"end":{"row":59,"column":4},"action":"remove","lines":["    "]},{"start":{"row":58,"column":61},"end":{"row":59,"column":0},"action":"remove","lines":["",""]}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":8},"end":{"row":11,"column":8},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1593687570767,"hash":"9e2ea95221fb0b3b495773261df009a7a28f7c27"}