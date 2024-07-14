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
  <div class="title">University-Based Organizations</div>
  <div class="title-about">Listed below are the different organizations that operate on the <br> university level.</div>
  <div class="universities-container">
    <?php 
      $univ_orgs = $pages->find("template=org-info, org_type='University-Based', sort=org_name");
      foreach ($univ_orgs as $univ_org): ?>
        <a class="Organization" href="<?= $univ_org->url ?>">
          <?php $image = $univ_org->org_logo ?>
          <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
          <div class="org-name">
            <p><?=$univ_org->org_name?></p>
          </div>
          <img class="arrow" src="<?= $config->urls->templates ?>/assets/icons/arrow-right.svg">
        </a>
    <?php endforeach; ?>
  </div>
</main>