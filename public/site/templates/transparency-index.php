<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 *
 */

/**
 * Transparency is under Information
 * Index
 *  Category
 *      Report-AY
 *          Reports
 * 
 * Upload transparency_ategory_icon?
 * Subject? or just name? Test with councilors
 */
?>

<head id="head" pw-append>
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/transparency/transparency-index.css">
</head>

<main id="content" pw-prepend>
    <div class="text-container">
        <p class="title">Transparency Reports</p>
        <p class="desc">Minutes, resolutions, passed policies, and narrative reports of the University Student Council that are ready for access.
        </p>
    </div>

    <?php if (!$page->children()->count()): ?>
        <div class="status-empty">
           This is currently empty and will be populated soon. Come back later!
        </div>

    <?php else: ?>
        <div class="resolution-container">
            <?php foreach ($page->children() as $category):
                $category_name = $category->transparency_category_name;
                $category_icon = $category->transparency_category_icon; ?>

                <a class="resolution" href="<?=$category->url?>">
                    <div class="icon-text">
                        <img class="icon" src="<?=$category_icon->url?>" alt="">
                        <p class="resolution-text"><?= $category_name ?></p>
                    </div>
                    <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg" alt="">
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif ?>
</main>