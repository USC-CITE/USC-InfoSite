<?php
namespace ProcessWire;

// Optional main output file, called after rendering page’s template file. 
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
// 	
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute. 
// https://processwire.com/docs/front-end/output/markup-regions/

/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */

$home = $pages->get('/'); /** @var HomePage $home */

?><!DOCTYPE html>
<html lang="en">

<head id="html-head">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $page->title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates; ?>styles/global.css" />
	<script src="<?= $config->urls->templates; ?>scripts/main.js"></script>
</head>

<body>
	<header>
		<div class="header__container">
			<div class="header__banner">
				<a href="/"><img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="USC-logo"
						class="header__logo" />
					<div class="header__text">
						<h1>West Visayas State University</h1>
						<h2>University Student Council</h2>
					</div>
				</a>
			</div>
			<div class="header__btns">
				<div class="header__menu">
					<a href="/browse" data-js="menu_btn">
						<p>Menu</p>
						<img alt="" src="<?= $config->urls->templates; ?>assets/icons/chevron_down.svg"
							data-js="menu_btn_icon" />
					</a>
				</div>
				<div class="header__search">
					<a href="/search" data-js="search_btn">
						<p class="sr_only">Search</p>
						<img alt="Search" src="<?= $config->urls->templates; ?>assets/icons/magnifier.svg" />
					</a>
				</div>
			</div>
		</div>
	</header>
	<div class="container container--header_accord">
		<div class="header_accord" data-js="header_accord">
			<menu class="link_list link_list--info" data-js="info_menu">
				<h1 class="link_list__hdng">Information:</h1>
				<li><a href="/announcements">Announcements</a></li>
				<li><a href="/events">Events</a></li>
				<li><a href="/organizations">Organizations</a></li>
				<li><a href="/usc">About the USC</a></li>
				<li><a href="/usc/officers">Officers of the USC</a></li>
			</menu>
			<menu class="link_list link_list--srvcs" data-js="srvcs_menu">
				<h1 class="link_list__hdng">Services:</h1>
				<li><a href="/services/volunteer">Volunteer Opportunities</a></li>
				<li><a href="/services/education">Education and Training</a></li>
				<li><a href="/usc/contact">Contact the USC</a></li>
				<li><a href="/usc-cite/contact">Contact the USC-CITE</a></li>
			</menu>
			<form class="search_form" action="/search" method="post" data-js="search_form">
				<label for="search" class="search_form__label">Search the USC Infosite</label>
				<input id="search" class="search_form__input" type="text" />
				<button class="search_form__btn" type="submit">
					<img alt="" src="<?= $config->urls->templates; ?>assets/icons/magnifier.svg" /><span
						class="sr_only">Search the USC Infosite</span>
				</button>
			</form>
		</div>
	</div>

	<div id="content">
		Default content
	</div>

	<?php if ($page->editable()): ?>
		<p><a href='<?php echo $page->editUrl(); ?>'>Edit this page</a></p>
	<?php endif; ?>
	<footer>
		<div class="footer__container">
			<menu class="footer__links">
				<li><a href="/browse">Browse Menu</a></li>
				<li><a href="/usc/contact">Contact the USC</a></li>
				<li>
					<a href="/usc-cite/contact">Contact the USC-CITE</a>
				</li>
			</menu>
			<small class="footer__notice">All content within the USC Infosite is licensed under the
				<a href="https://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0
					International.</a>
				<img alt="" src="<?= $config->urls->templates; ?>assets/icons/cc.svg" />
				<img alt="" src="<?= $config->urls->templates; ?>assets/icons/by.svg" />
			</small>
		</div>
	</footer>
</body>

</html>