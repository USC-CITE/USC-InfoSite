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
  <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/organizations/org-info.css">
</head>

<main id="content" pw-prepend>
  <div class="main__container">
    <?php
      $image = $page->org_logo;
      if ($image) {
        echo "<img src=\"$image->url\" alt=\"$image->description\" class=\"org-logo\">";
      }
    ?>
    <div class="main__organization">
      <h2 class="org-name"><?= $page->org_name ?></h2>
      <?php if ($page->org_type->title === "University-Based"):?>
        <p class="org-type">University-Based Organization</p>
      <?php else: ?>
        <p class="org-type">College-Based Organization</p>
        <p class="org-type"><?= $page->org_college ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="main__container second-container">
    <div class="main__content">
      <?= $page->org_about ?>
    </div>

    <div class="main__info">
      <p>Adviser/s: 
        <?php
          $advisers = explode(",", $page->org_advisers);
          for ($i = 0; $i < count($advisers); $i++)
            echo "<br> <span>" . $advisers[$i] . "</span>\n";
        ?>
      </p>
      <p>Status: <br><span><?= $page->org_accred_status->title ?></span></p>
      
      <?php if (!empty($page->org_email)): ?>
        <div class="main__contact first-contact">
          <img src="<?= $config->urls->templates ?>assets/icons/mail.svg" alt="">
          <a href="mailto:fd@wvsu.edu.ph"> <?= $page->org_email ?> </a>
        </div>
      <?php endif; ?>
      
      <?php if (!empty($page->org_phone_num)): ?>
        <div class="main__contact">
          <img src="<?= $config->urls->templates ?>assets/icons/phone.svg" alt="">
          <p> <?= $page->org_phone_num ?> </p>
        </div>
      <?php endif; ?>

      <?php if (!empty($page->org_fb_link)): ?>
        <div class="main__contact third-contact">
          <img src="<?= $config->urls->templates ?>assets/icons/facebook.svg" alt="">
          <a href="<?= $page->org_fb_link ?>"><?= $page->org_fb_link ?></a>
        </div>
      <?php endif; ?>
      
      <?php if (!empty($page->org_insta_link)): ?>
        <div class="main__contact">
          <img src="<?= $config->urls->templates ?>assets/icons/instagram.svg" alt="">
          <a href="<?= $page->org_insta_link ?>"><?= $page->org_insta_link ?></a>
        </div>
      <?php endif; ?>

      <?php if (!empty($page->org_x_link)): ?>
        <div class="main__contact">
          <img src="<?= $config->urls->templates ?>assets/icons/twitter.svg" alt="">
          <a href="<?= $page->org_x_link ?>"><?= $page->org_x_link ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</main>