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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/transparency/transparency-report.css">
</head>

<main id="content" pw-prepend>
    <h1 class="title"><?= $page->transparency_report_name ?></h1>
    <p class="date"><?= $page->transparency_report_date ?></p>

    <?php if (!empty($page->transparency_report_desc)): ?>
        <p class="desc"><?= $page->transparency_report_desc ?></p>
    <?php endif ?>

    <table class="multifile-table">
        <thead>
            <tr>
                <th>File Name</td>
                <th>Date Created</td>
            </tr>
        </thead>

    <?php if (empty($page->transparency_report_files)): ?>
        </table>
        <p class="fallback-missing">Content Missing</p>

    <?php else: ?>
        <tbody>
            <?php foreach ($page->transparency_report_files as $file): ?>
                <tr>
                    <td><a href="<?= $file->url ?>"><?= $file->name ?></a></td>
                    <td><?= date('m-d-Y', $file->created) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    <?php endif ?>
</main>