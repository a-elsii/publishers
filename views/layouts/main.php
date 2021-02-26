<?php

/* @var $this yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="modal fade popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="popup__title">
        Sign Up and Get a FREE Bonus
    </div>
    <div class="popup__mainBlock">
        <div class="popup__leftBlock">
            SEO Checklist  «How to Build  Profitable &  Successful Website»
        </div>
        <div class="popup__rightBlock">
            <input type="text" placeholder="Your Email" class="popup__emailInput">
            <a href="javascript:void(0);" class="popup__linkSignUp" id="popupSignUp">Sign Up</a>
            <div class="popup__social">
                <div class="popup__socialLeft"></div>
                <div class="popup__socialRight"></div>
            </div>
        </div>
    </div>
    <div class="popup__blockTerms">
        <span class="popup__termText">By signing up, you agree to our <a href="javascript:void(0);" class="popup__termLinks">Terms and Conditions</a> and
            <a href="javascript:void(0);" class="popup__termLinks">Privacy</a>
        </span>
    </div>
</div>
<div class="wrapper">
    <div class="blockIconOpen">
        <i class="fa fa-bars toggleMenu" aria-hidden="true"></i>
    </div>
    <div class="header">
        <div class="block-center">
            <div class="header__top">
                <div class="header__logo">
                <span class="header__logoText">
                    Adsy
                </span>
                </div>
                <div class="nav">
                    <ul class="nav__items">
                        <li class="nav__item">
                            <a href="javascript:void(0)" class="nav__link">Solutions</a>
                            <ul class="submenu">
                                <li class="submenu__item">
                                    <a href="javascript:void(0)" class="submenu__link">For buyers</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="javascript:void(0)" class="submenu__link">For publishers</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="javascript:void(0)" class="submenu__link">Managed services</a>
                                </li>
                                <li class="submenu__item">
                                    <a href="javascript:void(0)" class="submenu__link">Referral program</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a href="javascript:void(0)" class="nav__link">Blog</a>
                        </li>
                        <li class="nav__item">
                            <a href="javascript:void(0)" class="nav__link">FAQ</a>
                        </li>
                        <li class="nav__item">
                            <a href="javascript:void(0)" class="nav__link">Contact Us</a>
                        </li>
                    </ul>
                    <div class="nav__login">
                        <a href="javascript:void(0);" class="nav__button show_popup">Sign In</a>
                        <a href="javascript:void(0);" class="nav__button show_popup">Login In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $content; ?>
    <div class="footer">
        <img src="/images/footer-image.png" class="footerImageLeft" alt="footer_image" title="footer_image">
        <div class="block-center">
            <div class="footer__mainBlock">
                <div class="footer__mainBlockItem">
                    <div class="footer__title">
                        Solution
                    </div>
                    <div class="footer__blockLinks">
                        <div class="footer__firstLinks">
                            <a href="javascript:void(0);" class="footer__link">For buyers</a>
                            <a href="javascript:void(0);" class="footer__link">For publishers </a>
                        </div>
                        <div class="footer__secondLinks">
                            <a href="javascript:void(0);" class="footer__link">Managed services</a>
                            <a href="javascript:void(0);" class="footer__link">Referral program</a>
                        </div>
                    </div>
                </div>
                <div class="footer__mainBlockItem">
                    <div class="footer__title">
                        Resources
                    </div>
                    <div class="footer__blockLinks">
                        <div class="footer__firstLinks">
                            <a href="javascript:void(0);" class="footer__link">FAQ</a>
                            <a href="javascript:void(0);" class="footer__link">Blog</a>
                        </div>
                        <div class="footer__secondLinks">
                            <a href="javascript:void(0);" class="footer__link">Terms and Conditions</a>
                            <a href="javascript:void(0);" class="footer__link">Privacy Policy & GDPR </a>
                        </div>
                    </div>
                </div>
                <div class="footer__mainBlockItem">
                    <div class="footer__title">
                        Get in touch
                    </div>
                    <div class="footer__blockLinks">
                        <div class="footer__firstLinks">
                            <a href="javascript:void(0);" class="footer__link">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="footer__textRight">
            Adsy
        </span>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
