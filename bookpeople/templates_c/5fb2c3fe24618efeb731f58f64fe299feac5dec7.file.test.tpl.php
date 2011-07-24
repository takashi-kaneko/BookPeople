<?php /* Smarty version Smarty-3.0.8, created on 2011-07-23 16:35:50
         compiled from "templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43214e2adc4650f481-52024027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb2c3fe24618efeb731f58f64fe299feac5dec7' => 
    array (
      0 => 'templates\\test.tpl',
      1 => 1311431744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43214e2adc4650f481-52024027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
<HEAD>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<TITLE></TITLE>
<link rel="stylesheet" href="common/css/default.css" type="text/css" />
</HEAD>
<body>
<form <?php echo $_smarty_tpl->getVariable('form')->value['attributes'];?>
>
ようこそ、<?php echo $_smarty_tpl->getVariable('name')->value;?>
さん<br />
HelloWorld！
<?php echo $_smarty_tpl->getVariable('form')->value['buttonSeat']['html'];?>

</form>
</body>
