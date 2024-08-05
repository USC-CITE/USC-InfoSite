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
	<h1 class="main__heading">The Commission on Innovation and Tech Empowerment</h1>
	<div class="main__container main__container--about-USC">
		<img src="<?= $config->urls->templates ?>assets/logos/cite-logo-transparent.png" alt="" class="USC-logo">
		<div class="main__container--text-content">
			<h2 class="main__sub-heading">Our Mission</h2>
			<p class="main__text">is to <b>establish and improve digital accessibility</b> of student government services within West
				Visayas State University.</p>
			<br>
			<h2 class="main__sub-heading">How can we fulfill our mission?</h2>
			<p class="main__text">
				1. <b>Increase accessibility</b> by digitizing existing student government services.<br>
				2. <b>Improve efficiency</b> by streamlining existing student government workflows and processes.<br>
				3. <b>Enhance transparency</b> by providing real-time updates and giving public data access to students thereby promoting accountability.<br>
				4. <b>Promote innovation</b> through student government digitalization.
			</p>
		</div>
	</div>

	<div class="main__container main__container--USC-officers">
		<?php
		$cite_officers = $pages->findOne("template=officers, officers_heading='Commission on Innovation and Tech Empowerment'");
		?>
		<h2 class="main__sub-heading">Officers of the <br><?= $cite_officers->officers_heading->title ?></h2>
		<span class="main__emphasis">Academic Year <?= $cite_officers->officers_start_year ?> -
			<?= $cite_officers->officers_end_year ?></span>

		<div class="main__USC-officers">
			<div class="USC-officers__chairpersons">
				<?php
				$officer = $cite_officers->officer;
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
		<p class="main__committees">Contact the Commission</p>
		<p class="main__text">You may send us an email if you have questions, problems, or suggestions related to the USC
			InfoSite at <a href="milto:usc.cite@wvsu.edu.ph">usc.cite@wvsu.edu.ph</a></p>
	</div>
</main>