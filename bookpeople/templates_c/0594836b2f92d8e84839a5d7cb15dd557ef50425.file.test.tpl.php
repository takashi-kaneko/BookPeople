<?php /* Smarty version Smarty-3.0.8, created on 2011-07-23 16:57:45
         compiled from ".\templates\test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281664e2ae1690aef46-04727421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0594836b2f92d8e84839a5d7cb15dd557ef50425' => 
    array (
      0 => '.\\templates\\test.tpl',
      1 => 1311432812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281664e2ae1690aef46-04727421',
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
