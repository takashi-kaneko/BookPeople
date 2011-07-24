<?php
require_once 'libs/Smarty.class.php';
require_once 'HTML/QuickForm.php'; // ライブラリ
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php'; // ライブラリ
$smarty = new Smarty;
define("templatePath", 'templates');
define("compilePath", 'templates_c');
$form = new HTML_QuickForm('submitForm', 'POST');
$buttonArray = array();

$buttonArray[] =& HTML_QuickForm::createElement('submit', 'v', 'a', '', '');
$buttonArray[] =& HTML_QuickForm::createElement('submit', 'a', 'b', '', '');


$form->addGroup($buttonArray, 'buttonSeat', '', '');

// 入力フォームの要素を連想配列で渡す
$objRenderer =& new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($objRenderer);
$smarty->assign('form',$objRenderer->toArray());

$smarty->assign('name', '太郎');
$smarty->display('test.tpl');
?>