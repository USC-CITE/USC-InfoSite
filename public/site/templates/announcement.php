<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 * @var WireInput $input
 */
?>

<head id="head" pw-append>
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/announcements/announcement.css">
</head>

<main id="content" pw-prepend>
    <div class="main__container main__container--heading">
        <time datetime="<?= datetime("Y-m-d", $page->ancmt_date) ?>" class="date"><?= $page->ancmt_date ?></time>
        <h1 class="main__heading"><?= $page->ancmt_title ?></h1>
        <span class="office-details"><?= $page->ancmt_from ?> 
        <?php
            $image = $page->ancmt_from_logo;
            if ($image) {
                echo "<img src=\"$image->url\" alt=\"$image->description\"";
            }
        ?>
        </span>
    </div>
    <div class="main__container main__container--info">
        <?= $page->ancmt_content ?>
    </div>

    <p class="announcements-link">You've reached the end of this announcement. <a href="/announcements">Find more announcements.</a></p>
</main>