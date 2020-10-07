<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="table-layout">
<?= \Yii::$app->view->renderFile('@app/views/layouts/common/header.php'); ?>
<main class="page-main">
    <div class="main-container page-container">
        <?= $content; ?>
    </div>
</main>
<?= \Yii::$app->view->renderFile('@app/views/layouts/common/footer.php'); ?>
<?= \Yii::$app->view->renderFile('@app/views/layouts/common/modals.php'); ?>
</div>
<div class="overlay"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
