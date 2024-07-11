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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/organizations/org-list.css">
</head>

<main id="content" pw-prepend>
    <div class="title">College-Based Organizations</div>
    <div class="title-about">Listed below are the different colleges under the university.<br> Choose one or the other
        to see the organizations under it.</div>
    <div class="universities-container">
        <a class="Organization" href="/organizations/college-based/caf">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/CAF-logo.png">
            <div class="org-name">
                <p>College of Agriculture and Forestry</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/cas">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/CAS-logo.png">
            <div class="org-name">
                <p>College of Arts and Sciences</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/cbm">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/CBM-logo.png">
            <div class="org-name">
                <p>College of Business and Management</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/coc">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/COC-logo.png">
            <div class="org-name">
                <p>College of Communication</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/cod">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/COD-logo.png">
            <div class="org-name">
                <p>College of Dentistry</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/coe">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/COE-logo.png">
            <div class="org-name">
                <p>College of Education</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/cict">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/CICT-logo.png">
            <div class="org-name">
                <p>College of ICT</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/col">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/COL-logo.png">
            <div class="org-name">
                <p>College of Law</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/com">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/COM-logo.png">
            <div class="org-name">
                <p>College of Medicine</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/con">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/CON-logo.png">
            <div class="org-name">
                <p>College of Nursing</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
        <a class="Organization" href="/organizations/college-based/pescar">
            <img class="org-logo" src="<?= $config->urls->templates ?>assets/logos/wvsu-colleges/PESCAR-logo.png">
            <div class="org-name">
                <p>College of PESCAR</p>
            </div>
            <img class="arrow" src="<?= $config->urls->templates ?>assets/icons/arrow-right.svg">
        </a>
    </div>
</main>