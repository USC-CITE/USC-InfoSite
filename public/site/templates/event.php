<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 * @var Pageimage $image
 * 
 */

$page->of(false);

if ($page->archive_event) {
  $event_archive = $pages->get("template=event-archive");
  $page->setParent($event_archive);
} else {
  $events = $pages->get("template=events");
  $page->setParent($events);
}

$page->save();
$page->of(true);
?>


<head id="head" pw-append>
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/events/events-main.css">
</head>

<main id="content" pw-before>
  <div class="events--container <?php if ($page->archive_event) 
    echo "events--archived"; ?>">
    <div class="title-date"><?= $page->event_start_date ?></div>
    <div class="title-event">
      <?= $page->event_name ?>
    </div>
  </div>
</main>

<main id="content" pw-prepend>
  <div class="events-about-container">
    <?= $page->event_about ?>
  </div>

  <div class="line-border"></div>

  <div class="events-details-container">
    <div class="overview-title">Event Venue and Time</div>
    <?php foreach ($page->event_venues_and_st as $event): ?>
      <div class="event-location">
        <img class="location-vector" src="<?= $config->urls->templates ?>assets/icons/location-vector.svg" />
        <strong>Venue:</strong> <?= $event->event_venue ?>
      </div>
      <div class="event-start-time">
        <img class="clock-vector" src="<?= $config->urls->templates ?>assets/icons/clock-vector.svg" />
        <strong>Start Time:</strong> <?= $event->event_venue_st ?>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="line-border"></div>

  <div class="events-details-container">
    <div class="overview-title">Event Schedule</div>
    <div class="activities-container">
      <?php
      foreach ($page->event_schedule as $image) {
        echo "<a class='activity-1' href='$image->url'><img src='$image->url' alt='$image->description' loading='lazy'></a>";
      }
      ?>
    </div>
  </div>

  <div class="line-border"></div>

  <div class="events-details-container">
    <div class="overview-title">Event Activities</div>
    <div class="activities-container">
      <?php
      foreach ($page->event_activities as $image) {
        echo "<a class='activity-1' href='$image->url'><img src='$image->url' alt='$image->description' loading='lazy'></a>";
      }
      ?>
    </div>
    <?php if ($page->archive_event): ?>
      <div class="back-to-archives">
        Back to the
        <a class="back-to-archives-link" href="/events/archive">Event Archives</a>
      </div>
    <?php else: ?>
      <div class="back-to-events">Back to the <a class="back-to-events-link" href="/events">Events Page</a></div>
    <?php endif; ?>
  </div>
</main>