{include file="includes/header-nav.tpl"}
<div class="row">
	<div class="large-12 columns">
		{if $page != null}
			<h1>Edit: {$page.title}<br>
			<small>Page ID: {$page.id}</small></h1>
			<form action="/page/save/" method="post">
				<strong>Title:</strong><br>
				<input type="text" name="title" value="{$page.title}"><br><br>
				<strong>Content:</strong><br>
				<textarea type="text" name="content" >{$page.content}</textarea><br><br>
				<input type="hidden" name="id" value="{$page.id}">
				<input class="button" type="submit" value="Save">
				<a class="button alert" href="/page/delete/{$page.id}">Delete</a>
				<a class="button" href="/page/view/{$page.id}">View</a><br/><br/>
				<a class="button" href="/page">Back</a>
			</form>
		{else}
			<h1>New Page</h1>
			<form action="/page/save/" method="post">
				<strong>Title:</strong><br>
				<input type="text" name="title"><br><br>
				<strong>Content:</strong><br>
				<textarea type="text" name="content"></textarea><br><br>
				<input type="hidden" name="id">
				<input class="button" type="submit" value="Save">
				<a class="button" href="/page">Back</a>
			</form>
		{/if}
	</div>
</div>
{include file="includes/footer-lower-nav.tpl"}