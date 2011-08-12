<?php
require 'libs/fb/facebook.php';
require 'libs/Smarty.class.php';
require_once 'HTML/QuickForm.php'; // ライブラリ
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php'; // ライブラリ


$smarty = new Smarty;
$form = new HTML_QuickForm('submitForm', 'POST');
$comment = array();

$facebook = new Facebook(array(
  'appId'  => '100782866691110',
  'secret' => 'dbff2ad6390fd6610f384abdcd30c9db',
));


$login_url="";
$logout_url="";
//Facebookログイン状態を取得
$user = $facebook->getUser();

if ($user) {
    //ログインしてたら自分のユーザプロファイルを取得
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        //プロファイル取得に失敗
        error_log($e);
        $user = null;
    }

    //自分のフレンドリストを取得
    try {
        $friendsList = $facebook->api('/me/friends');
    } catch (FacebookApiException $e) {
        //友達リスト取得に失敗
        error_log($e);
    }
    //ログアウトURL取得
    $logout_url = $facebook->getLogoutUrl();
} else {
    //ログインしていないので、ログインURL取得
    $par = array('scope' => 'publish_stream,read_friendlists');
    $login_url = $facebook->getLoginUrl($par);
}
$yourName = $user_profile['name'];
$friendsData = '';
$count='0';
if (isset($friendsList)) {
	foreach ($friendsList as $key=>$value) {
		$count = count($value);//友達の総数
		$i=0;
	    foreach ($value as $fkey=>$fvalue) {
	        $i++;
	        $friendsData = $friendsData . '<a href="http://www.facebook.com/profile.php?id='.$fvalue['id'].'" target="_blank"><img src="https://graph.facebook.com/' . $fvalue['id'] . '/picture" border="0" title="' . $fvalue['name'].'"/></a>  ';
	        if ($i % 9 == 0) { $friendsData = $friendsData .  '<br><br>';}
	    }
	}
}
//表示
$comment[] =& HTML_QuickForm::createElement('text', 'comment', 'comment', '', '');
$comment[] =& HTML_QuickForm::createElement('submit', 'exec', '送信', '', '');
//$comment[] =& HTML_QuickForm::createElement('static', $_POST['comment_text'], null, null, '');
$form->addGroup($comment, 'comment', '', '');

// 入力フォームの要素を連想配列で渡す
$objRenderer =& new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($objRenderer);
$smarty->assign('form',$objRenderer->toArray());

$smarty->assign('yourName', $yourName);
$smarty->assign('friendsData', $friendsData);
$smarty->assign('count', $count);

$comment_str = count($_POST['comment']);
$comment_text = $_POST['comment'];
if (isset($comment_text) && count($comment_text) > 0) {
	foreach ($comment_text as $key2 => $value2) {
		$comment_str = $comment_str.",".$key2."=".$value2;
	}
}
$smarty->assign('comment_text', $comment_str);
$smarty->assign('user', $user);
$smarty->assign('logout_url', $logout_url);
$smarty->assign('login_url', $login_url);
$smarty->display('friends.tpl');
?>