<meta charset="UTF-8">
<title><?= $title ?></title>
<link href="../css/normalize.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script src="../js/form-validation.js"></script>
<script src="../js/viewed_lots.js"></script>

<?php if (isset($id)): ?>
    <meta name="lot-id" content="<?= htmlspecialchars($id) ?>">
<?php endif; ?>
