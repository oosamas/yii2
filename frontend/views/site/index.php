<?php
/**
 * @var yii\web\View $this
 */


$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="container">
        <?php echo \common\widgets\DbCarousel::widget([
            'key' => 'index',
            'assetManager' => Yii::$app->getAssetManager(),
            'options' => [
                'class' => 'slide', // enables slide effect
            ],
        ]) ?>

        <div class="jumbotron">
            <h1>Catch up, Get Ahead, and Earn an A+</h1>

            <p class="lead">We are with you through out the entire journey! Structured and Proven Tutoring Program for Grades Kinder to 12.</p>

            <?php 
            echo \common\widgets\DbMenu::widget([
               'key'=>'frontend-index',
               'options'=>[
                   'tag'=>'p'
               ]
            ]) ?>

        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>About US</h2>

                <p><p>A+ Students, the tutoring company in the Greater Toronto Area (GTA), 
                  excels in teaching Math and English to students in kindergarten to grade 12 due to several key factors. First and foremost,
                   the tutors at A+ Students are highly qualified and experienced, ensuring that they bring a depth of knowledge and expertise to 
                   their teaching approach. The company is dedicated to personalized learning, tailoring their methods to meet the unique needs of 
                   each student, fostering a deep and comprehensive understanding of both Math and English concepts.</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>with us</h2>

                <p>A+ Students employs innovative teaching methods that engage students and make learning enjoyable, contributing to improved
                   comprehension and retention. The company's commitment to academic excellence is further demonstrated through its active
                    involvement in math and English contests, providing students with opportunities to apply their skills in real-world 
                    scenarios and be recognized for their achievements.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Where</h2>

                <p>Whether through in-person or online tutoring, A+ Students prioritizes a holistic approach to education, addressing not only
                   academic needs but also nurturing the overall development and confidence of students. Their success in helping students achieve
                    high grades and build self-confidence underscores their effectiveness in teaching Math and English across all grade levels.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>
<!-- <div class="row">
            <div class="col-lg-3">
                <h2>Heading</h2>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
            <div class="col-lg-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->

    <!-- </div> -->
</div>
