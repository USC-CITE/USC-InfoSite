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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/transparency/transparency-report-AY.css">
</head>

<main id="content" class="main" pw-prepend>
    <h1 class="main__heading"><?=$page->title?></h1>
    <p class="main__text">Listed below are the <?=$page->parent()->parent()->transparency_category_name?> passed by the <?=$page->transparency_category_ay?> University Student Council.</p>
    <?php 
    $last_report_year;
    $count = 1;
    foreach ($page->children("sort=event_start_date") as $report):?>
      <?php $count += 1 ?>
      <?php if (empty($last_report_year) || $last_report_year !== datetime("Y", $report->transparency_report_date)): ?>
        <?php 
          $count = 1; 
          $last_report_year = datetime("Y", $report->transparency_report_date);
        ?>
        <h3 class="main__sub-heading"><?=$last_report_year?></h3>
        <ol class="main__list">
            <li class="main__list-item">
                <span><?=$count?></span><a href="<?=$report->url?>"><?=$report->transparency_report_subject?></a>
            </li>
      <?php else: ?>
            <li class="main__list-item">
                <span><?=$count?></span><a href="<?=$report->url?>"><?=$report->transparency_report_subject?></a>
            </li>
      <?php endif; ?>
        </ol>
    <?php endforeach; ?>
</main>