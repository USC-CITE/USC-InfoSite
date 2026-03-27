<?php
namespace ProcessWire;

// Optional main output file, called after rendering page’s template file. 
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
// 	
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute. 
// https://processwire.com/docs/front-end/output/markup-regions/

/** @var Page $page
 *  @var Pages $pages
 *  @var Config $config
 *  @var WireInput $input
 */


$home = $pages->get('/'); /** @var HomePage $home */

?>

<!DOCTYPE html>
<html lang="en">

<head id="head">
	<meta http-equiv="Referrer-Policy" content="no-referrer, strict-origin-when-cross-origin" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?= $page->title ?> <?= $input->pageNum > 1 ? "- Page " . $input->pageNum : "" ?></title>
	<meta name="description" content="<?=$page->page_desc?>" />
	<meta name="keywords" content="<?=$page->page_keywords?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="canonical" href="<?=$page->httpUrl?>"/>
	<link rel="alternate" href="<?=$page->httpUrl?>" hreflang="en-ph" />
	<link rel="alternate" href="<?=$page->httpUrl?>" hreflang="en-us" />
	<link rel="icon" type="image/png" href="<?= $config->urls->templates?>assets/logos/USC-logo.png">
	<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates; ?>styles/global.css" />
	<script src="<?= $config->urls->templates; ?>scripts/main.js" defer></script>
</head>

