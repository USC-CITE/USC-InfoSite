<?php
namespace ProcessWire;

/**
 * @var Page $page
 * @var Pages $pages
 * @var Config $config
 * 
 */

if ((filter_has_var(INPUT_POST, "search_query"))) {
	$post_sq = filter_input(INPUT_POST, "search_query", FILTER_SANITIZE_STRING);
	if (empty($post_sq)) {
		session_unset();
	} else {
		$_SESSION["search_query"] = $post_sq;
	}
	header("Location: /search/", 302);
}

if (!empty($_SESSION["search_query"])) {
	$sq = $_SESSION["search_query"];
	$results = $pages->find('title|page_desc|page_keywords|search_index%=' . "{$sq}" . ', limit=25' . 'sort=title');
}

?>

<head id="head" pw-append>
	<?php if (!empty($sq)): ?>
		<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/search/search-results.css">
		<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/no-content-placeholder.css">
	<?php else: ?>
		<link rel="stylesheet" href="<?= $config->urls->templates ?>styles/search/search.css">
	<?php endif; ?>
</head>

<main id="content" pw-prepend>

	<?php if (!empty($sq)): ?>
			<section class="search">
					<form class="search-form" action="/search/" method="post">
							<label class="search-form__label" for="search-input"
									>Search the USC InfoSite</label
							>
							<input
									class="search-form__input"
									id="search-input"
									name="search_query"
									type="search" value="<?=$sq?>"/>
							<button class="search-form__btn" type="submit">
									<img alt="" src="<?=$config->urls->templates ?>assets/icons/magnifier.svg" /><span
											>Search the USC InfoSite</span
									>
							</button>
							<Yo class="search-form__matches">
								<?php if(count($results) > 1): ?>
									Your search matched <?= count($results) ?> results
								<?php elseif(count($results) === 1): ?>
									Your search matched 1 result
								<?php else: ?>
									Your search matched 0 results
								<?php endif; ?>
							</p>
					</form>
			</section>
	<?php else: ?>
		<form class="search_form search_form--page" action="/search/" method="post">
			<label for="search" class="search_form__label">Search the USC InfoSite</label>
			<input id="search" class="search_form__input" name="search_query" type="text" />
			<button class="search_form__btn" type="submit">
				<img alt="" src="<?= $config->urls->templates ?>/assets/icons/magnifier.svg" /><span class="sr_only">Search the USC Infosite</span>
			</button>
		</form>
	<?php endif; ?>
	
	<?php if (!empty($sq) && (!empty($results))): ?>
		<section class="search-results">
		<?php if (count($results) < 1):?>
			<div class="no-content-placeholder">
					<h2 class="no-content-placeholder__text">There are no results that match your search. Check your spelling or try different keywords.</h2>
			</div>
		<?php else: ?>
			<?php foreach($results as $result): ?>
				<a class="search-result" href="<?=$result->url?>">
					<span class="search-result__title"><?=$result->title?></span>
					<span class="search-result__desc"
							><?=$result->page_desc?>
					</span>
					<img
							class="search-result__chevron"
							alt=""
							src="<?=$config->urls->templates?>assets/icons/chevron_link.svg" />
				</a>
			<?php endforeach; ?>
		<?php endif; ?>
		</section>
	<?php endif; ?>
</main>