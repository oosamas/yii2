<?php
// use yii\helpers\Html;
// use yii\bootstrap4\ActiveForm;
// use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var yii\bootstrap\ActiveForm $form
 * @var frontend\models\ContactForm $model
 */

//$this->title = Yii::t('frontend', 'Contact us');
?>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1><?php //echo Html::encode($this->title) ?></h1>
            <?php //$form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?php //echo $form->field($model, 'name') ?>
                <?php //echo $form->field($model, 'email')->input('email') ?>
                <?php //echo $form->field($model, 'subject') ?>
                <?php //echo $form->field($model, 'body')->textArea(['rows' => 6]) ?>
                <?php //echo $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    //'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                //]) ?>
                <div class="form-group">
                    <?php ///echo Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php //ActiveForm::end(); ?>
        </div>
    </div>

</div> -->
<?php
use yii\helpers\Html;

$this->title = Yii::t("frontend", "Contact");
?>
<!-- Inner Banner -->
<div class="inner_banner">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="content">
                     <h4>Home <i class="fa fa-chevron-right"></i> <?php echo Html::encode($this->title) ?></h4>
                     <h1>Contact</h1>
                    
                  </div>
               </div>
                
            </div>
         </div>
         <img src="/frontend/web/images/inner-banner2.webp" alt="" class="bg_image">
      </div>
<!-- Inner Banner -->


<section class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="contact_inner">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="contact_form_inner">
                                    <div class="contact_field">
                                        <h3>Contatc Us</h3>
                                        <p>Feel Free to contact us any time. We will get back to you as soon as we can!.</p>
                                        <input type="text" class="form-control form-group" placeholder="Name" />
                                        <input type="text" class="form-control form-group" placeholder="Email" />
                                        <textarea class="form-control form-group" placeholder="Message"></textarea>
                                        <button class="contact_form_submit">Send</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="right_conatct_social_icon d-flex align-items-end">
                                   <!-- <div class="socil_item_inner d-flex">
                                      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                   </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="contact_info_sec">
                            <h4>Contact Info</h4>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-headset"></i>
                                <a href="tel:905-460-48"><span>905-460-4834</span></a>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-envelope-open-text"></i>
                                <a href="mailto:admin@aplustudents.com"><span>admin@aplustudents.com</span></a>
                            </div>
                            <div class="d-flex info_single align-items-center">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>27 - 161 Bay St, Toronto, Ontario M5J 1C4</span>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="map_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="map_inner">
                        <h4>Find Us on Google Map</h4>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quo beatae quasi assumenda, expedita aliquam minima tenetur maiores neque incidunt repellat aut voluptas hic dolorem sequi ab porro, quia error.</p> -->
                        <div class="map_bind">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2887.0743972319524!2d-79.3813360234455!3d43.6466204528558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4cb2d1effffff%3A0xaba4c4c2d288d57!2s161%20Bay%20St.%2027%20th%20Floor%2C%20Toronto%2C%20ON%20M5J%202S1%2C%20Canada!5e0!3m2!1sen!2s!4v1708881079523!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



