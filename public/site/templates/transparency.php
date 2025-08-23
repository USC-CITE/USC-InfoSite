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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/transparency/transparency.css">
</head>

<main id="content" pw-prepend>
<div class="text-container">
    <p class="title">Transparency Reports</p>
    <p class="desc">Resolutions and financial reports of the University Student Council that are open for access.</p>
</div>
<div class="content-container">
    <?php foreach($page->transparency_category as $category):
        $category_name = $category->transparency_category_name;
        $category_icon = $_GET["category->transparency_category_icon_name"] ?? "resolutions-icon.svg";
        $category_reports = $category->transparency_report;?>

        <div class="category-container">
            <div class="category-header">
                <div class="icon-text">
                    <img class="icon" src="<?= $config->urls->templates ?>/assets/icons/<?= $category_icon ?>" alt="<?= $category_name ?> icon" draggable="false">
                    <p class="category-text"><?= $category_name ?></p>
                </div>
                <div class="arrow">
                    <img src="<?= $config->urls->templates ?>/assets/icons/arrow-right.svg" alt="arrow-right">
                </div>
            </div>
            <ul class="reports-container">
                <?php foreach($category_reports as $report): 
                    $report_title = $report->transparency_report_title;
                    $report_file = $report->transparency_report_files; ?>

                    <li><a class="reports-link" href="#"><?= $report_title ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
</main> 
