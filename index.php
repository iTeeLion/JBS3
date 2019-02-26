<? include_once('init.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=<?=$tplParams['initial_scale']?>">
    <? if($tplParams['og_image']): ?>
        <meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST'] . '/' .$tplParams['og_image']?>">
    <? endif; ?>
    <? if($tplParams['favicon']): ?>
        <link rel="shortcut icon" href="/<?=$tplParams['favicon']?>" type="image/x-icon">
    <? endif; ?>
    <jdoc:include type="head"/>
</head>
<body>

    <div id="page_start"></div>

    <? if ($this->countModules('mainmenu')) : ?>
        <nav id="section_navbar" class="navbar navbar-main <?=$tplParams['navbar_styles']->fixed?>" data-navbar-main>
            <div class="<?=$tplParams['navbar_styles']->container_styles->class?>">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><?=$logotype?></a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <jdoc:include type="modules" name="mainmenu" style="plain"/>
                </div>
            </div>
        </nav>
        <? if(!empty($tplParams['navbar_styles']->fixed)): ?>
        <div class="navbar-spacer navbar-fixed" <?=$tplParams['navbar_styles']->fixed_spacer?>></div>
        <? endif; ?>
    <? endif; ?>

    <? if ($this->countModules('section_header')) : ?>
        <header id="section_header" class="section_header">
            <div class="<?=$tplParams['header_styles']->container_styles->class?>">
                <div class="row <?=$tplParams['header_styles']->row_styles->row_flex?>">
                    <jdoc:include type="modules" name="section_header" style="col"/>
                </div>
            </div>
        </header>
    <? endif; ?>

    <? $blocksCount = count((array)$tplParams['top_styles']);?>
    <? for($i=1; $i<=$blocksCount; $i++): ?>
    <? if ($this->countModules('section_top' . $i)) : ?>
        <section id="section_top<?=$i?>" class="section_top section_top<?=$i?>">
            <? $blockName = 'top_styles'.($i-1); ?>
            <div class="<?=$tplParams['top_styles']->$blockName->container_styles->class?>">
                <div class="row <?=$tplParams['top_styles']->$blockName->row_styles->row_flex?>">
                    <jdoc:include type="modules" name="section_top<?=$i?>" style="col"/>
                </div>
            </div>
        </section>
    <? endif; ?>
    <? endfor; ?>

    <? if($tplParams['component_on_main_page'] || $_SERVER['REQUEST_URI']!="/"): ?>
        <main id="section_main" class="section_main">
            <div class="<?=$tplParams['main_styles']->container_styles->class?>">
                <div class="row <?=$tplParams['main_styles']->row_styles->row_flex?>">
                    <? if ($this->countModules('aside_left')) : ?>
                        <div class="col col-xs-12 col-md-<?=$section_main_bscol_left?>">
                            <div class="cell">
                                <jdoc:include type="modules" name="aside_left" style="div"/>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="col col-xs-12 col-md-<?=$section_main_bscol_middle?>">
                        <div class="cell">
                            <jdoc:include type="message" />
                            <? if ($this->countModules('main_before')) : ?>
                                <jdoc:include type="modules" name="main_before" style="col"/>
                            <? endif; ?>
                            <jdoc:include type="component" />
                            <? if ($this->countModules('main_after')) : ?>
                                <jdoc:include type="modules" name="main_after" style="col"/>
                            <? endif; ?>
                        </div>
                    </div>
                    <? if ($this->countModules('aside_right')) : ?>
                        <div class="col col-xs-12 col-md-<?=$section_main_bscol_right?>">
                            <div class="cell">
                                <jdoc:include type="modules" name="aside_right" style="div"/>
                            </div>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </main>
    <? endif; ?>

    <? $blocksCount = count((array)$tplParams['bottom_styles']);?>
    <? for($i=1; $i<=$blocksCount; $i++): ?>
    <? if ($this->countModules('section_bottom' . $i)) : ?>
        <section id="section_bottom<?=$i?>" class="section_bottom section_bottom<?=$i?>">
            <? $blockName = 'bottom_styles'.($i-1); ?>
            <div class="<?=$tplParams['bottom_styles']->$blockName->container_styles->class?>">
                <div class="row <?=$tplParams['bottom_styles']->$blockName->row_styles->row_flex?>">
                    <jdoc:include type="modules" name="section_bottom_<?=$i?>" style="col"/>
                </div>
            </div>
        </section>
    <? endif; ?>
    <? endfor; ?>

    <? if ($this->countModules('section_footer')) : ?>
        <footer id="section_footer" class="section_footer">
            <div class="<?=$tplParams['footer_styles']->container_styles->class?>">
                <div class="row <?=$tplParams['footer_styles']->row_styles->row_flex?>">
                    <jdoc:include type="modules" name="section_footer" style="col"/>
                </div>
            </div>
        </footer>
    <? endif; ?>

    <div id="page_end"></div>

</body>
</html>