<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
    <div>
        The QUnit extension for the Yii framework powered by dizews
    </div>
</header>
<div>
    <?= $content ?>
</div>
<br/>
<footer class="footer">
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
