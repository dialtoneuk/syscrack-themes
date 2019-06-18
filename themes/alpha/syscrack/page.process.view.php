<?php

use Framework\Application\Render;
?>
<!DOCTYPE html>
<html>
    <?php
        Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Processes'));
    ?>
    <body>
        <div class="container">
            <?php
                Render::view('syscrack/templates/template.navigation');
                Render::view('syscrack/templates/template.errors');
            ?>
            <div class="row">
                <?php
                    if (isset($process))
                        Render::view('syscrack/templates/template.process', array('process' => $process, 'redirect' => true ));
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            Head over to the <a href="/processes/">process control panel</a> to edit your current
                            tasks!
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button style="width: 100%;" class="btn btn-primary" type="button" onclick="window.location.reload()">
                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> Refresh Page
                    </button>
                </div>
            </div>
            <?php
                Render::view('syscrack/templates/template.footer', array('breadcrumb' => true));
            ?>
        </div>
    </body>
</html>