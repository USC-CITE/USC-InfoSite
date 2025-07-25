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

<main id="content" pw-prepend>
	 <section class="banner">
					<div class="container container--banner">
							<h1 class="banner__hdng">Yours in the <span class="brush yellow">service</span> 
							of the <span class="brush blue">students</span>
							</h1>
					<form class="search_form search_form--home" action="/search/" method="post" data-js="search_form">
					<label for="search-input" class="sr_only">Search the USC Infosite</label>
					<input id="search-input" class="search_form__input" type="text" name="search_query"/>
					<button id="search-btn" class="search_form__btn search_form__button--home" type="submit">
							<img alt="" src="<?= $config->urls->templates ?>assets/icons/magnifier.svg" /><span class="sr_only">Search</span>
					</button>
			</form>
		</div>
	</section>
	<section class="acad_clndr">
			<a class="document-link" target="_blank" rel="noreferrer" href="<?= $config->urls->templates ?>assets/docs/WVSU-Calendar-for-AY-2025-2026.pdf">
			<svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
			</svg>
			<span class="document-link__text">View the 2025-2026 University Academic Calendar</span>
		</a>
	</section>
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
		<a class="events__link" href="/events"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find more events held by the University Student Council</a>
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
		<a class="services__link" href="/services"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find more services of the University Student Council</a>
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
		<a class="ancmts__link" href="/announcements"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find more announcements from WVSU and the University Student Council</a>
	</section>
</main>