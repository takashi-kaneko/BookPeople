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

$buttonArray[] =& HTML_QuickForm::createElement('submit', 'v', 'a', '', '');
$buttonArray[] =& HTML_QuickForm::createElement('submit', 'a', 'b', '', '');


$form->addGroup($buttonArray, 'buttonSeat', '', '');

// 入力フォームの要素を連想配列で渡す
$objRenderer =& new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($objRenderer);
$smarty->assign('form',$objRenderer->toArray());

$smarty->assign('name', '太郎');
$smarty->display('test.tpl');

// get the persistence manager
$m = epManager::instance();

// use EZOQL to find books with 'Design' title
$result = $m->query("from MstUser");
if ($result) {
    foreach($result as &$o) {
        echo $o;
    }
}



// create books
$b1 = $m->create('MstUser');
$b1->user_id = 1234;
$b1->user_name = 'あい';
$m->commit($b1);

?>