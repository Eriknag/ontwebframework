<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-04 22:13:44
         compiled from "templates\userdetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182245547d2f8894ee5-41926836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd99ceaabed3b896ba936ef0ae37d13d44f378356' => 
    array (
      0 => 'templates\\userdetails.tpl',
      1 => 1428329869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182245547d2f8894ee5-41926836',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5547d2f88e7524_84325190',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5547d2f88e7524_84325190')) {function content_5547d2f88e7524_84325190($_smarty_tpl) {?><input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"/>
<div class="form-group">
	 <label class="control-label" for="username">Gebruikersnaam *</label>
	 <input  type="text" class="form-control" name="username" 
	 		<?php if (strlen($_smarty_tpl->tpl_vars['model']->value->currentUser->username)>0) {?>
	 			readonly
	 		<?php } else { ?>
	 			required minlength="2" 
	 		<?php }?>
	 		value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->username;?>
"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="firstname">Voornaam *</label>
	 <input  type="text" class="form-control" name="firstname" 
	 		required value="<?php echo $_smarty_tpl->tpl_vars['model']->value->currentUser->firstname;?>
"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="lastname">Achternaam *</label>
	 <input  type="text" class="form-control" name="lastname" 
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
