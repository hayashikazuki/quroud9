{"filter":false,"title":"pro_edit_done.php","tooltip":"/shopping_hp/product/pro_edit_done.php","undoManager":{"mark":14,"position":14,"stack":[[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":15,"column":2},"action":"insert","lines":["<?php","session_start();","session_regenerate_id(true);","if(isset($_SESSION['login'])==false)","{","    print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();","}","else","{","    print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';","}","?>"],"id":3}],[{"start":{"row":28,"column":4},"end":{"row":29,"column":0},"action":"insert","lines":["",""],"id":4},{"start":{"row":29,"column":0},"end":{"row":29,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":29,"column":4},"end":{"row":31,"column":29},"action":"insert","lines":["require_once('../common/common.php');","    ","    $post = sanitize($_POST);"],"id":5}],[{"start":{"row":32,"column":21},"end":{"row":32,"column":22},"action":"remove","lines":["T"],"id":6},{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"remove","lines":["S"]},{"start":{"row":32,"column":19},"end":{"row":32,"column":20},"action":"remove","lines":["O"]},{"start":{"row":32,"column":18},"end":{"row":32,"column":19},"action":"remove","lines":["P"]},{"start":{"row":32,"column":17},"end":{"row":32,"column":18},"action":"remove","lines":["_"]}],[{"start":{"row":32,"column":17},"end":{"row":32,"column":18},"action":"insert","lines":["p"],"id":7},{"start":{"row":32,"column":18},"end":{"row":32,"column":19},"action":"insert","lines":["o"]},{"start":{"row":32,"column":19},"end":{"row":32,"column":20},"action":"insert","lines":["s"]},{"start":{"row":32,"column":20},"end":{"row":32,"column":21},"action":"insert","lines":["t"]}],[{"start":{"row":33,"column":21},"end":{"row":33,"column":22},"action":"remove","lines":["T"],"id":8},{"start":{"row":33,"column":20},"end":{"row":33,"column":21},"action":"remove","lines":["S"]},{"start":{"row":33,"column":19},"end":{"row":33,"column":20},"action":"remove","lines":["O"]},{"start":{"row":33,"column":18},"end":{"row":33,"column":19},"action":"remove","lines":["P"]},{"start":{"row":33,"column":17},"end":{"row":33,"column":18},"action":"remove","lines":["_"]}],[{"start":{"row":33,"column":17},"end":{"row":33,"column":18},"action":"insert","lines":["p"],"id":9},{"start":{"row":33,"column":18},"end":{"row":33,"column":19},"action":"insert","lines":["o"]},{"start":{"row":33,"column":19},"end":{"row":33,"column":20},"action":"insert","lines":["s"]},{"start":{"row":33,"column":20},"end":{"row":33,"column":21},"action":"insert","lines":["t"]}],[{"start":{"row":34,"column":22},"end":{"row":34,"column":23},"action":"remove","lines":["T"],"id":10},{"start":{"row":34,"column":21},"end":{"row":34,"column":22},"action":"remove","lines":["S"]},{"start":{"row":34,"column":20},"end":{"row":34,"column":21},"action":"remove","lines":["O"]},{"start":{"row":34,"column":19},"end":{"row":34,"column":20},"action":"remove","lines":["P"]},{"start":{"row":34,"column":18},"end":{"row":34,"column":19},"action":"remove","lines":["_"]}],[{"start":{"row":34,"column":18},"end":{"row":34,"column":19},"action":"insert","lines":["p"],"id":11},{"start":{"row":34,"column":19},"end":{"row":34,"column":20},"action":"insert","lines":["o"]},{"start":{"row":34,"column":20},"end":{"row":34,"column":21},"action":"insert","lines":["s"]},{"start":{"row":34,"column":21},"end":{"row":34,"column":22},"action":"insert","lines":["t"]}],[{"start":{"row":35,"column":31},"end":{"row":35,"column":32},"action":"remove","lines":["T"],"id":12},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"remove","lines":["S"]},{"start":{"row":35,"column":29},"end":{"row":35,"column":30},"action":"remove","lines":["O"]},{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"remove","lines":["P"]},{"start":{"row":35,"column":27},"end":{"row":35,"column":28},"action":"remove","lines":["_"]}],[{"start":{"row":35,"column":27},"end":{"row":35,"column":28},"action":"insert","lines":["p"],"id":13},{"start":{"row":35,"column":28},"end":{"row":35,"column":29},"action":"insert","lines":["o"]},{"start":{"row":35,"column":29},"end":{"row":35,"column":30},"action":"insert","lines":["s"]},{"start":{"row":35,"column":30},"end":{"row":35,"column":31},"action":"insert","lines":["t"]}],[{"start":{"row":36,"column":27},"end":{"row":36,"column":28},"action":"remove","lines":["T"],"id":14},{"start":{"row":36,"column":26},"end":{"row":36,"column":27},"action":"remove","lines":["S"]},{"start":{"row":36,"column":25},"end":{"row":36,"column":26},"action":"remove","lines":["O"]},{"start":{"row":36,"column":24},"end":{"row":36,"column":25},"action":"remove","lines":["P"]},{"start":{"row":36,"column":23},"end":{"row":36,"column":24},"action":"remove","lines":["_"]},{"start":{"row":36,"column":22},"end":{"row":36,"column":23},"action":"remove","lines":["$"]}],[{"start":{"row":36,"column":22},"end":{"row":36,"column":23},"action":"insert","lines":["$"],"id":15},{"start":{"row":36,"column":23},"end":{"row":36,"column":24},"action":"insert","lines":["p"]},{"start":{"row":36,"column":24},"end":{"row":36,"column":25},"action":"insert","lines":["o"]},{"start":{"row":36,"column":25},"end":{"row":36,"column":26},"action":"insert","lines":["s"]},{"start":{"row":36,"column":26},"end":{"row":36,"column":27},"action":"insert","lines":["t"]}],[{"start":{"row":38,"column":4},"end":{"row":40,"column":65},"action":"remove","lines":["$pro_code = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');","    $pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');","    $pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');"],"id":16},{"start":{"row":38,"column":0},"end":{"row":38,"column":4},"action":"remove","lines":["    "]},{"start":{"row":37,"column":4},"end":{"row":38,"column":0},"action":"remove","lines":["",""]},{"start":{"row":37,"column":0},"end":{"row":37,"column":4},"action":"remove","lines":["    "]},{"start":{"row":36,"column":42},"end":{"row":37,"column":0},"action":"remove","lines":["",""]}]]},"ace":{"folds":[],"scrolltop":142.5,"scrollleft":0,"selection":{"start":{"row":36,"column":42},"end":{"row":36,"column":42},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":7,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1592982110675,"hash":"957b70a8823c0b3ee659175f66c72833edccea14"}