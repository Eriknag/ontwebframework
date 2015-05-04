{extends file="../../../templates/site.tpl"}
{block name=title}Ontweb - my_module - page1{/block}
{block name=main}
<h1>Dit is een voorbeeldpagina voor een module</h1>

<p>
	<br /><br />
	{$model->teststring}
	<br /><br />
	<a target="_blank" href="{$model->getTestLink()}">Dit is een link</a>
</p>
{/block}