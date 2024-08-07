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
  <link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/organizations/organizations.css">
</head>

<main id="content" pw-prepend>
<div class="main__container">
      <h1 class="main__heading1">Organizations</h1>
      <p class="main__text1">Various student organizations exist within the university and its external campuses. As a
        student, you have the opportunity to join any of these groups and participate in their activities.</p>
    </div>
    <div class="main__box">
      <h3 class="main__sub-heading">College-Based Organizations</h3>
      <div class="main__wrapper">
        <?php 
        $college_orgs = $pages->find("template=org-info, org_type='College-Based', limit=5, sort=random");
        foreach ($college_orgs as $college_org): ?>
          <a class="organization" href="<?= $college_org->url ?>">
            <?php $image = $college_org->org_logo ?>
            <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
            <div class="org-link">
              <p><?=$college_org->org_name?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <a class="link link--center" href="/organizations/college-based">See the existing university colleges and organizations that operate under
        it.</a>
    </div>
    <div class="main__box">
      <h3 class="main__sub-heading">University-Based Organizations</h3>
      <div class="main__wrapper">
          <?php 
        $univ_orgs = $pages->find("template=org-info, org_type='University-Based', limit=5, sort=random");
        foreach ($univ_orgs as $univ_org): ?>
          <a class="organization" href="<?= $univ_org->url ?>">
            <?php $image = $univ_org->org_logo ?>
            <img class="org-logo" src=<?= $image->url ?> alt=<?= $image->description ?>>
            <div class="org-link">
              <p><?=$univ_org->org_name?></p>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
      <a class="link link--center" href="/organizations/university-based">See more organizations that operate on the university level.</a>
    </div>

    <div class="main__box last-box">
      <h3 class="main__sub-heading">Manage your organization</h3>
      <p class="text">Disclaimer: These are provided by the university’s Office of Student Affairs.</p>

      <a class="link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/wvsu-so-policy-guideline.pdf">Organization Policies and Guidelines</a>
      <a class="link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/WVSU-OSA-SOI-03-F01.pdf">Organization Application and Renewal Form</a>
    </div>
</main>