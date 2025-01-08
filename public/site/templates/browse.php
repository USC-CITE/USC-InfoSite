<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 */
?>

<head id="head" pw-append>
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/browse.css">
</head>

<main id="content" pw-prepend>
	<p class="main__text">Browse existing services and information within the USC InfoSite.</p>
	<div class="main__container">
		<div class="main__information">
			<h3 class="main__heading">Information </h3>
			<div class="main__links">
				<a href="/announcements" class="main__items">Announcements</a>
				<a href="/events" class="main__items">Events</a>
				<a href="/organizations" class="main__items">Organizations</a>
				<a href="/usc" class="main__items">About the USC</a>
				<a href="/usc/officers" class="main__items">Officers of the USC</a>
			</div>
		</div>
		<div class="main__services">
			<h3 class="main__heading">Services </h3>
			<div class="main__links">
				<a href="/services/volunteer" class="main__items">Volunteer Opportunities</a>
				<a href="/services/education" class="main__items">Education and Training</a>
				<a href="/usc/contact" class="main__items">Contact the USC</a>
				<a href="/usc/cite" class="main__items">Contact the USC-CITE</a>
			</div>
		</div>
	</div>
</main>