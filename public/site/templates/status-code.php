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
	<?php if ($page->title === '503 Service Unavailable'): ?>
		<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/status_code/503.css">
	<?php else: ?>
		<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/status_code/status_code.css">
	<?php endif; ?>
</head>

<?php if ($page->title === '503 Service Unavailable'): ?>

	<body id="body" pw-replace>
		<main class="main">
			<img src="<?= $config->urls->templates ?>assets/logos/USC-logo.png" alt="" class="main__logo">
			<h1 class="main__heading"><?= $page->status_code_heading ?></h1>

			<article class="main__text">
				<p><?= $page->status_code_text ?>
					<span>Please come back in 24 hours.</span></p>
				<br>
				<p>If this page persists, please email <a href="mailto:usc.cite@wvsu.edu.ph" class="link">usc.cite@wvsu.edu.ph</a> for your concerns.
				</p>
			</article>

			<p class="main__status">Status Code: <?= $page->status_code ?></p>
		</main>
	</body>
<?php else: ?>
	<main id="content" pw-prepend>
		<h1 class="main__heading"><?= $page->status_code_heading ?></h1>
		<p class="main__text"><?= $page->status_code_text ?></p>
		<div class="main__links">
			<div>
				<p><a href="/">Go to <strong>Home Page</strong></a> </p>
			</div>
			<div>or</div>
			<div>
				<p><a href="/search"><strong>Search </strong>for a different page</a></p>
			</div>
		</div>
		<p class="main__status">Status Code: <?= $page->status_code ?></p>
	</main>
<?php endif; ?>