<? include_once('init.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=<?=$tplParams['initial_scale']?>">
    <meta property="og:image" content="<?=$tplParams['og_image']?>">
    <link rel="shortcut icon" href="<?=$tplParams['favicon']?>" type="image/x-icon">
    <link rel="stylesheet" href="<?=$path['template']?>/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=$path['template']?>/css/fonts.css" type="text/css" />
    <link rel="stylesheet" href="<?=$path['template']?>/css/template.css" type="text/css" />
    <style>
        <?var_dump($obStyles);?>
    </style>
    <script type="application/javascript" src="<?=$path['template']?>/js/jquery.min.js"></script>
    <script type="application/javascript" src="<?=$path['template']?>/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="<?=$path['template']?>/js/jquery.min.js"></script>
</head>
<body class="error">
    <main id="section_error" class="section_error">
        <div class="<?=$tplParams['error_container_styles']->class?>">
            <div class="fullscreen-vertical-mid">
                <div class="row">
                    <div class="col-xs-12 error-logo">
                        <h1>LogoHere</h1>
                    </div>
                    <div class="col-xs-12 col-sm-6 error-left">
                        <img src="<?=$path['template']?>/img/error.png" class="error">
                    </div>
                    <div class="col-xs-12 col-sm-6 error-right">
                        <h1>Error - #<?=$this->error->getCode()?></h1>
                        <h2><?=$this->error?></h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
