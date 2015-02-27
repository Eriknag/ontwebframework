<?php /* Smarty version Smarty-3.1.18, created on 2014-11-12 22:26:39
         compiled from ".\templates\account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52925463c8cc2a78c1-06327031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b12b2daba8893496d5e9cd825370f4a7352bbbe' => 
    array (
      0 => '.\\templates\\account.tpl',
      1 => 1415827585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52925463c8cc2a78c1-06327031',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5463c8cc2a78c2_70495077',
  'variables' => 
  array (
    'site' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5463c8cc2a78c2_70495077')) {function content_5463c8cc2a78c2_70495077($_smarty_tpl) {?><ul class="nav navbar-nav navbar-right">
    <?php if ($_smarty_tpl->tpl_vars['site']->value->isLoggedin()) {?>
	    <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
	        <ul class="dropdown-menu" role="menu">
		        <li><a href="#">Action</a></li>
		        <li><a href="#">Another action</a></li>
		        <li><a href="#">Something else here</a></li>
		        <li class="divider"></li>
		        <li><a href="#">Separated link</a></li>
	        </ul>
    <?php } else { ?>
		 <li><a id="login" href="#">Log in</a></li>
    <?php }?>
    </li>
</ul>


<?php }} ?>
