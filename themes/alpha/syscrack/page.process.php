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
            <div class="col-lg-6">
                <div class="thumbnail">
                    <div class="caption">
                        <h2>Global Processes</h2>
                        <h4><?=count( $processes )?></h4>
                        <p><a href="/game/computer/" class="btn btn-primary" role="button">Computers</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="thumbnail">
                    <div class="caption">
                        <h2>Local Processes</h2>
                        <h4><?=@count( $localprocesses )?></h4>
                        <p><a href="/game/computer/" class="btn btn-danger" role="button">Clear All</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php

                if ( empty( $processes ) )
                {

                    ?>
                        <div class="panel panel-danger">
                            <div class="panel-body">
                                You currently don't have any processes on any of your machines, go do something!
                            </div>
                        </div>
                    <?php
                }
                else
                {

                    foreach ($processes as $key => $value)
                    {

                        $process_computer = @$computers[ $value->computerid ];

                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="color: #ababab" class="text-uppercase">
                                    <?php

                                    if ($currentcomputer->computerid == @$process_computer->computerid) {

                                        ?>
                                            <p><span>Local Process</span></p>
                                        <?php
                                    } else {

                                        ?>
                                        <p><span><?=$process_computer->ipaddress?></span> <a href="/game/computer/#<?= $process_computer->ipaddress ?>" class="btn btn-warning"
                                                                                         role="button" style="float: right; margin-top: -10px; padding-bottom: 5px;">Switch to computer</a></p>
                                        <?php
                                    }
                                    ?>

                                </h5>

                                <?php
                                    if ($currentcomputer->computerid == @$process_computer->computerid)
                                    {
                                        ?>
                                            <div class="row">
                                                <?php Render::view('syscrack/templates/template.process', array('panel' => 'panel-info', 'process' => $value, 'actions' => true )); ?>
                                            </div>
                                        <?php
                                    } else {

                                        ?>
                                            <div class="row" style="opacity: 0.25;">
                                                <?php Render::view('syscrack/templates/template.process', array('panel' => 'panel-warning','process' => $value )); ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
            Render::view('syscrack/templates/template.footer', array('breadcrumb' => true));
        ?>
    </div>
    </body>
</html>