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
    <link rel="stylesheet" href="<?= $config->urls->templates ?>styles/about/officers-usc.css">
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/about/usc-main.css">
	<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/pagination.css">
</head>

<main id="content" pw-prepend>
	<div class="main__container main__container--USC-officers">
		<h1 class="main__sub-heading">Officers of the WVSU <br><?= $page->officers_heading->title?></h1>
		<span class="main__emphasis">Academic Year <?= $page->officers_start_year?> - <?= $page->officers_end_year?></span>

		<div class="main__USC-officers">
			<div class="USC-officers__chairpersons">
			<?php 
				$officer = $page->officer;
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
			<?php 	endif;
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
			<?php 	endif;
				endforeach; ?>
			</div>
		</div>
	</div>
</main>