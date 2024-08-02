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

	<div class="main__link-container">
		<p class="main__committees">Associated Committees</p>
		<a href="/usc/cite" class="main__link">USC-Commission on Innovation and Tech Empowerment</a>
		<a href="/usc/ssg" class="main__link">USC-Student Support Group</a>
	</div>
</main>