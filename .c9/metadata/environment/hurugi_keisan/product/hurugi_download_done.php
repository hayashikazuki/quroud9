{"filter":false,"title":"hurugi_download_done.php","tooltip":"/hurugi_keisan/product/hurugi_download_done.php","undoManager":{"mark":3,"position":3,"stack":[[{"start":{"row":23,"column":101},"end":{"row":24,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":24,"column":0},"end":{"row":24,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":17,"column":4},"end":{"row":28,"column":26},"action":"remove","lines":["$dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'SELECT namecode,name,stocking,expext,sale,shop,date,saledate,remarks FROM hurugi_product ","    WHERE substr(date,1,4)=? AND substr(date,6,2)=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $year;","    $data[] = $month;","    $stmt->execute($data);"],"id":3}],[{"start":{"row":17,"column":4},"end":{"row":31,"column":4},"action":"insert","lines":["$dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';","    $user='root';","    $password='';","    $dbh = new PDO($dsn,$user,$password);","    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);","    ","    $sql = 'SELECT namecode,name,stocking,expect,sale,shop,date,saledate,remarks FROM hurugi_product ","    WHERE substr(date,1,4)=? AND substr(date,6,2)=?';","    $stmt = $dbh->prepare($sql);","    $data[] = $year;","    $data[] = $month;","    $stmt->execute($data);","    ","    $dbh = null;","    "],"id":4}],[{"start":{"row":30,"column":4},"end":{"row":32,"column":4},"action":"remove","lines":["$dbh = null;","    ","    "],"id":5},{"start":{"row":30,"column":0},"end":{"row":30,"column":4},"action":"remove","lines":["    "]},{"start":{"row":29,"column":4},"end":{"row":30,"column":0},"action":"remove","lines":["",""]}]]},"ace":{"folds":[],"scrolltop":133.5,"scrollleft":0,"selection":{"start":{"row":27,"column":21},"end":{"row":27,"column":21},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":7,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1594539559572,"hash":"4006b3c52cf689e6201167153b6f963368cda1ad"}