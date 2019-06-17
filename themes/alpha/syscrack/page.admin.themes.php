<?php
use Framework\Application\Render;
?>
<html>

<?php
Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Admin'));
?>
<body>
<div class="container">
	<?php
		Render::view('syscrack/templates/template.navigation');
		Render::view('syscrack/templates/template.errors');
	?>
    <form method="post">
        <div class="row">

            <?php

            Render::view('syscrack/templates/template.admin.options');
            ?>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 style="color: #ababab" class="text-uppercase">
                            Themes
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-body">
                                Please look at our github wiki for more information on installing themes and creating
                                your own.
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                    if( empty( $themes ) )
                    {
                        ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            Sorry no themes available!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {

                        foreach( $themes as $folder=>$theme )
                        {

                            ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <h3><?=$theme['name']?>  <small>version <?=$theme["version"]?></small></h3>
                                                <h4 class="small">Created by <a href="<?=$theme["website"]?>"><?=$theme["author"]?></a></h4>
                                                <p><?=$theme['description']?></p>
                                                <form method="post" id="<?=$folder?>" >
                                                <?php
                                                    if( $folder == $settings["theme_folder"] )
                                                    {
                                                        ?>

                                                                <div class="alert alert-info">
                                                                    You already have this theme selected.
                                                                </div>

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>

                                                                <button  style="width: 100%;"
                                                                        class="btn btn-default btn-sml" data-content="<?=$folder?>" type="submit">
                                                                    <span class="glyphicon glyphicon-check"
                                                                          aria-hidden="true"></span> Switch
                                                                </button>
                                                                <input type="hidden" name="theme" value="<?=$folder?>">
                                                        <?php
                                                    }
                                                ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </form>

    <?php

    Render::view('syscrack/templates/template.footer', array('breadcrumb' => true));
    ?>
</div>
</body>
</html>
