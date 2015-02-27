{extends file="site.tpl"}
{block name=title}DBS test{/block}
{block name=main}
		<style>
			body {
				background-color : #002900;
			}
			#player {
				position:absolute;
				margin:0px;
				padding:0px;
				left:0px;
				width:50px;
				height:50px;
				border-radius: 25px;
				background: -webkit-linear-gradient(left top, #944DDB , #1F003D); /* For Safari 5.1 to 6.0 */
				background: -o-linear-gradient(bottom right, #944DDB, #1F003D); /* For Opera 11.1 to 12.0 */
				background: -moz-linear-gradient(bottom right, #944DDB, #1F003D); /* For Firefox 3.6 to 15 */
				background: linear-gradient(to bottom right, #944DDB , #1F003D); /* Standard syntax */
				box-shadow: 2px 2px 2px;
			}
		</style>
			<div id="player">			
			</div>
{/block}
{block name=script}
<script src="js/bubblegame.js"></script>
{/block}
