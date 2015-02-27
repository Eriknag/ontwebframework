<?php /* Smarty version Smarty-3.1.18, created on 2014-11-15 21:44:27
         compiled from "templates\userdetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14656545a3f74c88ed9-53577684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25bca57603516b293f74c51f0e37c70405157ae5' => 
    array (
      0 => 'templates\\userdetails.tpl',
      1 => 1416084254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14656545a3f74c88ed9-53577684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_545a3f74cea988_44492004',
  'variables' => 
  array (
    'action' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545a3f74cea988_44492004')) {function content_545a3f74cea988_44492004($_smarty_tpl) {?><input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"/>
<div class="form-group">
	 <label class="control-label" for="userid">Gebruikersnaam *</label>
	 <input  type="text" class="form-control" name="userid" 
	 		<?php if (strlen($_smarty_tpl->tpl_vars['model']->value->currentUser->userid)>0) {?>
	 			readonly
	 		<?php } else { ?>
	 			required minlength="2" 
	 		<?php }?>
	 		value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->userid;?>
"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="first_name">Voornaam *</label>
	 <input  type="text" class="form-control" name="first_name" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->firstname;?>
"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="last_name">Achternaam *</label>
	 <input  type="text" class="form-control" name="last_name" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->lastname;?>
"/>
</div>
<div class="form-group">
	 <label class="control-label" for="email">Email Adres *</label>
	 <input  type="text" class="form-control" name="email" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->email;?>
"/>		 
</div>
<div class="form-group">
	 <label class="control-label" for="telephone">Telefoon Nummer</label>
	 <input  type="text" class="form-control" name="telephone" 
	 		value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->telephone;?>
"/>
</div>
<div class="form-group">
	 <label class="control-label" for="password">Wachtwoord *</label>
	 <input  type="password" class="form-control" name="password" 
	 		value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->password;?>
"/>
</div>
<input type="submit" style="display:none" />
<?php }} ?>
