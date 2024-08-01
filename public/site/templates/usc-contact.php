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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/about/contact-usc.css">
</head>

<main class="main" id="content" pw-prepend>
	<div class="main__wrapper">
		<div class="main__container">
			<h1 class="main__heading">Contact the University Student Council</h1>
			<p class="main__text">If you are looking to question, create partnerships, or propose advocacies with us,
				don’t hesitate to email at
				<a href="mailto:<?= $page->email ?>"><?= $page->email ?></a>
			</p>

			<div class="main__container main__container--contact-details main__container--contact-details--mobile">
				<p>Adviser/s: <span><?= $page->org_advisers ?></span></p>
				<div class="main__contact main__contact--first">
					<img src="<?= $config->urls->templates?>assets/icons/phone.svg" alt="">
					<a href="tel:<?= $page->org_phone ?>"> <?= $page->org_phone ?></a>
				</div>
				<div class="main__contact main__contact--second">
					<img src="<?= $config->urls->templates?>assets/icons/facebook.svg" alt="">
					<a href="<?= $page->org_fb_link ?>"><?= $page->org_fb_link ?></a>
				</div>
				<div class="main__contact">
					<img src="<?= $config->urls->templates?>assets/icons/youtube.svg" alt="">
					<a href="<?= $page->org_yt_link ?>"><?= $page->org_yt_link ?></a>
				</div>
			</div>

			<h2 class="main__sub-heading">Official Address:</h2>
			<p class="main__details">2nd Floor, University Student Center</p>
			<p class="main__details">West Visayas State University</p>
			<p class="main__details">Luna Street, Lapaz, Iloilo City, Iloilo, Philippines</p>

			<div class="main__rectangle"></div>
		</div>
		<div class="main__container main__container--contact-details">
			<p>Adviser/s: <br><span><?= $page->org_advisers ?></span></p>
			<div class="main__contact main__contact--first">
				<img src="<?= $config->urls->templates?>assets/icons/phone.svg" alt="">
				<a href="tel:<?= $page->org_phone ?>"><?= $page->org_phone ?></a>
			</div>
			<div class="main__contact main__contact--second">
				<img src="<?= $config->urls->templates?>assets/icons/facebook.svg" alt="">
				<a href="<?= $page->org_fb_link ?>"><?= $page->org_fb_link ?></a>
			</div>
			<div class="main__contact">
				<img src="<?= $config->urls->templates?>assets/icons/youtube.svg" alt="">
				<a href="<?= $page->org_yt_link ?>"><?= $page->org_yt_link ?></a>
			</div>
		</div>
	</div>
</main>