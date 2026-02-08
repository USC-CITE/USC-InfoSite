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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/zoom.css">

    <script src="<?= $config->urls->templates ?>scripts/zoom.js" defer></script>
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
        <?php 
        $content = $page->ancmt_content;
        $srcs;
        preg_match_all("/(class=\"[\w\d\.-]*\" )?src=\".*\"/", $content, $srcs); 
        $srcs = $srcs[0];

        foreach ($srcs as $src) {
        $content = preg_replace("/<img (class=\".*\" )?src=\".*\"[^data-js]*>/", "<img $src data-js=image>", $content, limit: 1);
        }
        
        echo $content;
        ?>
    </div>

    <p class="announcements-link">You've reached the end of this announcement. <a href="/announcements">Find more announcements.</a></p>
</main>