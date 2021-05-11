<head>
	<% base_tag %>

	<meta charset="utf-8">
	<title><% if $MetaTitle %>$MetaTitle<% else %>$MenuTitle.XML | $SiteConfig.Title<% end_if %></title>
	$MetaTags(false)
	
	<meta property="og:type" content="website">
	<meta property="og:url" content="{$absoluteBaseURL}{$URLSegment}" />
	<meta property="og:title" content="$Title" />
	<% if $OgImage %>
		<meta property="og:image" content="$OgImage.AbsoluteURL" />
    	<% else %>
		<meta property="og:image" content="{$absoluteBaseHref}app/images/sample-logo.png" />
	<% end_if %>

	<link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="shortcut-icon" href="/favicon.ico" />

	<% include GoogleAnalytics %>

</head>
