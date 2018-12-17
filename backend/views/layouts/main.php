<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

\backend\assets\AdminLtePluginAsset::register($this);
backend\assets\AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(($this->title) ? $this->title : $this->context->pageHeader) ?></title>
    <script>
        var BASE_URL = '<?php echo Url::base(true) ?>';
        var CSRF_PARAM = '<?php echo Yii::$app->request->csrfParam?>';
        var CSRF_TOKEN = '<?php echo Yii::$app->request->getCsrfToken()?>';
    </script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <?= $this->render(
        'left.php',
        ['directoryAsset' => $directoryAsset]
    )
    ?>

    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>

</div>

<?php \yii\bootstrap\Modal::begin([
    'options' => ['id' => 'confirmation-modal'],
    'header' => '<h4 class="modal-title">Внимание!</h4>',
    'size' => 'modal-sm',
    //'toggleButton' => ['label' => 'click me'],
]) ?>
<div id="confirmation-message" class="text-center margin-bottom-20">Вы уверены?</div>
<div class="text-center">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Нет</button>
    <button type="button" class="btn btn-success" onclick="alertComponent.confirm()">Да</button>
</div>
<?php \yii\bootstrap\Modal::end()?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
