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
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">College of ICT Student Council</p>
        </a>
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">College of Education Student Council</p>
        </a>
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">SILAK Media</p>
        </a>
        <a class="organization bottom-left" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">ICON Publication</p>
        </a>
        <a class="organization bottom-right" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">College of Nursing Student Council</p>
        </a>
      </div>
      <a class="link link--center" href="">See the existing university colleges and organizations that operate under
        it.</a>
    </div>

    <div class="main__box">
      <h3 class="main__sub-heading">University-Based Organizations</h3>
      <div class="main__wrapper">
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">Forum Dimensions</p>
        </a>
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">LINK.exe</p>
        </a>
        <a class="organization" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">CYB:ORG</p>
        </a>
        <a class="organization bottom-left" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">WVSU-University Student Alliance</p>
        </a>
        <a class="organization bottom-right" href="">
          <img src="<?= $config->urls->templates; ?>assets/logos/USC-logo.png" alt="" class="org-logo">
          <p class="org-link">SAMASA-WVSU</p>
        </a>
      </div>
      <a class="link link--center" href="">See more organizations that operate on the university level.</a>
    </div>

    <div class="main__box last-box">
      <h3 class="main__sub-heading">Manage your organization</h3>
      <p class="text">Disclaimer: These are provided by the university’s Office of Student Affairs.</p>

      <a class="link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/wvsu-so-policy-guideline.pdf">Organization Policies and Guidelines</a>
      <a class="link" target="_blank" rel="noreferrer" href="https://wvsu.edu.ph/files/pdf/downloads/osa/WVSU-OSA-SOI-03-F01.pdf">Organization Application and Renewal Form</a>
      <a class="link" target="_blank" rel="noreferrer" href="">Add organization to WVSU-USC.org</a>
    </div>
</main>