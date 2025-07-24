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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/about/contact-usc.css">
</head>

<main class="main" id="content" pw-prepend>
	<div class="main__wrapper">
		<div class="main__container">
			<h1 class="main__heading">Contact the University Student Council</h1>
			<p class="main__text">If you are looking to question, create partnerships, or propose advocacies with us,
				don’t hesitate to email at
				<a href="mailto:<?= $page->org_email ?>"><?= $page->org_email ?></a>.
			</p>

			<div class="main__container main__container--contact-details main__container--contact-details--mobile">
				<p>Adviser/s: <span><?= $page->org_advisers ?></span></p>
				<?php if (!empty($page->org_phone)): ?>
					<div class="main__contact main__contact--first">
						<img src="<?= $config->urls->templates?>assets/icons/phone.svg" alt="">
						<a href="tel:<?= $page->org_phone ?>"> <?= $page->org_phone ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_fb_link)): ?>
					<div class="main__contact main__contact--second">
						<img src="<?= $config->urls->templates?>assets/icons/facebook.svg" alt="">
						<a href="<?= $page->org_fb_link ?>"><?= $page->org_fb_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_insta_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/instagram.svg" alt="">
						<a href="<?= $page->org_insta_link ?>"><?= $page->org_insta_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_x_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates ?>assets/icons/twitter.svg" alt="">
						<a href="<?= $page->org_x_link ?>"><?= $page->org_x_link ?></a>
					</div>
      	<?php endif; ?>
				<?php if (!empty($page->org_yt_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/youtube.svg" alt="">
						<a href="<?= $page->org_yt_link ?>"><?= $page->org_yt_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_other_links)): ?>
        <?php
          $links = explode(",", trim($page->org_other_links));
          foreach ($links as $link): ?>
          <div class="main__contact">
            <img src="<?= $config->urls->templates ?>assets/icons/iconmonstr-link-1.svg" alt="">
            <a href="<?= $link ?>"><?= $link ?></a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
 			</div>

			<h2 class="main__sub-heading">Official Address:</h2>
			<p class="main__details">2nd Floor, University Student Center</p>
			<p class="main__details">West Visayas State University</p>
			<p class="main__details">Luna Street, Lapaz, Iloilo City, Iloilo, Philippines</p>

			<iframe class="main__rectangle" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d777.882138020866!2d122.5623034793979!3d10.712852728349759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aee51661f8773b%3A0xb11ef2ee59e929c8!2sWVSU%20Hometel%2C%20Jose%20Aguilar%20Dr%2C%20La%20Paz%2C%20Iloilo%20City%2C%20Iloilo!5e0!3m2!1sen!2sph!4v1736390706003!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="main__container main__container--contact-details">
			<p>Adviser/s: <br><span><?= $page->org_advisers ?></span></p>
			<?php if (!empty($page->org_phone)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/phone.svg" alt="">
						<a href="tel:<?= $page->org_phone ?>"> <?= $page->org_phone ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_fb_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/facebook.svg" alt="">
						<a href="<?= $page->org_fb_link ?>"><?= $page->org_fb_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_insta_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/instagram.svg" alt="">
						<a href="<?= $page->org_insta_link ?>"><?= $page->org_insta_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_x_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates ?>assets/icons/twitter.svg" alt="">
						<a href="<?= $page->org_x_link ?>"><?= $page->org_x_link ?></a>
					</div>
      	<?php endif; ?>
				<?php if (!empty($page->org_yt_link)): ?>
					<div class="main__contact">
						<img src="<?= $config->urls->templates?>assets/icons/youtube.svg" alt="">
						<a href="<?= $page->org_yt_link ?>"><?= $page->org_yt_link ?></a>
					</div>
				<?php endif; ?>
				<?php if (!empty($page->org_other_links)): ?>
        <?php
          $links = explode(",", trim($page->org_other_links));
          foreach ($links as $link): ?>
          <div class="main__contact">
            <img src="<?= $config->urls->templates ?>assets/icons/iconmonstr-link-1.svg" alt="">
            <a href="<?= $link ?>"><?= $link ?></a>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
		</div>
	</div>
</main>