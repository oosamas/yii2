<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<header>
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => ['navbar-nav', 'justify-content-end', 'ml-auto']],
        'items' => [
          // Home is the about us page (add research, awards, testimonials on home page)
          // about us, research, 10k+ reviews, assessments, social cause, signup, contact us
           ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
           ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
           ['label' => Yii::t('frontend', 'Research'), 'url' => ['/page/view', 'slug'=>'research']],
           ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
           ['label' => Yii::t('frontend', 'FAQs'), 'url' => ['/page/view', 'slug'=>'FAQs']],
           ['label' => Yii::t('frontend', 'Classes'), 'url' => ['/site/faqs']],
           ['label' => Yii::t('frontend', 'Store'), 'url' => ['/store/product']],
           ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
            ['label' => Yii::t('frontend', 'Textbooks'), 'url' => ['/user-management/auth/login'],
                'visible'=>Yii::$app->user->isGuest and Yii::$app->controller->id !="application-detail"],
            [
                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->username , //identity->getPublicIdentity(),
                'visible'=>!Yii::$app->user->isGuest,
                'items'=>[
                    [
                        'label' => Yii::t('frontend', 'Profile'),
                        'url' => ['/studentms/student/view']
                    ],
                   [
                       'label' => Yii::t('frontend', 'Settings'),
                       'url' => ['/user/default/index']
                   ],
                    [
                        'label' => Yii::t('frontend', 'Backend'),
                        'url' => Yii::getAlias('@backendUrl'),
                        'visible'=>Yii::$app->user->can('manager')
                    ],
                    [
                        'label' => Yii::t('frontend', 'Logout'),
                        'url' => ['/user-management/auth/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]
            ],
//            [
//                'label'=>Yii::t('frontend', 'Language'),
//                'items'=>array_map(function ($code) {
//                    return [
//                        'label' => Yii::$app->params['availableLocales'][$code],
//                        'url' => ['/site/set-locale', 'locale'=>$code],
//                        'active' => Yii::$app->language === $code
//                    ];
//                }, array_keys(Yii::$app->params['availableLocales']))
//            ]
        ]
    ]); ?>
    <?php NavBar::end(); ?>
</header>

<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="d-flex flex-row justify-content-between">
            <div>&copy; A+ Site <?php echo date('Y') ?></div>
            <div><?php echo Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endContent() ?>