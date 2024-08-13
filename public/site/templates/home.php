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
			<a class="acad_clndr__link" href="<?= $config->urls->templates ?>assets/docs/WVSU-Calendar-for-AY-2024-2025.pdf"
					>View the West Visayas State University Academic Calendar for 2024-2025</a
			>
	</section>
	<section class="acad_clndr" style="background: #F6F6F6">
			<img class="acad_clndr__logo" src="<?= $config->urls->templates ?>assets/logos/cite-logo-transparent.png" />
			<a class="acad_clndr__link" style="color: #212121" href="<?= $config->urls->templates ?>assets/docs/Update_Org_Template-20240811.pdf"
					>Update your student organization within the USC InfoSite</a>
	</section>
</main>

<main id="content" pw-prepend>
	<section class="present_events">
	<?php 
		$events = $pages->find("template=event, archive_event=0, sort=event_start_date, limit=3");
		$event_num = 1;
    foreach ($events as $event): ?>
			<?php if ($event_num < 2): ?>
        <div class="event-card">
          <div class="event-card--borderless">
            <div class="event-card-status">
              <?php  
              $event_date = new \DateTime($event->event_start_date);
              $date_now = new \DateTime(date("Y-m-d"));
              $difference = $event_date->diff($date_now);
          
              if ($date_now > $event_date) {
                echo "Event has <span>already ended<span></span>";
              }
              else if ($difference->d > 1) {
                echo "<span>$difference->d days </span> till event starts";
              }
              else if ($difference->d === 1) {
                echo "Event starts <span>tomorrow</span>";
              }
              else if ($difference->d === 0) {
                echo "Event starts <span>today</span>";
              }
              ?>
            </div>
            <div class="event-title-card">
              <a class="event-title" href="<?= $event->url ?>"><?= $event->event_name; ?></a>
							<div class="event-date"><?= $event->event_start_date ?></div>
            </div>
            <div class="event-where-when">
              <div class="event-location">
                <img class="location-vector" src="<?= $config->urls->templates ?>assets/icons/location-vector.svg" />
                <strong>Venue:</strong> <?= $event->event_venues_and_st[0]->event_venue; ?>
              </div>
              <div class="event-start-time">
                <img class="clock-vector" src="<?= $config->urls->templates ?>assets/icons/clock-vector.svg" />
                <strong>Start Time:</strong> <?= $event->event_venues_and_st[0]->event_venue_st; ?>
              </div>
            </div>
          </div>
        </div>
		</div>
		<h2 class="events__hdng">Upcoming Events</h2>
		<?php $event_num += 1; ?>
		<?php else: ?>
		<div class="event-card">
				<div class="event-card--borderless">
						<div class="event-title-card event-title-card--home">
								<a class="event-title event-title--home" href="<?= $event->url ?>"><?= $event->event_name; ?></a>
								<div class="event-date"><?= $event->event_start_date ?></div>
						</div>
						<div class="event-where-when event-where-when--home">
						</div>
				</div>
				</div>
		</div>
		<?php endif; ?>
		<?php $event_num += 1; ?>
		<?php endforeach; ?>
		<a class="events__link" href="/events">Find more events held by the University Student Council and other organizations</a>
	</section>
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