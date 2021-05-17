<!doctype html>
<html lang="en">
	<% include DocumentHead %>
	<body class="<% if $URLSegment == 'Security' %>Security<% else %>$ClassName.ShortName<% end_if %>">
		<header class="page-header">
			<div class="u-container">
				<a class="branding" href="{$BaseURL}">
					<img class="branding__image" src="{$ClientAssetsPath}/images/psdigital-logo.png" alt="{$SiteConfig.Title} logo" />
				</a>
				<% include Menu %>
			</div>
		</header>
		$SidebarElementalArea
		$Layout
		<% include Footer %>
	</body>
</html>
