<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\helpers\Html;
use yii\helpers\Url;
 



\frontend\assets\FrontendAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <!-- OSB: maybe causing a symlink() error due to pathway being repeated in different files -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    
    <?php // $cssFile = Url::to('@web/css/style.css'); -->
        //echo Html::cssFile($cssFile, ['depends' => [\yii\bootstrap4\BootstrapAsset::class]]);
       
    ?> -->

   
    <?php echo Html::csrfMetaTags() ?>

   
    
    
    
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
    <?php echo $content ?>
<?php $this->endBody() ?>

<!-- <script src="js/jquery.min.js"></script>
<script src="/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- <script src="/web/js/custom.js"></script> -->

</body>
</html>
<?php $this->endPage() ?>
