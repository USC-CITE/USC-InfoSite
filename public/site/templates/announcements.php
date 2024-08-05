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
	<link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/announcements/announcements.css">
    <link rel="stylesheet" href="<?= $config->urls->templates ?>/styles/pagination.css">
</head>

<main id="content" pw-before>
  <section class="announcements">
        <h1 class="announcements__heading">Announcements</h1>
        <p>Including advisories from the various offices of the university.</p>
  </section>
</main>

<main id="content" pw-prepend>
  <div class="main__container">
    <?php
        $ancmts = $pages->find("template=announcement, limit=10, sort=-ancmt_date");
        foreach($ancmts as $ancmt):
    ?>
        <div class="main__box">
            <a class="link" href="<?= $ancmt->url ?>"><?= $ancmt->ancmt_title ?></a>
            <p class="author"><?= $ancmt->ancmt_from ?></p>
            <time datetime="<?= datetime("Y-m-d", $page->ancmt_date) ?>" class="details"><?= $ancmt->ancmt_date ?> 
            <?php
                $image = $ancmt->ancmt_from_logo;
                if ($image) {
                    echo "<img src=\"$image->url\" alt=\"$image->description\" class=\"office__logo\"";
                }
            ?>
            </time>
        </div>
    <?php endforeach; ?>

    <div class="pagination">
        <?php
            echo $ancmts->renderPager(array(
                'numPageLinks' => 5,
                'nextItemLabel' => "Next",
                'previousItemLabel' => "Prev",
                'nextItemClass' => "button next-button",
                'previousItemClass' => "button back-button",
                'currentItemClass' => "list-item--active",
                'listMarkup' => "<ul class='page-list'>{out}</ul>",
                'itemMarkup' => "<li class='list-item {class}'>{out}</li>",
                'linkMarkup' => "<a class='page-link' href='{url}'>{out}</a>",
            ));
        ?>
    </div>
  </div>
</main>