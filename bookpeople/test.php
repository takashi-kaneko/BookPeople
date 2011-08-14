<?php
require_once 'libs/Smarty.class.php';
require_once 'HTML/QuickForm.php'; // ライブラリ
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php'; // ライブラリ
include_once(dirname(__FILE__) . '/libs/ezpdo/ezpdo_runtime.php');
include_once(dirname(__FILE__) . '/src/class/dto/MstUser.php');

$smarty = new Smarty;
define("templatePath", 'templates');
define("compilePath", 'templates_c');
$form = new HTML_QuickForm('submitForm', 'POST');
$buttonArray = array();

$buttonArray[] =& HTML_QuickForm::createElement('submit', 'b1', '追加', '', '');
$buttonArray[] =& HTML_QuickForm::createElement('submit', 'b2', '参照', '', '');


$form->addGroup($buttonArray, 'buttonValue', '', '');

// 入力フォームの要素を連想配列で渡す
$objRenderer =& new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($objRenderer);
$smarty->assign('form',$objRenderer->toArray());

$button_str = '';
if (isset($_POST['buttonValue'])) {

	$button_arr = $_POST['buttonValue'];
	if (isset($button_arr) && count($button_arr) > 0) {
		foreach ($button_arr as $key2 => $value2) {
			$button_str = $value2;
		}
	}
	$smarty->assign('message', $button_str);
} else {
	$smarty->assign('message','');
}

$smarty->display('test.tpl');

// 永続化
$m = epManager::instance();

if ($button_str == '参照') {
	// EZOQLを使って検索
	$result = $m->query("from MstUser");
	if ($result) {
		$i = 0;
		foreach($result as &$o) {
			echo $o->user_name;
			$i++;
		}
		echo '<br>';
		echo $i;
	}
}
if ($button_str == '追加') {
	// レコード生成
	$b1 = $m->create('MstUser');
	$b1->user_id = 1234;
	$b1->user_name = 'あい';
	$m->commit($b1);
}
?>