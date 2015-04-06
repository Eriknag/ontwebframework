{extends file="site.tpl"}
{block name=title}DBS test{/block}
{block name=main}
	{if $site->hasErrors()}
	{/if}
	<h1>Welkom</h1>
	<p>Hier komt een library waarmee 1e jaars studenten ONTWEB een webapplicatie kunnen ontwikkelen
	</p>
	<p>Dit framework is gemaakt door Erik Nagelkerke.
	</p>		
{/block}
{extends file=$site->page.".tpl"}