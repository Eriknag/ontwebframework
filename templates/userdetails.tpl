<input type="hidden" name="action" value="{$action}"/>
<div class="form-group">
	 <label class="control-label" for="username">Gebruikersnaam *</label>
	 <input  type="text" class="form-control" name="username" 
	 		{if strlen($model->currentUser->username)>0}
	 			readonly
	 		{else}
	 			required minlength="2" 
	 		{/if}
	 		value="{$model->currentUser->username}"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="firstname">Voornaam *</label>
	 <input  type="text" class="form-control" name="firstname" 
	 		required value="{$model->currentUser->firstname}"/>
</div>		 
<div class="form-group">
	 <label class="control-label" for="lastname">Achternaam *</label>
	 <input  type="text" class="form-control" name="lastname" 
	 		required value="{$model->currentUser->lastname}"/>
</div>
<div class="form-group">
	 <label class="control-label" for="email">Email Adres *</label>
	 <input  type="text" class="form-control" name="email" 
	 		required value="{$model->currentUser->email}"/>		 
</div>
<div class="form-group">
	 <label class="control-label" for="telephone">Telefoon Nummer</label>
	 <input  type="text" class="form-control" name="telephone" 
	 		value="{$model->currentUser->telephone}"/>
</div>
<div class="form-group">
	 <label class="control-label" for="password">Wachtwoord *</label>
	 <input  type="password" class="form-control" name="password" 
	 		value="{$model->currentUser->password}"/>
</div>
<input type="submit" style="display:none" />
