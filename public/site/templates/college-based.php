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
  <div class="title"><?= $page->univ_college->title ?> Organizations</div>
  <div class="title-about">Listed below are the different organizations that operate under<br> the
    <strong><?= $page->univ_college->title ?></strong>.</div>
  <div class="universities-container">
    <?php 
      $college_orgs = $pages->find("template=org-info, org_college={$page->univ_college->title}, sort=org_name");
      foreach ($college_orgs as $college_org): ?>
        <a class="Organization" href="<?= $college_org->url ?>">
          <?php $image = $college_org->org_logo ?>
          <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
          <div class="org-name">
            <p><?=$college_org->org_name?></p>
          </div>
          <img class="arrow" src="<?= $config->urls->templates ?>/assets/icons/arrow-right.svg">
        </a>
    <?php endforeach; ?>
  </div>
</main>