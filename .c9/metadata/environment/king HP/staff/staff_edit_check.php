{"filter":false,"title":"staff_edit_check.php","tooltip":"/king HP/staff/staff_edit_check.php","undoManager":{"mark":6,"position":6,"stack":[[{"start":{"row":11,"column":4},"end":{"row":13,"column":18},"action":"remove","lines":["print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';"],"id":32}],[{"start":{"row":11,"column":4},"end":{"row":11,"column":37},"action":"insert","lines":["$login = $_SESSION['staff_name'];"],"id":33}],[{"start":{"row":33,"column":10},"end":{"row":34,"column":8},"action":"insert","lines":["","        "],"id":34}],[{"start":{"row":34,"column":8},"end":{"row":35,"column":0},"action":"insert","lines":["",""],"id":35},{"start":{"row":35,"column":0},"end":{"row":35,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":35,"column":8},"end":{"row":37,"column":14},"action":"insert","lines":["<div class=\"loginarea\">","            <p><?php print $login; ?>さん、ログイン中</p>","        </div>"],"id":36}],[{"start":{"row":5,"column":4},"end":{"row":7,"column":11},"action":"remove","lines":["print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();"],"id":37}],[{"start":{"row":5,"column":4},"end":{"row":7,"column":11},"action":"insert","lines":["$_SESSION['error']='ログアウトしています。再度ログインしてください。';","    header('Location:../staff_login/staff_login.php');","    exit();"],"id":38}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":7,"column":11},"end":{"row":7,"column":11},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1594170674912,"hash":"ab7e6cf4a262ffdb32467cdd82307b2ad1778d43"}