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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/about/usc-main.css">
</head>

<main class="main" id="content" pw-prepend>
	<h1 class="main__heading">The University Student Council</h1>
	<div class="main__container main__container--about-USC">
		<img src="<?=$config->urls->templates?>assets/logos/USC-logo.png" alt="" class="USC-logo">
		<div class="main__container--text-content">
			<p class="main__text">The University Student Council is the <b>supreme student organization of the West Visayas
			State University</b> herein referred to as the USC. <br><br> The USC shall have the jurisdiction over the entire
				student body of the West Visayas State University. The functions of the student councils should be such
				that through them students shall be able to exercise academic freedom and to apply academic means,
				participate in maintaining and improving the environment in which the freedom of each is not tempered by
				equality of all, and in the process develop their leadership potentials and values needed in
				nation-building.</p>

				<div class="document-box">
					<a class="document-link" target="_blank" rel="noreferrer" href="https://www.scribd.com/document/291922875/The-1996-Student-Council-Consttitution">
            <svg class="document-link__icon" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21.3056 3.75C29.0963 3.75 26.25 15 26.25 15C26.25 15 37.5 11.9062 37.5 19.6069V41.25H7.5V3.75H21.3056ZM22.8544 0H3.75V45H41.25V18.0263C41.25 13.5431 28.785 0 22.8544 0ZM31.875 24.375H26.9475V31.2863H28.6481V28.5262H31.4419V27.1538H28.6481V25.845H31.875V24.375ZM22.6875 24.375H19.6894V31.2863H22.6875C23.6944 31.2863 24.4894 30.9469 25.0538 30.2831C26.0944 29.0494 26.1544 26.4694 24.9375 25.2356C24.3787 24.6731 23.6025 24.375 22.6875 24.375ZM21.39 25.8431H22.32C23.2069 25.8431 23.8237 26.1675 24.0356 27.0506C24.1556 27.5513 24.18 28.3237 23.9963 28.8281C23.7563 29.4862 23.2819 29.8181 22.5825 29.8181H21.3881V25.8431H21.39ZM16.2525 24.375H13.125V31.2863H14.8256V28.8919H16.2525C17.4131 28.8919 18.2475 28.3725 18.5475 27.4613C18.7256 26.9156 18.7256 26.3419 18.5475 25.8019C18.2475 24.8944 17.4113 24.375 16.2525 24.375ZM14.8256 25.7475H15.8494C16.29 25.7475 16.725 25.8 16.9294 26.175C17.055 26.4056 17.055 26.8612 16.9294 27.0919C16.725 27.465 16.29 27.5175 15.8494 27.5175H14.8256V25.7475Z" fill="#21536C"/>
            </svg>
            <span class="document-link__text">View the 1996 Student Council Constitution</span>
          </a>
				</div>

				<div class="main__link-container">
					<h2 class="main__committees">Associated Committees</h2>
					<a class="link link--center" href="/organizations/usc/cite"><img src="<?= $config->urls->templates ?>assets/icons/arrow-right-with-bg.svg" alt="">Commission on Innovation and Tech Empowerment</a>
				</div>
		</div>
	</div>

	<div class="main__container main__container--USC-officers">
		<?php 
			$usc_officers = $pages->findOne("template=officers, officers_heading='University Student Council'");
		?>
		<h2 class="main__sub-heading">Officers of the WVSU <br><?= $usc_officers->officers_heading->title ?></h2>
		<span class="main__emphasis">Academic Year <?= $usc_officers->officers_start_year ?> -
			<?= $usc_officers->officers_end_year ?></span>

		<div class="main__USC-officers">
			<div class="USC-officers__chairpersons">
				<?php
				$officer = $usc_officers->officer;
				foreach ($officer as $ofcr):
					$position = $ofcr->officer_position;
					if ($position->title === "Chairperson" || $position->title === "Vice Chairperson"): ?>
						<div class="main__container-card">
							<?php
							$image = $ofcr->officer_profile;
							if ($image) {
								echo "<img src=\"$image->url\" alt=\"\"
										class=\"container-card__officer-image\">";
							}
							?>
							<p class="container-card__officer-name"><?= $ofcr->officer_name ?></p>
							<p class="container-card__officer-position"><?= $position->title ?></p>
						</div>
					<?php endif;
				endforeach; ?>
			</div>

			<div class="USC-officers__councils">
				<?php
				foreach ($officer as $ofcr):
					$position = $ofcr->officer_position;
					if ($position->title !== "Chairperson" && $position->title !== "Vice Chairperson"): ?>
						<div class="main__container-card">
							<?php
							$image = $ofcr->officer_profile;
							if ($image) {
								echo "<img src=\"$image->url\" alt=\"\"
										class=\"container-card__officer-image\">";
							}
							?>
							<p class="container-card__officer-name"><?= $ofcr->officer_name ?></p>
							<p class="container-card__officer-position"><?= $position->title ?></p>
						</div>
					<?php endif;
				endforeach; ?>
			</div>
		</div>
	</div>
</main>