<body id="body">
	<dialog class="cookies-banner" data-js-cookies-dialog>
		<div class="cookies-banner__content">
			<h2 class="cookies-banner__title">Cookies & Privacy</h2>
			<p class="cookies-banner__text">
					The USC InfoSite uses “cookies” to track page visits, used browsers, and referring pages to analyze
					user patterns in accessing the website. This helps CITE determine what to add, remove, or modify
					within the website.
			</p>
			<p class="cookies-banner__text">
					You have full rights to accepting or denying our request to place “cookies” on your browser. We
					guarantee your information is not shared to advertisers and other third parties.
			</p>

			<div class="cookies-banner__actions">
					<button class="cookies-banner__btn cookies-banner__btn--deny" data-js-cookies-deny>
							Deny Cookies
					</button>
					<button class="cookies-banner__btn cookies-banner__btn--accept" data-js-cookies-accept>
							Accept Cookies
					</button>
			</div>
		</div>
	</dialog>
	<div class="skip-to-main">
		<a href="#content">Skip to main content</a>
	</div>
	<?php if ($page->editable()): ?>
		<div class="pw-edit-page">		
			<a href='<?php echo $page->editUrl(); ?>'>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_6627_2202)">
						<path d="M9.50975 0.273825C8.1372 0.371624 6.48524 0.831282 5.3921 1.42786C3.56858 2.42541 2.09309 3.97065 1.22054 5.79461C0.612693 7.066 0.347987 8.40096 0.40681 9.92664C0.450928 11.0171 0.588183 11.731 0.965634 12.8557C1.18622 13.5257 1.29407 13.7261 1.48524 13.8386C1.84799 14.0587 2.53916 13.8875 2.93622 13.4768L3.10289 13.3056L2.99995 12.7775C2.79897 11.7555 2.76956 11.4327 2.76956 10.3178C2.76956 9.37896 2.78426 9.13935 2.8823 8.67969C3.1274 7.45231 3.57838 6.48409 4.33328 5.54522C5.44112 4.16624 7.1176 3.17358 8.8823 2.85084C9.49995 2.73837 10.7009 2.73837 11.299 2.85573C12.8382 3.14913 14.1568 3.8484 15.2745 4.95842C16.1323 5.81906 16.6862 6.69925 17.0539 7.80439C17.3284 8.62101 17.3774 8.97309 17.3774 10.0733C17.3774 10.9438 17.3627 11.1442 17.2647 11.5843C17.0392 12.5917 16.5931 13.5941 16.0196 14.401C15.6323 14.9438 14.7499 15.7897 14.1715 16.176C12.7794 17.1051 11.1715 17.5305 9.51956 17.4083C8.58328 17.3349 8.27446 17.1785 8.14211 16.6993C8.06858 16.4401 8.06858 10.2787 8.14211 9.83373C8.31858 8.73837 9.3725 7.96576 10.4264 8.16136C11.0882 8.2836 11.5441 8.63079 11.8333 9.23715C11.9754 9.53544 11.9852 9.59901 11.9852 10.0782C11.9852 10.577 11.9803 10.6063 11.799 10.9682C11.5539 11.4621 11.245 11.775 10.7794 11.9951C10.3431 12.2005 10.0196 12.2738 9.53916 12.2738C9.30877 12.2738 9.16171 12.2983 9.1323 12.3374C9.04897 12.4352 8.90681 13.2909 8.93622 13.4816C8.99014 13.8142 9.24505 13.9658 9.97054 14.088C10.4313 14.1662 11.2548 14.1173 11.7156 13.9853C11.9166 13.9266 12.2794 13.7799 12.5245 13.6528C13.1323 13.3398 13.8088 12.6748 14.1078 12.0978C14.446 11.4327 14.5343 11.0513 14.5294 10.1956C14.5245 9.56967 14.5048 9.39363 14.397 8.98776C13.9117 7.16869 12.4411 5.8973 10.5637 5.66258C9.80877 5.57456 8.94112 5.72126 8.20093 6.06356C7.71073 6.29338 7.41662 6.48898 7.03916 6.84106C6.32348 7.52077 5.8823 8.32761 5.68132 9.31539C5.6274 9.58923 5.61269 10.3667 5.61269 13.2763C5.61269 17.3594 5.60779 17.286 5.99014 18.0489C6.42642 18.9242 7.22054 19.5061 8.32348 19.7604C8.8725 19.8924 10.549 19.9413 11.2598 19.8533C13.745 19.5501 16.0294 18.3129 17.6323 16.4107C18.8284 14.9927 19.6127 13.1687 19.848 11.2469C19.9264 10.6357 19.9117 9.33006 19.8235 8.69925C19.2794 4.78238 16.3431 1.54033 12.4509 0.562332C11.5931 0.342283 10.3137 0.220034 9.50975 0.273825Z" fill="#D21846"/>
					</g>
					<defs>
						<clipPath id="clip0_6627_2202">
							<rect width="20" height="20" fill="white"/>
						</clipPath>
					</defs>
				</svg>
				Edit this page
			</a>
		</div>

	<?php endif; ?>
	<header id="header">
		<div class="header__container">
			<div class="header__banner">
				<a href="/"><img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt=""
						class="header__logo" />
					<div class="header__text">
						<h1>West Visayas State University<br>
							<span>University Student Council</span>
						</h1>
					</div>
				</a>
			</div>
			<div class="header__btns">
				<div class="header__menu">
					<a href="/browse" data-js="menu_btn" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="info_menu services_menu">
						<p>Menu</p>
						<img alt="" src="<?= $config->urls->templates; ?>assets/icons/chevron_down.svg"
							data-js="menu_btn_icon" aria-hidden="true" />
					</a>
				</div>
				<div class="header__search">
					<a href="/search" data-js="search_btn" aria-label="Toggle search form" aria-expanded="false" aria-controls="search_form_container">
						<p class="sr_only">Search</p>
						<img alt="" src="<?= $config->urls->templates; ?>assets/icons/magnifier.svg" aria-hidden="true" />
					</a>
				</div>
			</div>
		</div>
	</header>
	<div class="container container--header_accord" id="header_accord" data-js="header_accord_container">
		<div class="header_accord" data-js="header_accord">
			<menu class="link_list link_list--info" data-js="info_menu" id="info_menu" aria-label="Information menu">
				<h1 class="link_list__hdng">Information</h1>
				<li><a href="/announcements">Announcements</a></li>
				<li><a href="/events">Events</a></li>
				<li><a href="/organizations">Organizations</a></li>
				<li><a href="/usc">About the USC</a></li>
				<li><a href="/usc/officers">Officers of the USC</a></li>
				<li><a href="/transparency-reports">Transparency Reports</a></li>
			</menu>
			<menu class="link_list link_list--srvcs" data-js="srvcs_menu" id="services_menu" aria-label="Services menu">
				<h1 class="link_list__hdng">Services</h1>
				<li><a href="/services/volunteer">Volunteer Opportunities</a></li>
				<li><a href="/services/education">Education and Training</a></li>
				<li><a href="/usc/contact">Contact the USC</a></li>
				<li><a href="/usc/cite">Contact the USC-CITE</a></li>
			</menu>
			<form class="search_form" id="search_form_container" action="/search/" method="post" data-js="search_form" aria-label="Search form">
				<label for="search" class="search_form__label">Search the USC InfoSite</label>
				<input id="search" class="search_form__input" type="text" name="search_query" />
				<button class="search_form__btn" type="submit">
					<img alt="" src="<?= $config->urls->templates; ?>assets/icons/magnifier.svg" /><span
						class="sr_only">Search the USC InfoSite</span>
				</button>
			</form>
		</div>
	</div>
	<main id="content">
    <iframe id="report_form" class="report_form" data-tally-src="https://tally.so/embed/n9QXe5?alignLeft=1&transparentBackground=1&dynamicHeight=1" loading="lazy" width="100%" height="537" frameborder="0" marginheight="0" marginwidth="0" title="Report a problem with this page"></iframe>
		<script>var d=document,w="https://tally.so/widgets/embed.js",v=function(){"undefined"!=typeof Tally?Tally.loadEmbeds():d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach((function(e){e.src=e.dataset.tallySrc}))};if("undefined"!=typeof Tally)v();else if(d.querySelector('script[src="'+w+'"]')==null){var s=d.createElement("script");s.src=w,s.onload=v,s.onerror=v,d.body.appendChild(s);}</script>

    <a href="#report_form" class="main__report"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" 
        style="fill: rgba(0, 0, 0, 1);">
        <path d="m14.303 6-3-2H6V2H4v20h2v-8h4.697l3 2H20V6z"></path></svg>
        Report a problem with this page
    </a>
	</main>
	<footer id="footer">
		<div class="footer__container">
			<menu class="footer__links">
				<li><a href="/browse">Browse Menu</a></li>
				<li><a href="/usc/contact">Contact the USC</a></li>
				<li>
					<a href="/usc/cite">Contact the USC-CITE</a>
				</li>
			</menu>
			<small class="footer__notice">All content within the USC InfoSite is licensed under the
				<a href="https://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0
					International.</a>
				<img alt="" src="<?= $config->urls->templates; ?>assets/icons/cc.svg" />
				<img alt="" src="<?= $config->urls->templates; ?>assets/icons/by.svg" />
			</small>
		</div>
	</footer>
</body>

</html>