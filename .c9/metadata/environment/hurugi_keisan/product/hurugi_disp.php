{"filter":false,"title":"hurugi_disp.php","tooltip":"/hurugi_keisan/product/hurugi_disp.php","ace":{"folds":[],"scrolltop":1709,"scrollleft":0,"selection":{"start":{"row":148,"column":18},"end":{"row":148,"column":18},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":32,"state":"php-start","mode":"ace/mode/php"}},"undoManager":{"mark":5,"position":5,"stack":[[{"start":{"row":12,"column":37},"end":{"row":13,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":13,"column":4},"end":{"row":13,"column":34},"action":"insert","lines":["$employ = $_SESSION['employ'];"],"id":3}],[{"start":{"row":109,"column":16},"end":{"row":110,"column":22},"action":"remove","lines":["<li><a href=\"../staff/staff_list.php\">スタッフ管理</a></li>","                <br />"],"id":4}],[{"start":{"row":109,"column":16},"end":{"row":117,"column":18},"action":"insert","lines":["<?php","                if($employ == 'admin')","                {","                ?>","                <li ><a href=\"../staff/staff_list.php\">スタッフ管理</a></li>","                <br />","                <?php","                }","                ?>"],"id":5}],[{"start":{"row":136,"column":16},"end":{"row":139,"column":22},"action":"remove","lines":["<a href=\"../staff/staff_list.php\" >","                    <div class=\"menu__item\">スタッフ管理</div>","                </a>","                <br />"],"id":6}],[{"start":{"row":136,"column":16},"end":{"row":148,"column":18},"action":"insert","lines":[" <?php","                if($employ == 'admin')","                {","                ?>","                ","                <a href=\"../staff/staff_list.php\" >","                    <div class=\"menu__item\">スタッフ管理</div>","                </a>","                <br />","                ","                <?php","                }","                ?>"],"id":7}]]},"timestamp":1597371928892,"hash":"5984e95d2dcc8d64eefcdc02190540675f13306d"}