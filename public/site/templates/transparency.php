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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/transparency/transparency.css">
</head>

<main id="content" pw-prepend>
<div class="text-container">
    <p class="title">Transparency Reports</p>
    <p class="desc">Resolutions and financial reports of the University Student Council that are open for access.</p>
</div>
<a href="/">
    <div class="resolution-container">
        <div class="icon-text">
            <img class="icon" src="<?= $config->urls->templates ?>/assets/icons/resolutions-icon.svg" alt="resolutions-icon">
        <p class="resolution-text">Resolutions</p>
    </div>
        <div class="arrow">
        <img src="/build/assets/icons/arrow-right.svg" alt="">
    </div>
</div>
</a>
<div class="reportbtn">
    <iframe id="report_form" class="report_form" data-tally-src="https://tally.so/embed/n9QXe5?alignLeft=1&hideTitle=1&transparentBackground=1&dynamicHeight=1" loading="lazy" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0" title="Report a problem with this page"></iframe><script>var d=document,w="https://tally.so/widgets/embed.js",v=function(){"undefined"!=typeof Tally?Tally.loadEmbeds():d.querySelectorAll("iframe[data-tally-src]:not([src])").forEach((function(e){e.src=e.dataset.tallySrc}))};if("undefined"!=typeof Tally)v();else if(d.querySelector('script[src="'+w+'"]')==null){var s=d.createElement("script");s.src=w,s.onload=v,s.onerror=v,d.body.appendChild(s);}</script>
<a href="#report_form" class="main__report"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" 
    style="fill: rgba(0, 0, 0, 1);">
    <path d="m14.303 6-3-2H6V2H4v20h2v-8h4.697l3 2H20V6z"></path></svg>
    Report a problem with this page
</a>
</div>
</main> 
