{"filter":false,"title":"pro_edit.php","tooltip":"/shopping_hp/product/pro_edit.php","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"insert","lines":["",""],"id":2}],[{"start":{"row":0,"column":0},"end":{"row":15,"column":2},"action":"insert","lines":["<?php","session_start();","session_regenerate_id(true);","if(isset($_SESSION['login'])==false)","{","    print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();","}","else","{","    print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';","}","?>"],"id":3}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":15,"column":2},"end":{"row":15,"column":2},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1592964851425,"hash":"e5a1f0485246ca9e464c46c8dc08dd5152caa168"}