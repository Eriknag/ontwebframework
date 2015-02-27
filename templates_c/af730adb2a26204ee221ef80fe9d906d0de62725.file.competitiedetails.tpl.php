<?php /* Smarty version Smarty-3.1.18, created on 2014-11-16 22:44:32
         compiled from "templates\competitiedetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:491454691ac008fd66-99142923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af730adb2a26204ee221ef80fe9d906d0de62725' => 
    array (
      0 => 'templates\\competitiedetails.tpl',
      1 => 1416156888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '491454691ac008fd66-99142923',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54691ac05f5253_52872948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54691ac05f5253_52872948')) {function content_54691ac05f5253_52872948($_smarty_tpl) {?><input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"/>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->current->id;?>
"/>
<div class="form-group">
	 <label class="control-label" for="klasse">Klasse *</label>
	 <input  type="text" class="form-control" name="klasse" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->current->klasse;?>
"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="teamnaam">Team naam *</label>
	 <input  type="text" class="form-control" name="teamnaam" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->current->teamnaam;?>
"/>
</div>
<input type="submit" style="display:none" />
<?php }} ?>
