{"filter":false,"title":"staff_add_done.php","tooltip":"/shopping_hp/staff/staff_add_done.php","ace":{"folds":[],"scrolltop":220.5,"scrollleft":0,"selection":{"start":{"row":34,"column":4},"end":{"row":34,"column":4},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"2644b9f59a0afcefa22935bdb84951b4b131554c","undoManager":{"mark":5,"position":5,"stack":[[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":15,"column":2},"action":"insert","lines":["<?php","session_start();","session_regenerate_id(true);","if(isset($_SESSION['login'])==false)","{","    print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();","}","else","{","    print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';","}","?>"],"id":3}],[{"start":{"row":29,"column":4},"end":{"row":33,"column":67},"action":"remove","lines":["$staff_name = $_POST['name'];","    $staff_pass = $_POST['pass'];","    ","    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');","    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');"],"id":4}],[{"start":{"row":29,"column":4},"end":{"row":34,"column":34},"action":"insert","lines":["require_once('../common/common.php');","    ","    $post = sanitize($_POST);","    $staff_name = $post['name'];","    $staff_pass = $post['pass'];","    $staff_pass2 = $post['pass2'];"],"id":5}],[{"start":{"row":34,"column":4},"end":{"row":34,"column":34},"action":"remove","lines":["$staff_pass2 = $post['pass2'];"],"id":6},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"remove","lines":["    "]},{"start":{"row":33,"column":32},"end":{"row":34,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":33,"column":32},"end":{"row":34,"column":0},"action":"insert","lines":["",""],"id":7},{"start":{"row":34,"column":0},"end":{"row":34,"column":4},"action":"insert","lines":["    "]}]]},"timestamp":1592981788582}