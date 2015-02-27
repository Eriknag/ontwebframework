{extends file="site.tpl"}
{block name=title}Contact{/block}
{block name=script}<script src="js/validate.js"></script>{/block}
{block name=main}
	<form name="input" 
	  id="contactform"
	  class="form-horizontal"
	  action="" 
	  method="post"
	  role="form">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading"><h3>Contact</h3></div>
			<div class="panel-body">
				<p>Vul dit formulier in om een bericht te sturen:</p>
				<input type="hidden" name="send" value="true"/>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="first_name">Voornaam *</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="first_name" name="first_name" maxlength="50" size="30">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="last_name">Achternaam *</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="last_name" name="last_name" maxlength="50" size="30">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="email">Email Adres *</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="email" name="email" maxlength="80" size="30">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="telephone">Telefoonnummer</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="telephone" name="telephone" maxlength="30" size="30">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="comments">Bericht *</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="comments" name="comments" maxlength="1000" cols="25" rows="6"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label" for="captcha_code">Beveiligingscode *</label>
					<div class="col-sm-4">
						<input class="form-control" type="text" name="captcha_code" size="10" maxlength="6" />
						<a href="#" onclick="document.getElementById('captcha').src = 'lib/securimage/securimage_show.php?' + Math.random(); return false">[ Wijzig captcha ]</a>
					</div>
					<div class="col-sm-4">
						<img id="captcha" src="lib/securimage/securimage_show.php" alt="CAPTCHA Image" />
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary">Verstuur</button>
			</div>
		</div>
	</form>
{/block}