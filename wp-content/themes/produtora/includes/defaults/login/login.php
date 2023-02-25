<?php 
function page_login_logo() { ?>
    <style type="text/css">
        html, body{
            background-color: #000 !important;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/logo_harpia.png);
            padding-bottom: 30px;
            background-size: 192px 201px;
            height: 201px;
            width: 192px;
        }

        #user_login{

        }

        #user_pass{

        }

        #loginform label{
            color: #000;
        }

        #login p#nav a, #login p#backtoblog a{
            color: #fff;
        }

        #loginform #wp-submit{
            background-color: #ffcc00;
            color: #000;


            border-color: transparent;
            box-shadow: none;
            text-shadow: none;
        }

        .info-harpia span{
            display: block;
            text-align: center;
            margin-bottom: 10px;
            color: #ffcc00;
            font-size: 20px;
            font-weight: 700;
        }

        .info-harpia a{
            display: inline-block;
            margin:0 auto 20px;
        }
        .rede-sociais{
            text-align: center;
        }

        .rede-sociais a:nth-child(1){
            text-indent: -99999px;
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/facebook.png) no-repeat;
            height: 40px;
            width: 40px;
        }
        .rede-sociais a:nth-child(2){
            text-indent: -99999px;
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/googleplus.png) no-repeat;
            height: 40px;
            width: 40px;
        }
        .rede-sociais a:nth-child(3){
            text-indent: -99999px;
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/twitter.png) no-repeat;
            height: 40px;
            width: 40px;
        }
        .rede-sociais a:nth-child(4){
            text-indent: -99999px;
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/linkedin.png) no-repeat;
            height: 40px;
            width: 40px;
        }
        .rede-sociais a:nth-child(5){
            text-indent: -99999px;
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/includes/defaults/login/img/instagram.png) no-repeat;
            height: 40px;
            width: 40px;
        }
    </style>
<?php }
    add_action( 'login_enqueue_scripts', 'page_login_logo' );

    function page_login_logo_url() {
        return 'http://www.harpiapropaganda.com.br';
    }
    add_filter( 'login_headerurl', 'page_login_logo_url' );

    function page_login_logo_title() {
        return 'Harpia Propaganda - Agência digital';
    }
    add_filter( 'login_headertitle', 'page_login_logo_title' );

    function page_login_content_description() {
        ?>
            <div class="info-harpia">
                <span>(62) 3242-5359 / 8433-8982 </span>
                <span>contato@harpiapropaganda.com.br</span>
                <div class="rede-sociais">
                    <a title="Facebook" href="https://www.facebook.com/HarpiaPropaganda/" target="_blank">F</a>
                    <a title="Google Plus" href="https://plus.google.com/109514925436373924984/about" target="_blank">G+</a>
                    <a title="Twitter" href="https://twitter.com/agenciaharpia" target="_blank">T</a>
                    <a title="Linkedin" href="https://br.linkedin.com/pub/harpia-propaganda/75/528/204" target="_blank">L</a>
                    <a title="Instagram" href="https://instagram.com/harpia_propaganda" target="_blank">I</a>
                </div>
            </div>
        <?php
    }
    add_filter( 'login_message', 'page_login_content_description' );
?>