{"filter":false,"title":"king_info_delete_done.php","tooltip":"/king HP/info/king_info_delete_done.php","ace":{"folds":[],"scrolltop":582,"scrollleft":0,"selection":{"start":{"row":56,"column":55},"end":{"row":56,"column":55},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":77,"state":"start","mode":"ace/mode/php"}},"hash":"ebb8ee8f9e8e25577b62b0cb3f564bcb45b1cff2","undoManager":{"mark":31,"position":31,"stack":[[{"start":{"row":20,"column":8},"end":{"row":20,"column":35},"action":"remove","lines":["<title>CONTACT管理ページ</title>"],"id":26}],[{"start":{"row":20,"column":8},"end":{"row":24,"column":164},"action":"insert","lines":["<meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">","        <title>CONTACT管理ページ</title>","        <link rel=\"stylesheet\" href=\"king_many_info.css\"/>","        <link href=\"https://use.fontawesome.com/releases/v5.6.1/css/all.css\" rel=\"stylesheet\">","        <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css\" type=\"text/css\" media=\"all\" />"],"id":27}],[{"start":{"row":30,"column":3},"end":{"row":54,"column":5},"action":"remove","lines":[" try","    {","    ","    $king_code = $_POST['code'];","    ","    $dsn='mysql:dbname=king_hp_contact;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'DELETE FROM king_info WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $king_code;","    $stmt->execute($data); ","    ","    $dbh = null;","    ","    ","    }","    catch (Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }"],"id":28}],[{"start":{"row":14,"column":1},"end":{"row":15,"column":0},"action":"insert","lines":["",""],"id":29},{"start":{"row":15,"column":0},"end":{"row":16,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":16,"column":0},"end":{"row":40,"column":5},"action":"insert","lines":[" try","    {","    ","    $king_code = $_POST['code'];","    ","    $dsn='mysql:dbname=king_hp_contact;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'DELETE FROM king_info WHERE code=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $king_code;","    $stmt->execute($data); ","    ","    $dbh = null;","    ","    ","    }","    catch (Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }"],"id":30}],[{"start":{"row":54,"column":4},"end":{"row":59,"column":4},"action":"remove","lines":["<?php   ","    ","   ","    ","    ?>","    "],"id":31},{"start":{"row":54,"column":0},"end":{"row":54,"column":4},"action":"remove","lines":["    "]},{"start":{"row":53,"column":4},"end":{"row":54,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":54,"column":16},"end":{"row":54,"column":17},"action":"remove","lines":[">"],"id":32},{"start":{"row":54,"column":15},"end":{"row":54,"column":16},"action":"remove","lines":["/"]},{"start":{"row":54,"column":14},"end":{"row":54,"column":15},"action":"remove","lines":[" "]},{"start":{"row":54,"column":13},"end":{"row":54,"column":14},"action":"remove","lines":["r"]},{"start":{"row":54,"column":12},"end":{"row":54,"column":13},"action":"remove","lines":["b"]},{"start":{"row":54,"column":11},"end":{"row":54,"column":12},"action":"remove","lines":["<"]}],[{"start":{"row":55,"column":9},"end":{"row":55,"column":10},"action":"remove","lines":[">"],"id":33},{"start":{"row":55,"column":8},"end":{"row":55,"column":9},"action":"remove","lines":["/"]},{"start":{"row":55,"column":7},"end":{"row":55,"column":8},"action":"remove","lines":[" "]},{"start":{"row":55,"column":6},"end":{"row":55,"column":7},"action":"remove","lines":["r"]},{"start":{"row":55,"column":5},"end":{"row":55,"column":6},"action":"remove","lines":["b"]},{"start":{"row":55,"column":4},"end":{"row":55,"column":5},"action":"remove","lines":["<"]}],[{"start":{"row":54,"column":4},"end":{"row":54,"column":11},"action":"remove","lines":["削除しました。"],"id":34}],[{"start":{"row":54,"column":4},"end":{"row":58,"column":18},"action":"insert","lines":["<section class=\"done\">","            <p><?php print $staff_name; ?>さんを</p>","            <p>追加しました。</p>","            <a href =\"staff_list.php\">戻る</a>","        </section>"],"id":35}],[{"start":{"row":57,"column":26},"end":{"row":57,"column":27},"action":"remove","lines":["f"],"id":36},{"start":{"row":57,"column":25},"end":{"row":57,"column":26},"action":"remove","lines":["f"]},{"start":{"row":57,"column":24},"end":{"row":57,"column":25},"action":"remove","lines":["a"]},{"start":{"row":57,"column":23},"end":{"row":57,"column":24},"action":"remove","lines":["t"]},{"start":{"row":57,"column":22},"end":{"row":57,"column":23},"action":"remove","lines":["s"]}],[{"start":{"row":57,"column":22},"end":{"row":57,"column":23},"action":"insert","lines":["k"],"id":37},{"start":{"row":57,"column":23},"end":{"row":57,"column":24},"action":"insert","lines":["i"]},{"start":{"row":57,"column":24},"end":{"row":57,"column":25},"action":"insert","lines":["n"]},{"start":{"row":57,"column":25},"end":{"row":57,"column":26},"action":"insert","lines":["g"]}],[{"start":{"row":57,"column":26},"end":{"row":57,"column":27},"action":"insert","lines":["_"],"id":38},{"start":{"row":57,"column":27},"end":{"row":57,"column":28},"action":"insert","lines":["i"]},{"start":{"row":57,"column":28},"end":{"row":57,"column":29},"action":"insert","lines":["n"]},{"start":{"row":57,"column":29},"end":{"row":57,"column":30},"action":"insert","lines":["f"]},{"start":{"row":57,"column":30},"end":{"row":57,"column":31},"action":"insert","lines":["o"]}],[{"start":{"row":60,"column":0},"end":{"row":60,"column":40},"action":"remove","lines":["    <a href =\"king_info_list.php\">戻る</a>"],"id":39},{"start":{"row":59,"column":4},"end":{"row":60,"column":0},"action":"remove","lines":["",""]},{"start":{"row":59,"column":0},"end":{"row":59,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":58,"column":4},"end":{"row":58,"column":8},"action":"remove","lines":["    "],"id":40}],[{"start":{"row":58,"column":4},"end":{"row":58,"column":5},"action":"insert","lines":[" "],"id":41},{"start":{"row":58,"column":5},"end":{"row":58,"column":6},"action":"insert","lines":[" "]},{"start":{"row":58,"column":6},"end":{"row":58,"column":7},"action":"insert","lines":[" "]},{"start":{"row":58,"column":7},"end":{"row":58,"column":8},"action":"insert","lines":[" "]}],[{"start":{"row":54,"column":4},"end":{"row":54,"column":5},"action":"insert","lines":[" "],"id":42},{"start":{"row":54,"column":5},"end":{"row":54,"column":6},"action":"insert","lines":[" "]},{"start":{"row":54,"column":6},"end":{"row":54,"column":7},"action":"insert","lines":[" "]},{"start":{"row":54,"column":7},"end":{"row":54,"column":8},"action":"insert","lines":[" "]}],[{"start":{"row":55,"column":32},"end":{"row":55,"column":33},"action":"remove","lines":["f"],"id":43},{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"remove","lines":["f"]},{"start":{"row":55,"column":30},"end":{"row":55,"column":31},"action":"remove","lines":["a"]},{"start":{"row":55,"column":29},"end":{"row":55,"column":30},"action":"remove","lines":["t"]},{"start":{"row":55,"column":28},"end":{"row":55,"column":29},"action":"remove","lines":["s"]}],[{"start":{"row":19,"column":32},"end":{"row":20,"column":0},"action":"insert","lines":["",""],"id":44},{"start":{"row":20,"column":0},"end":{"row":20,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":20,"column":4},"end":{"row":20,"column":32},"action":"insert","lines":["$king_code = $_POST['code'];"],"id":45}],[{"start":{"row":20,"column":13},"end":{"row":20,"column":14},"action":"remove","lines":["e"],"id":46},{"start":{"row":20,"column":12},"end":{"row":20,"column":13},"action":"remove","lines":["d"]},{"start":{"row":20,"column":11},"end":{"row":20,"column":12},"action":"remove","lines":["o"]},{"start":{"row":20,"column":10},"end":{"row":20,"column":11},"action":"remove","lines":["c"]}],[{"start":{"row":20,"column":10},"end":{"row":20,"column":11},"action":"insert","lines":["n"],"id":47},{"start":{"row":20,"column":11},"end":{"row":20,"column":12},"action":"insert","lines":["a"]},{"start":{"row":20,"column":12},"end":{"row":20,"column":13},"action":"insert","lines":["m"]},{"start":{"row":20,"column":13},"end":{"row":20,"column":14},"action":"insert","lines":["e"]}],[{"start":{"row":20,"column":28},"end":{"row":20,"column":29},"action":"remove","lines":["e"],"id":48},{"start":{"row":20,"column":27},"end":{"row":20,"column":28},"action":"remove","lines":["d"]},{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"remove","lines":["o"]},{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"remove","lines":["c"]}],[{"start":{"row":20,"column":25},"end":{"row":20,"column":26},"action":"insert","lines":["n"],"id":49},{"start":{"row":20,"column":26},"end":{"row":20,"column":27},"action":"insert","lines":["a"]},{"start":{"row":20,"column":27},"end":{"row":20,"column":28},"action":"insert","lines":["m"]},{"start":{"row":20,"column":28},"end":{"row":20,"column":29},"action":"insert","lines":["e"]}],[{"start":{"row":56,"column":28},"end":{"row":56,"column":29},"action":"insert","lines":["k"],"id":50},{"start":{"row":56,"column":29},"end":{"row":56,"column":30},"action":"insert","lines":["i"]},{"start":{"row":56,"column":30},"end":{"row":56,"column":31},"action":"insert","lines":["n"]},{"start":{"row":56,"column":31},"end":{"row":56,"column":32},"action":"insert","lines":["g"]}],[{"start":{"row":57,"column":20},"end":{"row":57,"column":21},"action":"remove","lines":["た"],"id":51},{"start":{"row":57,"column":19},"end":{"row":57,"column":20},"action":"remove","lines":["し"]},{"start":{"row":57,"column":18},"end":{"row":57,"column":19},"action":"remove","lines":["ま"]},{"start":{"row":57,"column":17},"end":{"row":57,"column":18},"action":"remove","lines":["し"]},{"start":{"row":57,"column":16},"end":{"row":57,"column":17},"action":"remove","lines":["加"]},{"start":{"row":57,"column":15},"end":{"row":57,"column":16},"action":"remove","lines":["追"]}],[{"start":{"row":57,"column":15},"end":{"row":57,"column":16},"action":"insert","lines":["s"],"id":52},{"start":{"row":57,"column":16},"end":{"row":57,"column":17},"action":"insert","lines":["a"]},{"start":{"row":57,"column":17},"end":{"row":57,"column":18},"action":"insert","lines":["k"]},{"start":{"row":57,"column":18},"end":{"row":57,"column":19},"action":"insert","lines":["u"]},{"start":{"row":57,"column":19},"end":{"row":57,"column":20},"action":"insert","lines":["j"]},{"start":{"row":57,"column":20},"end":{"row":57,"column":21},"action":"insert","lines":["o"]}],[{"start":{"row":57,"column":20},"end":{"row":57,"column":21},"action":"remove","lines":["o"],"id":53},{"start":{"row":57,"column":19},"end":{"row":57,"column":20},"action":"remove","lines":["j"]},{"start":{"row":57,"column":18},"end":{"row":57,"column":19},"action":"remove","lines":["u"]},{"start":{"row":57,"column":17},"end":{"row":57,"column":18},"action":"remove","lines":["k"]},{"start":{"row":57,"column":16},"end":{"row":57,"column":17},"action":"remove","lines":["a"]},{"start":{"row":57,"column":15},"end":{"row":57,"column":16},"action":"remove","lines":["s"]}],[{"start":{"row":57,"column":15},"end":{"row":57,"column":17},"action":"insert","lines":["削除"],"id":54}],[{"start":{"row":57,"column":17},"end":{"row":57,"column":21},"action":"insert","lines":["しました"],"id":55}],[{"start":{"row":56,"column":44},"end":{"row":56,"column":51},"action":"insert","lines":["削除しました。"],"id":56}],[{"start":{"row":57,"column":12},"end":{"row":57,"column":26},"action":"remove","lines":["<p>削除しました。</p>"],"id":57},{"start":{"row":57,"column":8},"end":{"row":57,"column":12},"action":"remove","lines":["    "]},{"start":{"row":57,"column":4},"end":{"row":57,"column":8},"action":"remove","lines":["    "]},{"start":{"row":57,"column":0},"end":{"row":57,"column":4},"action":"remove","lines":["    "]},{"start":{"row":56,"column":55},"end":{"row":57,"column":0},"action":"remove","lines":["",""]}]]},"timestamp":1593870858642}