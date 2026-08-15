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
	<h1 class="main__heading">The Student Support Group</h1>
	<div class="main__container main__container--about-USC">
		<img src="<?= $config->urls->templates ?>assets/logos/USC-logo.png" alt="" class="USC-logo">
		<div class="main__container--text-content">
			<p class="main__text">The Student Support Group (SSG) is a vital part of the University Student Council's
				legislative machinery. <br><br>
				<b>Acting as the technical working group</b>, they are tasked with facilitating dialogues among students,
				organizations, and stakeholders to gather valuable insights and feedback. This information is then utilized to
				develop well-founded policy recommendations.
		</div>
	</div>

	<div class="main__container main__container--USC-officers">
		<?php
		$ssg_officers = $pages->findOne("template=officers, officers_heading='Student Support Group'");
		?>
		<h2 class="main__sub-heading">Officers of the WVSU <br><?= $ssg_officers->officers_heading->title ?></h2>
		<span class="main__emphasis">Academic Year <?= $ssg_officers->officers_start_year ?> -
			<?= $ssg_officers->officers_end_year ?></span>

		<div class="main__USC-officers">
			<div class="USC-officers__chairpersons">
				<?php
				$officer = $ssg_officers->officer;
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
	</div>
</main>