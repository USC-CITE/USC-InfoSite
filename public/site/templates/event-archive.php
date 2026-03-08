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
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/events/events-main.css">
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/no-content-placeholder.css">
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/pagination.css">
</head>

<main id="content" pw-before>
  <div class="events-main--container">
    <div class="title">Event Archives</div>
    <div class="sub-title">Where concluded events can be found.</div>
  </div>
</main>

<main id="content" pw-prepend>
  <div class="main-archive">
  <?php $events = $pages->find("template=event, archive_event=1, limit=10, sort=-event_start_date"); 
  if (count($events) < 1):
  ?>
    <div class="no-content-placeholder">
        <h2 class="no-content-placeholder__text">No archived events at the moment! Come back at another time.</h2>
    </div>
  <?php else: ?>
    <?php foreach($events as $event): ?>
      <div class="archive-card">
        <div class="archive-card--bg">
          <div class="flexed-event-card">
            <div class="event-archived">
              <a class="event-title" href="<?= $event->url ?>"><?= $event->event_name ?></a>
              <div class="event-date"><?= $event->event_start_date ?></div>
            </div>
            <div class="archived-button">
              <img class="archive_icon" alt="archiveIcon" src="<?= $config->urls->templates ?>assets/icons/archived-icon.svg" />
              <p class="archive-description">Archived</p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif;?>
  </div>
  <div class="pagination">
        <?php
            echo $events->renderPager(array(
                'numPageLinks' => 5,
                'nextItemLabel' => "Next",
                'previousItemLabel' => "Prev",
                'nextItemClass' => "button next-button",
                'previousItemClass' => "button back-button",
                'currentItemClass' => "list-item--active",
                'listMarkup' => "<ul class='page-list'>{out}</ul>",
                'itemMarkup' => "<li class='list-item {class}'>{out}</li>",
                'linkMarkup' => "<a class='page-link' href='{url}'>{out}</a>",
            ));
        ?>
  </div>
</main>