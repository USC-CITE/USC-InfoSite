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
    <div class="resolution-container">
        <div class="icon-text">
            <img class="icon" src="<?= $config->urls->templates ?>/assets/icons/resolutions-icon.svg" alt="resolutions-icon">
        <p class="resolution-text">Resolutions</p>
        </div>
        <div class="arrow">
            <img src="/build/assets/icons/arrow-right.svg" alt="">
        </div>
    </div>
</div>
</main> 
