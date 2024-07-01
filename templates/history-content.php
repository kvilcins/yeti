<nav class="nav">
    <ul class="nav__list">
        <?php foreach ($categories as $category): ?>
            <li class="nav__item">
                <a href="all-lots.html"><?= htmlspecialchars($category['name']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<div class="container">
    <section class="history-content container">
        <h2>История просмотров</h2>
        <ul class="history-content__list">
            <?php foreach ($ads as $lotId => $ad): ?>
                <?php if (in_array($lotId, $viewedLots)): ?>
                    <li class="history-content__item">
                        <div class="history-content__image">
                            <img src="<?= htmlspecialchars($ad['img']) ?>" width="150" height="100" alt="<?= htmlspecialchars($ad['title']) ?>">
                        </div>
                        <div class="history-content__info">
                            <span class="history-content__category"><?= htmlspecialchars($ad['category']) ?></span>
                            <h4 class="history-content__title"><a href="lot.php?id=<?= $lotId ?>" class="text-link"><?= htmlspecialchars($ad['title']) ?></a></h4>
                            <span class="history-content__price"><?= htmlspecialchars(formatPrice($ad['price'])) ?></span>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>
</div>
