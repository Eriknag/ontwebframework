<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-03 21:19:54
         compiled from "templates\queryresult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6557554670a5881968-86049168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecec1a646c29bcd5bc750e55390ca6b8796aa141' => 
    array (
      0 => 'templates\\queryresult.tpl',
      1 => 1430680788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6557554670a5881968-86049168',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554670a58ae260_48125979',
  'variables' => 
  array (
    'resultFields' => 0,
    'field' => 0,
    'result' => 0,
    'row' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554670a58ae260_48125979')) {function content_554670a58ae260_48125979($_smarty_tpl) {?><div class="form-group">
	<table id="userstable" class="table table-striped table-hover">
		
		<tr>
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['resultFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
				<th><?php echo $_smarty_tpl->tpl_vars['field']->value;?>
</th>
			<?php } ?>
		</tr>
		
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
			<tr>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<td class="resultrow"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
			<?php } ?>
			</tr>
		<?php } ?>
		
	</table>
</div>
<?php }} ?>
