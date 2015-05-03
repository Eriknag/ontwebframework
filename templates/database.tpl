{extends file="site.tpl"}
{block name=title}DBS test{/block}
{block name=script}
<script src="js/database.js"></script>
{/block}
{block name=main}
<div class="panel panel-default">
	<!-- Default panel contents -->
	<div class="panel-heading">
		<h3>Database</h3>
	</div>
	<div class="panel-body">
		<form role="form" id="formQuery" >
			<input type="hidden" name="action" value="QUERY" />

			<div class="form-group">
				<textarea id="inpQuery" name="inpQuery" class="form-control" rows="10">SELECT * FROM user</textarea>
			</div>

			<div class="btn-group">
				<button type="button" id="btnQuery" class="btn btn-default btn-sm" >
					<i class="fa fa-bolt"> Query Uitvoeren</i>
				</button>
			</div>
		</form>
	</div>

	<div class="modal modal-wide fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detailsLabel" aria-hidden="true" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Sluiten</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Query resultaat</h4>
				</div>
				<div class="modal-body">
					<form name="detailsform" id="detailsform" role="form" action="" method="post">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Terug
					</button>
				</div>

			</div>
		</div>
	</div>
</div>
</div>
{/block}
