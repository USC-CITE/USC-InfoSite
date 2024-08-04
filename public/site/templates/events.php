<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 */

$page->of(false);

$events = $pages->find("template=event, sort=-event_start_date"); 

foreach($events as $event) {
  if ($event->archive_event) {
    $event_archive = $pages->get("template=event-archive");
    $event->setParent($event_archive);
  } else {
    $event->setParent($page);
  }
}

$page->save();

$events = $pages->find("template=event, archive_event=0, sort=-event_start_date");

$page->of(true);
?>

<head id="head" pw-append>
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/events/events-main.css">
</head>

<main id="content" pw-before>
  <!--Events-Main Contents-->
  <div class="events-main--container">
    <div class="title">Events</div>
    <div class="sub-title">
      Organized by the organization and its partners.
    </div>
  </div>
</main>

<main id="content" pw-prepend>
  <?php if (count($events) < 1): ?>
    <!-- Missing events -->
    <div class="missing-events">
      <h2>No upcoming events at the moment!</h2>
      <h2>Come back at another time</h2>
    </div>
  <?php else: ?>
    <div class="present-events">
    <?php 
    $last_start_date;
    foreach ($events as $event): ?>
      <?php if (empty($last_start_date) || $last_start_date !== $event->event_start_date): ?>
        <?php $last_start_date = $event->event_start_date; ?>
        <div class="event-card event-card--date">
          <?= datetime("l, F j, Y", $event->event_start_date); ?>
          <div class="event-card--border">
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
      <?php else: ?>
        <div class="event-card">
          <div class="event-card--borderless">
            <div class="event-card-status">Event starts<span> today</span></div>
            <div class="event-title-card">
              <a class="event-title" href=""><?= $event->event_name; ?></a>
              <div class="event-date"><?= $event->event_start_date; ?></div>
            </div>
            <div class="event-where-when">
              <div class="event-location">
                <img class="location-vector" src="<?= $config->urls->templates ?>assets/icons/location-vector.svg" />
                <strong>Venue:</strong> <?= $event->event_venue_and_st[0]->event_venue; ?>
              </div>
              <div class="event-start-time">
                <img class="clock-vector" src="<?= $config->urls->templates ?>assets/icons/clock-vector.svg" />
                <strong>Start Time:</strong> <?= $event->event_venue_and_st[0]->event_venue_st; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    </div>
  <?php endif; ?>
  </div>

  <div class="event-archive">
    <a href="/events/archive">Look at our event archive</a> to see the countless events we have conducted over the years.
  </div>
</main>