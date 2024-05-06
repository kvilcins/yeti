<nav class="nav">
    <ul class="nav__list">
        <?php foreach ($categories as $category): ?>
            <li class="nav__item">
                <a href="all-lots.html"><?= htmlspecialchars($category['name']) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<section class="lot-item container">
    <h2><?= htmlspecialchars($lot['title']) ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?= htmlspecialchars($lot['img']) ?>" width="730" height="548" alt="<?= htmlspecialchars($lot['title']) ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= htmlspecialchars($lot['category']) ?></span></p>
            <p class="lot-item__description"><?= htmlspecialchars($lot['description']) ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?= htmlspecialchars($lot['timer']) ?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?= htmlspecialchars(formatPrice($lot['price'])) ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?= htmlspecialchars(formatPrice($lot['min_bid'])) ?></span>
                    </div>
                </div>
                <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="12 000">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span><?= count($lot['bids']) ?></span>)</h3>
                <table class="history__list">
                    <?php foreach ($lot['bids'] as $bid): ?>
                        <tr class="history__item">
                            <td class="history__name"><?= htmlspecialchars($bid['name']) ?></td>
                            <td class="history__price"><?= htmlspecialchars($bid['price']) ?> р</td>
                            <td class="history__time"><?= htmlspecialchars($bid['time']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>