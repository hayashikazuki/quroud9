{"filter":false,"title":"staff_add.php","tooltip":"/king HP/staff/staff_add.php","undoManager":{"mark":6,"position":6,"stack":[[{"start":{"row":11,"column":4},"end":{"row":13,"column":18},"action":"remove","lines":["print $_SESSION['staff_name'];","    print'さんログイン中<br />';","    print'<br />';"],"id":110}],[{"start":{"row":11,"column":4},"end":{"row":11,"column":37},"action":"insert","lines":["$login = $_SESSION['staff_name'];"],"id":111}],[{"start":{"row":24,"column":10},"end":{"row":25,"column":8},"action":"insert","lines":["","        "],"id":112}],[{"start":{"row":25,"column":8},"end":{"row":26,"column":0},"action":"insert","lines":["",""],"id":113},{"start":{"row":26,"column":0},"end":{"row":26,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":26,"column":8},"end":{"row":28,"column":14},"action":"insert","lines":["<div class=\"loginarea\">","            <p><?php print $login; ?>さん、ログイン中</p>","        </div>"],"id":114}],[{"start":{"row":5,"column":4},"end":{"row":7,"column":11},"action":"remove","lines":["print'ログインできません。<br />';","    print'<a href=\"../staff_login/staff_login.html\">ログイン画面へ</a>';","    exit();"],"id":115}],[{"start":{"row":5,"column":4},"end":{"row":7,"column":11},"action":"insert","lines":["$_SESSION['error']='ログアウトしています。再度ログインしてください。';","    header('Location:../staff_login/staff_login.php');","    exit();"],"id":116}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":7,"column":11},"end":{"row":7,"column":11},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1594170674721,"hash":"b80c4f671a60e81c011d80906e938de94585319a"}