{"filter":false,"title":"staff_edit_done.php","tooltip":"/shopping_hp/staff/staff_edit_done.php","undoManager":{"mark":2,"position":2,"stack":[[{"start":{"row":29,"column":4},"end":{"row":34,"column":67},"action":"remove","lines":["$staff_code = $_POST['code'];","    $staff_name = $_POST['name'];","    $staff_pass = $_POST['pass'];","    ","    $staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');","    $staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');"],"id":7}],[{"start":{"row":29,"column":4},"end":{"row":35,"column":34},"action":"insert","lines":["require_once('../common/common.php');","    ","    $post = sanitize($_POST);","    $staff_code= $post['code'];","    $staff_name = $post['name'];","    $staff_pass = $post['pass'];","    $staff_pass2 = $post['pass2'];"],"id":8}],[{"start":{"row":35,"column":4},"end":{"row":35,"column":34},"action":"remove","lines":["$staff_pass2 = $post['pass2'];"],"id":9},{"start":{"row":35,"column":0},"end":{"row":35,"column":4},"action":"remove","lines":["    "]},{"start":{"row":34,"column":32},"end":{"row":35,"column":0},"action":"remove","lines":["",""]}]]},"ace":{"folds":[],"scrolltop":201,"scrollleft":0,"selection":{"start":{"row":34,"column":32},"end":{"row":34,"column":32},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":11,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1592981788449,"hash":"b20187f686dd7980a0ac5dcc7303920dc88e5756"}