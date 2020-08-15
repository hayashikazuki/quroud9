<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    $_SESSION['error']='ログアウトしています。再度ログインしてください。';
    header('Location:../staff_login/staff_login.php');
    exit();
}
else
{
    $login = $_SESSION['staff_name'];
    $employ = $_SESSION['employ'];
}

?>

<?php
        
        try
        {
        
        
        $hurugi_code=$_GET['hurugicode'];    
        
        $dsn='mysql:dbname=hurugi_keisan;host=localhost;charset=utf8';
        $user='root';
        $password='';
        $dbh = new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $sql ='SELECT namecode,name,danjo,stocking,expect,sale,fee,postage,other,sales_channel,shop,date,saledate,remarks,gazou,
        status,length,width,sleeve,shoulder,brand,color,material,era FROM hurugi_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$hurugi_code;
        $stmt->execute($data);
        
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $hurugi_namecode=$rec['namecode'];
        $hurugi_name=$rec['name'];
        $hurugi_stocking=$rec['stocking'];
        $hurugi_expect=$rec['expect'];
        $hurugi_sale=$rec['sale'];
        $hurugi_shop=$rec['shop'];
        $hurugi_date=$rec['date'];
        $hurugi_saledate=$rec['saledate'];
        $hurugi_remarks=$rec['remarks'];
        $hurugi_gazou_name=$rec['gazou'];
        
        $hurugi_danjo=$rec['danjo'];
        $hurugi_sales_channel=$rec['sales_channel'];
        $hurugi_fee=$rec['fee'];
        $hurugi_postage=$rec['postage'];
        $hurugi_other=$rec['other'];
        
        $hurugi_status=$rec['status'];
        $hurugi_length=$rec['length'];
        $hurugi_width=$rec['width'];
        $hurugi_sleeve=$rec['sleeve'];
        $hurugi_shoulder=$rec['shoulder'];
        $hurugi_brand=$rec['brand'];
        $hurugi_color=$rec['color'];
        $hurugi_material=$rec['material'];
        $hurugi_era=$rec['era'];
        
        
        $dbh = null;
        
        }
        catch(Exception $e)
        {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
        }
        ?>
        
