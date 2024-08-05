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
        <div class="title-container">
            <div class="title"> 
                Services
            </div>
            <div class="services-about">
                Volunteer opportunities and education programs.
            </div>
        </div>
        <div class="volunteer_education-container">
            <div class="volunteer-container">
                <a class="volunteer-content" href="services_volunteer.html">Volunteer Opportunities</a> 
            </div>
            <div class="education-container">
                <a class="education-content" href="services_education.html">Education Programs</a> 
            </div>
        </div>
    </div>
</main>