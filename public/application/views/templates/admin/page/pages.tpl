{include file="includes/header-nav.tpl"}
<div class="row">
	<div class="large-12 columns">
		<h1>Pages</h1>
		<a href="/page/create">New Page</a><br/><br/>
		{foreach $pages as $page}
			{$page.id}<br/>
			{$page.title}<br/>
			{$page.content}<br/>
			<a href="/page/edit/{$page.id}">Edit</a><br/><br/>
			<a href="/page/delete/{$page.id}">Delete</a><br/><br/>
			<a href="/page/view/{$page.id}">View</a><br/><br/>
		{/foreach}
	</div>
</div>
{include file="includes/footer-lower-nav.tpl"}