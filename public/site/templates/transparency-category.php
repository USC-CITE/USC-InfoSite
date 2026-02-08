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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/transparency/transparency-category.css">
</head>

<main id="content" class="main" pw-prepend>
    <h1 class="main__heading"><?=$page->title?></h1>
    <p class="main__text"><?=$page->transparency_category_desc?></p>
    <?php if (!$page->children()->count()): ?>
        <p class="status-unavailable">Content Unavailable</p>

    <?php else: ?>
        <ul class="main__list">
          <?php foreach ($page->children() as $category): 
            $url = $category->url;
            $acad_year = $category->transparency_category_ay;
            ?>
            <li class="main__list-item">
                <a href="<?=$url?>" class="main__link">
                    <span><?=$acad_year?></span>
                    
                    <!-- Button here -->
                    <img src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg" alt="arrow-right">
                </a>
            </li>
          <?php endforeach; ?>
        </ul>
    <?php endif ?>
</main>