{"filter":false,"title":"staff_edit_done.php","tooltip":"/shopping_hp/staff_edit_done.php","ace":{"folds":[],"scrolltop":202,"scrollleft":0,"selection":{"start":{"row":32,"column":4},"end":{"row":32,"column":4},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":9,"state":"php-start","mode":"ace/mode/php"}},"hash":"e775877c71094c88026ee633cd9d13f5bf262b10","undoManager":{"mark":50,"position":50,"stack":[[{"start":{"row":0,"column":0},"end":{"row":48,"column":7},"action":"insert","lines":["<!DOCTYPE html>","<html lang=\"ja\">","    <head>","        <meta charset=\"UTF-8\">","        <title>ろくまる農園</title>","    </head>","    <body>","    ","    <?php   ","    ","    try","    {","    ","    $staff_name = $_POST['name'];","    $staff_pass = $_POST['pass'];","    ","    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');","    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');","    ","    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'INSERT INTO mst_staff(name,password)VALUES(?,?)';","    $stmt = $dbh->prepare($sql);","    $data[] = $staff_name;","    $data[] = $staff_pass;","    $stmt->execute($data); // ←変数名が $date になっています、正しくは $data です。","    ","    $dbh = null;","    ","    print $staff_name;","    print 'さんを追加しました。<br />';","    ","    }","    catch (Exception $e)","    {","        print 'ただいま障害により大変ご迷惑をお掛けしております。';","        exit();","    }","    ","    ?>","    ","        <a href =\"staff_list.php\">戻る</a>","        ","    </body>","</html>"],"id":1}],[{"start":{"row":29,"column":63},"end":{"row":29,"column":64},"action":"remove","lines":["。"],"id":2},{"start":{"row":29,"column":62},"end":{"row":29,"column":63},"action":"remove","lines":["す"]},{"start":{"row":29,"column":61},"end":{"row":29,"column":62},"action":"remove","lines":["で"]},{"start":{"row":29,"column":60},"end":{"row":29,"column":61},"action":"remove","lines":[" "]},{"start":{"row":29,"column":59},"end":{"row":29,"column":60},"action":"remove","lines":["a"]},{"start":{"row":29,"column":58},"end":{"row":29,"column":59},"action":"remove","lines":["t"]},{"start":{"row":29,"column":57},"end":{"row":29,"column":58},"action":"remove","lines":["a"]},{"start":{"row":29,"column":56},"end":{"row":29,"column":57},"action":"remove","lines":["d"]},{"start":{"row":29,"column":55},"end":{"row":29,"column":56},"action":"remove","lines":["$"]},{"start":{"row":29,"column":54},"end":{"row":29,"column":55},"action":"remove","lines":[" "]},{"start":{"row":29,"column":53},"end":{"row":29,"column":54},"action":"remove","lines":["は"]},{"start":{"row":29,"column":52},"end":{"row":29,"column":53},"action":"remove","lines":["く"]},{"start":{"row":29,"column":51},"end":{"row":29,"column":52},"action":"remove","lines":["し"]},{"start":{"row":29,"column":50},"end":{"row":29,"column":51},"action":"remove","lines":["正"]},{"start":{"row":29,"column":49},"end":{"row":29,"column":50},"action":"remove","lines":["、"]},{"start":{"row":29,"column":48},"end":{"row":29,"column":49},"action":"remove","lines":["す"]},{"start":{"row":29,"column":47},"end":{"row":29,"column":48},"action":"remove","lines":["ま"]},{"start":{"row":29,"column":46},"end":{"row":29,"column":47},"action":"remove","lines":["い"]},{"start":{"row":29,"column":45},"end":{"row":29,"column":46},"action":"remove","lines":["て"]}],[{"start":{"row":29,"column":44},"end":{"row":29,"column":45},"action":"remove","lines":["っ"],"id":3},{"start":{"row":29,"column":43},"end":{"row":29,"column":44},"action":"remove","lines":["な"]},{"start":{"row":29,"column":42},"end":{"row":29,"column":43},"action":"remove","lines":["に"]},{"start":{"row":29,"column":41},"end":{"row":29,"column":42},"action":"remove","lines":[" "]},{"start":{"row":29,"column":40},"end":{"row":29,"column":41},"action":"remove","lines":["e"]},{"start":{"row":29,"column":39},"end":{"row":29,"column":40},"action":"remove","lines":["t"]},{"start":{"row":29,"column":38},"end":{"row":29,"column":39},"action":"remove","lines":["a"]},{"start":{"row":29,"column":37},"end":{"row":29,"column":38},"action":"remove","lines":["d"]},{"start":{"row":29,"column":36},"end":{"row":29,"column":37},"action":"remove","lines":["$"]},{"start":{"row":29,"column":35},"end":{"row":29,"column":36},"action":"remove","lines":[" "]},{"start":{"row":29,"column":34},"end":{"row":29,"column":35},"action":"remove","lines":["が"]},{"start":{"row":29,"column":33},"end":{"row":29,"column":34},"action":"remove","lines":["名"]},{"start":{"row":29,"column":32},"end":{"row":29,"column":33},"action":"remove","lines":["数"]},{"start":{"row":29,"column":31},"end":{"row":29,"column":32},"action":"remove","lines":["変"]},{"start":{"row":29,"column":30},"end":{"row":29,"column":31},"action":"remove","lines":["←"]}],[{"start":{"row":29,"column":29},"end":{"row":29,"column":30},"action":"remove","lines":[" "],"id":4},{"start":{"row":29,"column":28},"end":{"row":29,"column":29},"action":"remove","lines":["/"]},{"start":{"row":29,"column":27},"end":{"row":29,"column":28},"action":"remove","lines":["/"]}],[{"start":{"row":12,"column":4},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":5},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]},{"start":{"row":13,"column":4},"end":{"row":13,"column":5},"action":"insert","lines":["$"]}],[{"start":{"row":13,"column":5},"end":{"row":13,"column":6},"action":"insert","lines":["s"],"id":6},{"start":{"row":13,"column":6},"end":{"row":13,"column":7},"action":"insert","lines":["t"]},{"start":{"row":13,"column":7},"end":{"row":13,"column":8},"action":"insert","lines":["a"]},{"start":{"row":13,"column":8},"end":{"row":13,"column":9},"action":"insert","lines":["f"]},{"start":{"row":13,"column":9},"end":{"row":13,"column":10},"action":"insert","lines":["f"]}],[{"start":{"row":13,"column":10},"end":{"row":13,"column":11},"action":"insert","lines":["_"],"id":7},{"start":{"row":13,"column":11},"end":{"row":13,"column":12},"action":"insert","lines":["c"]},{"start":{"row":13,"column":12},"end":{"row":13,"column":13},"action":"insert","lines":["o"]},{"start":{"row":13,"column":13},"end":{"row":13,"column":14},"action":"insert","lines":["d"]},{"start":{"row":13,"column":14},"end":{"row":13,"column":15},"action":"insert","lines":["e"]}],[{"start":{"row":13,"column":15},"end":{"row":13,"column":16},"action":"insert","lines":[" "],"id":8},{"start":{"row":13,"column":16},"end":{"row":13,"column":17},"action":"insert","lines":["="]}],[{"start":{"row":13,"column":17},"end":{"row":13,"column":18},"action":"insert","lines":[" "],"id":9}],[{"start":{"row":13,"column":18},"end":{"row":13,"column":19},"action":"insert","lines":["$"],"id":10},{"start":{"row":13,"column":19},"end":{"row":13,"column":20},"action":"insert","lines":["_"]}],[{"start":{"row":13,"column":20},"end":{"row":13,"column":21},"action":"insert","lines":["P"],"id":11},{"start":{"row":13,"column":21},"end":{"row":13,"column":22},"action":"insert","lines":["O"]},{"start":{"row":13,"column":22},"end":{"row":13,"column":23},"action":"insert","lines":["S"]},{"start":{"row":13,"column":23},"end":{"row":13,"column":24},"action":"insert","lines":["T"]}],[{"start":{"row":13,"column":24},"end":{"row":13,"column":26},"action":"insert","lines":["[]"],"id":12}],[{"start":{"row":13,"column":25},"end":{"row":13,"column":27},"action":"insert","lines":["''"],"id":13}],[{"start":{"row":13,"column":26},"end":{"row":13,"column":27},"action":"insert","lines":["c"],"id":14},{"start":{"row":13,"column":27},"end":{"row":13,"column":28},"action":"insert","lines":["o"]},{"start":{"row":13,"column":28},"end":{"row":13,"column":29},"action":"insert","lines":["d"]},{"start":{"row":13,"column":29},"end":{"row":13,"column":30},"action":"insert","lines":["e"]}],[{"start":{"row":13,"column":32},"end":{"row":13,"column":33},"action":"insert","lines":[";"],"id":15}],[{"start":{"row":26,"column":12},"end":{"row":26,"column":54},"action":"remove","lines":["INSERT INTO mst_staff(name,password)VALUES"],"id":16}],[{"start":{"row":26,"column":16},"end":{"row":26,"column":17},"action":"remove","lines":[")"],"id":17},{"start":{"row":26,"column":15},"end":{"row":26,"column":16},"action":"remove","lines":["?"]},{"start":{"row":26,"column":14},"end":{"row":26,"column":15},"action":"remove","lines":[","]},{"start":{"row":26,"column":13},"end":{"row":26,"column":14},"action":"remove","lines":["?"]},{"start":{"row":26,"column":12},"end":{"row":26,"column":13},"action":"remove","lines":["("]}],[{"start":{"row":26,"column":12},"end":{"row":26,"column":13},"action":"insert","lines":["U"],"id":18},{"start":{"row":26,"column":13},"end":{"row":26,"column":14},"action":"insert","lines":["P"]},{"start":{"row":26,"column":14},"end":{"row":26,"column":15},"action":"insert","lines":["D"]},{"start":{"row":26,"column":15},"end":{"row":26,"column":16},"action":"insert","lines":["A"]}],[{"start":{"row":26,"column":16},"end":{"row":26,"column":17},"action":"insert","lines":["T"],"id":19},{"start":{"row":26,"column":17},"end":{"row":26,"column":18},"action":"insert","lines":["E"]}],[{"start":{"row":26,"column":18},"end":{"row":26,"column":19},"action":"insert","lines":[" "],"id":20},{"start":{"row":26,"column":19},"end":{"row":26,"column":20},"action":"insert","lines":["m"]},{"start":{"row":26,"column":20},"end":{"row":26,"column":21},"action":"insert","lines":["s"]},{"start":{"row":26,"column":21},"end":{"row":26,"column":22},"action":"insert","lines":["t"]}],[{"start":{"row":26,"column":22},"end":{"row":26,"column":23},"action":"insert","lines":["_"],"id":21},{"start":{"row":26,"column":23},"end":{"row":26,"column":24},"action":"insert","lines":["s"]},{"start":{"row":26,"column":24},"end":{"row":26,"column":25},"action":"insert","lines":["t"]},{"start":{"row":26,"column":25},"end":{"row":26,"column":26},"action":"insert","lines":["a"]},{"start":{"row":26,"column":26},"end":{"row":26,"column":27},"action":"insert","lines":["f"]},{"start":{"row":26,"column":27},"end":{"row":26,"column":28},"action":"insert","lines":["f"]}],[{"start":{"row":26,"column":28},"end":{"row":26,"column":29},"action":"insert","lines":[" "],"id":22},{"start":{"row":26,"column":29},"end":{"row":26,"column":30},"action":"insert","lines":["S"]},{"start":{"row":26,"column":30},"end":{"row":26,"column":31},"action":"insert","lines":["E"]},{"start":{"row":26,"column":31},"end":{"row":26,"column":32},"action":"insert","lines":["T"]}],[{"start":{"row":26,"column":32},"end":{"row":26,"column":33},"action":"insert","lines":[" "],"id":23},{"start":{"row":26,"column":33},"end":{"row":26,"column":34},"action":"insert","lines":["n"]},{"start":{"row":26,"column":34},"end":{"row":26,"column":35},"action":"insert","lines":["a"]},{"start":{"row":26,"column":35},"end":{"row":26,"column":36},"action":"insert","lines":["m"]},{"start":{"row":26,"column":36},"end":{"row":26,"column":37},"action":"insert","lines":["e"]}],[{"start":{"row":26,"column":37},"end":{"row":26,"column":38},"action":"insert","lines":["="],"id":24}],[{"start":{"row":26,"column":38},"end":{"row":26,"column":39},"action":"insert","lines":["?"],"id":25},{"start":{"row":26,"column":39},"end":{"row":26,"column":40},"action":"insert","lines":[","]}],[{"start":{"row":26,"column":40},"end":{"row":26,"column":41},"action":"insert","lines":["p"],"id":26},{"start":{"row":26,"column":41},"end":{"row":26,"column":42},"action":"insert","lines":["a"]},{"start":{"row":26,"column":42},"end":{"row":26,"column":43},"action":"insert","lines":["s"]},{"start":{"row":26,"column":43},"end":{"row":26,"column":44},"action":"insert","lines":["s"]},{"start":{"row":26,"column":44},"end":{"row":26,"column":45},"action":"insert","lines":["w"]},{"start":{"row":26,"column":45},"end":{"row":26,"column":46},"action":"insert","lines":["o"]}],[{"start":{"row":26,"column":46},"end":{"row":26,"column":47},"action":"insert","lines":["r"],"id":27},{"start":{"row":26,"column":47},"end":{"row":26,"column":48},"action":"insert","lines":["d"]},{"start":{"row":26,"column":48},"end":{"row":26,"column":49},"action":"insert","lines":["="]}],[{"start":{"row":26,"column":49},"end":{"row":26,"column":50},"action":"insert","lines":["?"],"id":28}],[{"start":{"row":26,"column":50},"end":{"row":26,"column":51},"action":"insert","lines":[" "],"id":29}],[{"start":{"row":26,"column":51},"end":{"row":26,"column":52},"action":"insert","lines":["W"],"id":30},{"start":{"row":26,"column":52},"end":{"row":26,"column":53},"action":"insert","lines":["H"]}],[{"start":{"row":26,"column":53},"end":{"row":26,"column":54},"action":"insert","lines":["E"],"id":31},{"start":{"row":26,"column":54},"end":{"row":26,"column":55},"action":"insert","lines":["R"]},{"start":{"row":26,"column":55},"end":{"row":26,"column":56},"action":"insert","lines":["E"]}],[{"start":{"row":26,"column":56},"end":{"row":26,"column":57},"action":"insert","lines":[" "],"id":32},{"start":{"row":26,"column":57},"end":{"row":26,"column":58},"action":"insert","lines":["c"]},{"start":{"row":26,"column":58},"end":{"row":26,"column":59},"action":"insert","lines":["o"]},{"start":{"row":26,"column":59},"end":{"row":26,"column":60},"action":"insert","lines":["d"]},{"start":{"row":26,"column":60},"end":{"row":26,"column":61},"action":"insert","lines":["d"]}],[{"start":{"row":26,"column":60},"end":{"row":26,"column":61},"action":"remove","lines":["d"],"id":33}],[{"start":{"row":26,"column":60},"end":{"row":26,"column":61},"action":"insert","lines":["e"],"id":34}],[{"start":{"row":26,"column":61},"end":{"row":26,"column":62},"action":"insert","lines":["="],"id":35}],[{"start":{"row":26,"column":62},"end":{"row":26,"column":63},"action":"insert","lines":["?"],"id":36}],[{"start":{"row":29,"column":26},"end":{"row":30,"column":0},"action":"insert","lines":["",""],"id":37},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":30,"column":4},"end":{"row":30,"column":26},"action":"insert","lines":["$data[] = $staff_pass;"],"id":38}],[{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"remove","lines":["s"],"id":39},{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"remove","lines":["s"]},{"start":{"row":30,"column":22},"end":{"row":30,"column":23},"action":"remove","lines":["a"]},{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"remove","lines":["p"]}],[{"start":{"row":30,"column":21},"end":{"row":30,"column":22},"action":"insert","lines":["c"],"id":40},{"start":{"row":30,"column":22},"end":{"row":30,"column":23},"action":"insert","lines":["o"]},{"start":{"row":30,"column":23},"end":{"row":30,"column":24},"action":"insert","lines":["d"]},{"start":{"row":30,"column":24},"end":{"row":30,"column":25},"action":"insert","lines":["e"]}],[{"start":{"row":35,"column":4},"end":{"row":36,"column":29},"action":"remove","lines":["print $staff_name;","    print 'さんを追加しました。<br />';"],"id":41},{"start":{"row":35,"column":0},"end":{"row":35,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":36,"column":0},"end":{"row":36,"column":4},"action":"remove","lines":["    "],"id":42},{"start":{"row":35,"column":0},"end":{"row":36,"column":0},"action":"remove","lines":["",""]},{"start":{"row":34,"column":4},"end":{"row":35,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":44,"column":4},"end":{"row":44,"column":8},"action":"remove","lines":["    "],"id":43}],[{"start":{"row":43,"column":4},"end":{"row":44,"column":0},"action":"insert","lines":["",""],"id":44},{"start":{"row":44,"column":0},"end":{"row":44,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":44,"column":4},"end":{"row":44,"column":10},"action":"insert","lines":["修正しました"],"id":45},{"start":{"row":44,"column":10},"end":{"row":44,"column":11},"action":"insert","lines":["。"]}],[{"start":{"row":44,"column":11},"end":{"row":44,"column":12},"action":"insert","lines":["<"],"id":46},{"start":{"row":44,"column":12},"end":{"row":44,"column":13},"action":"insert","lines":["b"]},{"start":{"row":44,"column":13},"end":{"row":44,"column":14},"action":"insert","lines":["r"]}],[{"start":{"row":44,"column":14},"end":{"row":44,"column":15},"action":"insert","lines":[" "],"id":47},{"start":{"row":44,"column":15},"end":{"row":44,"column":16},"action":"insert","lines":["/"]},{"start":{"row":44,"column":16},"end":{"row":44,"column":17},"action":"insert","lines":[">"]}],[{"start":{"row":44,"column":17},"end":{"row":45,"column":0},"action":"insert","lines":["",""],"id":48},{"start":{"row":45,"column":0},"end":{"row":45,"column":4},"action":"insert","lines":["    "]},{"start":{"row":45,"column":4},"end":{"row":45,"column":5},"action":"insert","lines":["<"]}],[{"start":{"row":45,"column":5},"end":{"row":45,"column":6},"action":"insert","lines":["b"],"id":49}],[{"start":{"row":45,"column":6},"end":{"row":45,"column":7},"action":"insert","lines":["r"],"id":50}],[{"start":{"row":45,"column":7},"end":{"row":45,"column":8},"action":"insert","lines":[" "],"id":51},{"start":{"row":45,"column":8},"end":{"row":45,"column":9},"action":"insert","lines":["/"]},{"start":{"row":45,"column":9},"end":{"row":45,"column":10},"action":"insert","lines":[">"]}]]},"timestamp":1592626426184}