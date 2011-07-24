<?php /* Smarty version Smarty-3.0.8, created on 2011-07-23 17:29:47
         compiled from ".\templates\friends.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76584e2ae8ebc2dab0-75989635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae1677a98fbf66e4ab68a13008cb079ace1e435f' => 
    array (
      0 => '.\\templates\\friends.tpl',
      1 => 1311434984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76584e2ae8ebc2dab0-75989635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
<TITLE></TITLE>
<link rel="stylesheet" href="common/css/default.css" type="text/css" />
</HEAD>
<BODY>
<form <?php echo $_smarty_tpl->getVariable('form')->value['attributes'];?>
>
<?php if ($_smarty_tpl->getVariable('user')->value!=''){?>
    <h4>You</h4>
    <img src="https://graph.facebook.com/<?php echo $_smarty_tpl->getVariable('user')->value;?>
/picture">
    <h4><?php echo $_smarty_tpl->getVariable('count')->value;?>
 Friends </h4>
    <DIV class="scr">
<?php echo $_smarty_tpl->getVariable('friendsData')->value;?>

	</DIV>

<?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->getVariable('login_url')->value;?>
">Login</a>
<?php }?>
<?php echo $_smarty_tpl->getVariable('form')->value['comment']['html'];?>

<?php echo $_smarty_tpl->getVariable('comment_text')->value;?>

<a href="<?php echo $_smarty_tpl->getVariable('logout_url')->value;?>
">Logout</a>

</form>
</BODY>
</HTML>