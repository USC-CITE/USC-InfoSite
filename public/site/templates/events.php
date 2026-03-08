<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 */

$page->of(false);

$events = $pages->find("template=event, sort=event_start_date");

foreach ($events as $event) {
  if ($event->archive_event) {
    $event_archive = $pages->get("template=event-archive");
    $event->setParent($event_archive);
  } else {
    $event->setParent($page);
  }
}

$page->save();

$events = $pages->find("template=event, archive_event=0, sort=event_start_date");

$page->of(true);
?>

<head id="head" pw-prepend>
	<meta name="robots" content="all">
</head>

<head id="head" pw-append>
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/events/events-main.css">
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/no-content-placeholder.css">
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
    <div class="no-content-placeholder">
      <h2 class="no-content-placeholder__text">No upcoming events at the moment! Come back at another time.</h2>
    </div>
  <?php else: ?>
    <div class="present-events">
      <?php
      $last_event_date;
      $last_event_year;
      foreach ($events as $event): ?>
        <?php if (empty($last_event_date) || ($last_event_date !== $event->event_start_date && $last_event_year !== datetime("Y", $event->event_start_date))): ?>
          <?php
          $last_event_date = $event->event_start_date;
          $last_event_year = datetime("Y", $event->event_start_date);
          ?>
          <div class="event-card event-card--year">
            <?= datetime("Y", $event->event_start_date); ?>
            <div class="event-card--border">
              <div class="event-status-date">
                <div class="event-status
                <?php
                $event_date = new \DateTime($event->event_start_date);
                $date_now = new \DateTime(date("Y-m-d"));
                $difference = $event_date->diff($date_now);

                if (!($date_now > $event_date)) {
                  if ($difference->days >= 1) {
                    echo "event-status--starts-on";
                  } else if ($difference->days === 0) {
                    echo "event-status--ongoing";
                  } 
                }
                ?>
                ">
                  <?php
                  if ($date_now > $event_date) {
                    echo "Event concluded";
                  } else if ($difference->days >= 1) {
                    echo "Event starts on";
                  } else if ($difference->days === 0) {
                    echo "Event ongoing";
                  }
                  ?>
                </div>
                <div class="event-date">
                  <?= $event_date->format("F") ?>
                  <span><?= $event_date->format("j") ?></span>
                </div>
              </div>
              <div class="event-title-card">
                <a class="event-title" href="<?= $event->url ?>"><?= $event->event_name; ?></a>
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
              <div class="event-status-date">
                <div class="event-status
                <?php
                $event_date = new \DateTime($event->event_start_date);
                $date_now = new \DateTime(date("Y-m-d"));
                $difference = $event_date->diff($date_now);

                if (!($date_now > $event_date)) {
                  if ($difference->days >= 1) {
                    echo "event-status--starts-on";
                  } else if ($difference->days === 0) {
                    echo "event-status--ongoing";
                  } 
                }
                ?>
                ">
                  <?php
                  if ($date_now > $event_date) {
                    echo "Event concluded";
                  } else if ($difference->days >= 1) {
                    echo "Event starts on";
                  } else if ($difference->days === 0) {
                    echo "Event ongoing";
                  }
                  ?>
                </div>
                <div class="event-date">
                  <?= $event_date->format("F") ?>
                  <span><?= $event_date->format("j") ?></span>
                </div>
              </div>
              <div class="event-title-card">
                <a class="event-title" href="<?= $event->url ?>"><?= $event->event_name; ?></a>
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
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  </div>
  
  <div class="event-archive">
    <a class="link link--center" href="/events/archive/"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Find archived events on a separate page</a>
  </div>
</main>