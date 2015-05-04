<div class="form-group">
	<table id="userstable" class="table table-striped table-hover">
		
		<tr>
			{foreach from=$resultFields item=field}
				<th>{$field}</th>
			{/foreach}
		</tr>
		
		{foreach from=$result item=row}
			<tr>
			{foreach from=$row item=value}
				<td class="resultrow">{if $value != NULL}{$value}{else}<i>null</i>{/if}</td>
			{/foreach}
			</tr>
		{/foreach}
		
	</table>
</div>
