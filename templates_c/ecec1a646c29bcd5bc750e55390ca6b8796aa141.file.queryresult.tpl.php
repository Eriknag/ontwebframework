<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 22:13:40
         compiled from "templates\queryresult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195715547d2f44ef640-69414014%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecec1a646c29bcd5bc750e55390ca6b8796aa141' => 
    array (
      0 => 'templates\\queryresult.tpl',
      1 => 1430767123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195715547d2f44ef640-69414014',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resultFields' => 0,
    'field' => 0,
    'result' => 0,
    'row' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5547d2f4534637_82130270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5547d2f4534637_82130270')) {function content_5547d2f4534637_82130270($_smarty_tpl) {?><div class="form-group">
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
				<td class="resultrow"><?php if ($_smarty_tpl->tpl_vars['value']->value!=null) {
echo $_smarty_tpl->tpl_vars['value']->value;
} else { ?><i>null</i><?php }?></td>
			<?php } ?>
			</tr>
		<?php } ?>
		
	</table>
</div>
<?php }} ?>
