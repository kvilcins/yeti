<nav class="nav">
    <ul class="nav__list">
        <?php foreach ($categories as $category): ?>
            <li class="nav__item">
                <a href="all-lots.html"><?= htmlspecialchars($category['name']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="lots container">
    
    <div class="lots__header">
        <h2>История просмотров</h2>
    </div>
    
    <ul class="lots__list">
        <?php foreach ($ads as $lotId => $ad): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= htmlspecialchars($ad['img']) ?>" width="150" height="100" alt="<?= htmlspecialchars($ad['title']) ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= htmlspecialchars($ad['category']) ?></span>
                    <h4 class="lot__title"><a href="lot.php?id=<?= $lotId ?>" class="text-link"><?= htmlspecialchars($ad['title']) ?></a></h4>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= htmlspecialchars(formatPrice($ad['price'])) ?></span>
                        </div>
                        <div class="lot__timer timer"><?= time_to_midnight(); ?></div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
