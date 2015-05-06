{extends file="site.tpl"}
{block name=title}DBS test{/block}
{block name=main}
	{if $site->hasErrors()}
	{/if}
	{if $site->isLoggedIn()}
		<h1>Welkom {$site->account->getCurrentUser()->firstname} {{$site->account->getCurrentUser()->lastname}}</h1>
	{else}
		<h1>Welkom</h1>
		<p>Login om te beginnen
		</p>
	{/if}
			
{/block}
{extends file=$site->page.".tpl"}