<!DOCTTYPE>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>古着管理アプリ</title>
        <link rel="stylesheet" href="hurugi.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="hurugi.js"></script>
    </head>
    <body>
        
    <section class="tenpmenu">
        
        <section class="menu">
            <div class="toplist-loginarea">
                <p><?php print $login; ?>さん、ログイン中</p>
            </div>
            <p class="toplistmenu">トップメニュー</p>
            <ul class="selectmenu">
                <?php
                if($employ == 'admin')
                {
                ?>
                <li ><a href="../staff/staff_list.php">スタッフ管理</a></li>
                <br />
                <?php
                }
                ?>
                <li><a href="../product/hurugi_list.php">商品管理</a></li>
                <br />
                <li><a href="../product/hurugi_download.php">購入月ダウンロード</a></li>
                <br />
                <li><a href="../product/saledate_download.php">販売月ダウンロード</a></li>
                <br />
                <li><a href="../staff_login/staff_logout.php">ログアウト</a></li>
            </ul>
        </section>
        
        <section class="mobile-menu">
            
            <p><?php print $login; ?>さん、ログイン中<i class="fas fa-user-alt fa-fw fa-2x"></i></p>
            
            <div class="menu-btn">
                <p><i class="fa fa-bars fa-3x" aria-hidden="true"></i></p>
            </div>
            <div class="mobile-content">
                 <?php
                if($employ == 'admin')
                {
                ?>
                
                <a href="../staff/staff_list.php" >
                    <div class="menu__item">スタッフ管理</div>
                </a>
                <br />
                
                <?php
                }
                ?>
                <a href="../product/hurugi_list.php" >
                    <div class="menu__item">商品一覧</div>
                </a>
                <br />
                <a href="../product/hurugi_download.php" >
                    <div class="menu__item">購入月ダウンロード</div>
                </a>
                <br />
                <a href="../product/saledate_download.php" >
                    <div class="menu__item">販売月ダウンロード</div>
                </a>
                <br />
                <a href="../staff_login/staff_logout.php" >
                    <div class="menu__item">ログアウト</div>
                </a>
            </div>
            
        </section>
        
    <section class="tenp">
        <p class="tenptitle">テンプレート一覧</p>
        
        <p>テンプレート❶</p>
        
        <button onclick="copyToClipboard()">Copy text</button>
        
        
        <div class="tenp1" id="textDiv">
            
            <p>閲覧いただき誠にありがとうございます^ ^</p>
            <br />
            <p>即購入大歓迎でございます。</p>
            <p>★フォローで10%割引★</p>
            <p>その他の値段交渉等も随時承ります。詳しくはプロフィールをご覧ください。</p>
            <br />
            <br />
            <br />
            <p>◯ 商品の状態: </p>
            <br />
            <?php
                switch($hurugi_status)
                {
                            case'new':
                                $status = '新';
                    
                                break;
                            
                            case'near':
                                $status = '新';
                                
                                break;
                                
                            case'nodirt':
                                $status = '１';
                                
                                break;
                            
                            case'somewhat':
                                $status = '２';
                                
                                break;
                            
                            case'dirt':
                                $status = '３';
                                
                                break;
                                
                            case'bad':
                                $status = '４';
                                
                                break;
                }
            ?>
            <p>こちらの商品は 【<?php print $status; ?>】ランクです。</p>
            <p>【新】新品または新品同様に近いもの。</p>
            <p>【1】多少使用感はあるが、目立つ傷や大きな汚れはないもの。</p>
            <p>【2】使用感や部分的にやや傷や汚れがあるが、着用には問題がないもの。普段古着を買う方なら気にならない程度。</p>
            <p>【3】使用感や傷、汚れがあるもの。古着慣れしている方におすすめ。</p>
            <p>【4】大きな傷や汚れが見られるもの。古着上級者さんや、気にならない方、リメイクに使われる方におすすめ。</p>
            <br />
            <br />
            <br />
            <p>★状態について★</p>
            <p>特に目立った傷や汚れのないお品物です。古着故、多少の使用感はございますが、普段古着を切られる方でしたら、まだまだお使い頂ける一枚かと思います。</p>
            <p>※出品している商品は古着、オールド品、ヴィンテージ品が主になります。</p>
            <p>多少の小キズ・スレ・汚れ等見落としてしまう場合があります。ご理解の上、ご購入をお願い致します。</p>
            <br />
            <br />
            <br />
            <p>◯ サイズ: </p>
            <p>実寸平置き</p>
            <br />
            <p>着丈&nbsp;&nbsp;<?php print $hurugi_length; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;身幅&nbsp;&nbsp;<?php print $hurugi_width; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;袖丈&nbsp;&nbsp;<?php print $hurugi_sleeve; ?>&nbsp;&nbsp;
               /&nbsp;&nbsp;肩幅&nbsp;&nbsp;<?php print $hurugi_shoulder; ?>&nbsp;&nbsp;</p>
            <br />
            <p>※素人採寸になりますので、測定値の若干の誤差はご了承下さいませ。</p>
            <br />
            <br />
            <br />
            <p>◯ ブランド: <?php print $hurugi_brand; ?></p>
            <br />
            <p>◯カラー：<?php print $hurugi_color; ?></p>
            <br />
            <p>◯ 素材: <?php print $hurugi_material; ?></p>
            <br />
            <p>◯ 年代: <?php print $hurugi_era; ?></p>
            <br />
            <br />
            <p>◯ 基本的には、ご購入から3日以内に発送させて頂きます。</p>
            <p>発送できない日もございますので、その時はメッセージさせていただきます。</p>
            <p>発送方法は、追跡機能、補償のついているメルカリ便（クロネコヤマト宅急便）で行います。</p>
            <br />
            <p>『#店の名前』</p>
            <p>↑他の商品も出品しておりますので、是非ご覧ください。</p>
            <p>最後までお読みいただきありがとうございました^ ^</p>
            <p>気持ちの良いお取引をどうぞよろしくお願い致します。</p>
            
    
        </div>
        
            <br />
            <a href="hurugi_disp.php?hurugicode=<?php print $hurugi_code; ?>" class="more_add">参照へ戻る</a>
            <br />
            <a href="hurugi_list.php" class="to_list">一覧へ戻る</a>
        
    </section>
    
    </section>
    
    <script>
        function copyToClipboard() {
    
        var text = $('#textDiv').text(); // #textDivの中のtextを代入する　
        var clipboard = $('<textarea></textarea>'); // js内で仮想のtextarea（clipboard)を生成する
        clipboard.val(text);  // 仮想のtextareaにtextを代入する
        $("#textDiv").append(clipboard); // 一時的にtextareaをHTMLに追加する　
        clipboard.select(); // textareaを選択状態にする
        document.execCommand('copy'); // textareaの中身をコピーする
        clipboard.remove(); // 一時追加したtextareaを削除する
        
        alert("コピーしました");
    
        }
        
    </script>
 
    </body>
</html>