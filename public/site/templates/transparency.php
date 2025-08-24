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
    <script defer src="<?= $config->urls->templates ?>scripts/transparency.js"></script>
</head>

<main id="content" pw-prepend>
<?php 
    $category_id = (int) $input->get->category;
    $report_id = (int) $input->get->report;

    if($category_id):
        $category = $page->transparency_category->get("id=$category_id");
        $report = $category->transparency_report->get("id=$report_id");
?>
    <div class="text-container">
        <div class="report-header">
            <div>
                <p class="title">Transparency Report</p>
                <p class="desc">
                    <p class="report-title"><?= $report->transparency_report_title ?></p>
                    <div class="report-label">
                        Category: <b><?= $category->transparency_category_name ?></b>
                    </div>
                    <div class="report-label">
                        Date Passed: <b><?= $report->transparency_report_date_passed ?></b>
                    </div>
                </p>
            </div>
            <div class="back-link">
                <img class="back-icon" src="<?= $config->urls->templates ?>/assets/icons/blue-arrow-left.svg" alt="back icon" draggable="false">
                <a href="<?= $page->url ?>">Back to all reports</a>
            </div>
        </div>
    </div>
    <?php if($report->transparency_report_files->count): ?>
        <div class="file-viewer">
        </div>
    <?php else: ?>
        <div class="no-file-wrapper">
            <p class="no-file"> No files attached to this report</p>
        </div>
    <?php endif; ?>

<?php else: ?>
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

                <?php if(count($category_reports)==0): ?>
                    <div class="reports-container no-reports">No reports available</div>
                <?php else: ?>
                    <ul class="reports-container">
                        <?php foreach($category_reports as $report): 
                            $report_title = $report->transparency_report_title;
                            $report_file = $report->transparency_report_files; ?>

                            <li>
                                <a class="reports-link" href="<?= $page->url ?>?category=<?= $category->id ?>&report=<?= $report->id ?>">
                                    <?= $report_title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</main> 
