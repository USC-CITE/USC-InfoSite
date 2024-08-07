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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/services.css">
</head>

<main id="content" pw-prepend>
    <div class="services-container">
        <div class="title"> 
            Volunteer Opportunities
        </div>
        <div class="services-about">
            Donation drives, community service, and other philantrophic work.
        </div>

        <div class="volunteer-oppurtunities">
            <div class="opportunities-contents">
                No volunteer opportunities are open hence this section is empty. Come back at another time.
            </div>
        </div>
    </div>
</main>