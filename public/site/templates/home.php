<?php namespace ProcessWire;

// Template file for “home” template used by the homepage
// ------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<head id="head" pw-append>
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/home.css">
</head>

<main id="content" pw-before>
	<section class="banner">
		<div class="container container--banner">
			<h1 class="banner__hdng">This is the <i>West Visayas State University</i></h1>
			<h2 class="banner__subhdng">University Student Council</h2>
			<p class="banner__desc">serving you with utmost transparency and equality</p>
			<form class="search_form search_form--home" action="/search/" method="post" data-js="search_form">
					<label for="search" class="sr_only">Search the USC Infosite</label>
					<input id="search" class="search_form__input" type="text" name="search_query"/>
					<button class="search_form__btn" type="submit">
							<img alt="" src="<?= $config->urls->templates ?>assets/icons/magnifier.svg" /><span class="sr_only">Search</span>
					</button>
			</form>
		</div>
	</section>
	<section class="acad_clndr">
			<img class="acad_clndr__logo" src="<?= $config->urls->templates ?>assets/logos/WVSU-Main-Logo.png" />
			<a class="acad_clndr__link" href=""
					>View the West Visayas State University Academic Calendar for 2024-2025!</a
			>
	</section>
</main>

<main id="content">
	<section class="events"></section>
	<section class="services">
		<h2 class="services__hdng">Services and other information</h2>
		<div class="service">
			<a class="service__name" href="/organizations">Student Organizations</a>
			<p class="service__desc">
				What are student organizations? How are they classified within the university?
			</p>
		</div>
		<div class="service">
			<a class="service__name" href="/usc">About the University Student Council</a>
			<p class="service__desc">What is the University Student Council? Who are the people elected behind it?</p>
		</div>
		<div class="service">
			<a class="service__name" href="/services/volunteer">Volunteer Opportunities</a>
			<p class="service__desc">Donation drives, community service, and other philantrophic work</p>
		</div>
		<div class="service">
			<a class="service__name" href="/services/education">Education Programs</a>
			<p class="service__desc">Seminars and workshops that are open for participation</p>
		</div>
		<a class="services__link" href="/services">Find more services of the University Student Council</a>
	</section>
	<section class="ancmts">
		<h2 class="ancmts__hdng">Latest Announcements</h2>
		<?php
        $ancmts = $pages->find("template=announcement, limit=4, sort=-ancmt_date");
        foreach($ancmts as $ancmt):
    	?>
        <div class="ancmt">
            <a class="ancmt__link" href="<?= $ancmt->url ?>"><?= $ancmt->ancmt_title ?></a>
            <p class="ancmt__author"><?= $ancmt->ancmt_from ?></p>
            <time datetime="<?= datetime("Y-m-d", $page->ancmt_date) ?>" class="ancmt__details"><?= $ancmt->ancmt_date ?> 
            <?php
                $image = $ancmt->ancmt_from_logo;
                if ($image) {
                    echo "<img src=\"$image->url\" alt=\"$image->description\" class=\"office__logo\"";
                }
            ?>
            </time>
        </div>
    	<?php endforeach; ?>
		<a class="ancmts__link" href="/announcements">See more announcements made by the University Student Council</a>
	</section>
</main>