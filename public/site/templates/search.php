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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/search/search.css">
</head>

<main id="content" pw-prepend>
	<form class="search_form search_form--page" action="/search" method="post">
		<label for="search" class="search_form__label">Search the USC Infosite</label>
		<input id="search" class="search_form__input" type="text" />
		<button class="search_form__btn" type="submit">
			<img alt="" src="<?= $config->urls->templates ?>/assets/icons/magnifier.svg" /><span class="sr_only">Search the USC Infosite</span>
		</button>
	</form>
</main>