<?php

use Framework\Application\Render;

if( isset( $panel ) == false )
    $panel = "panel-primary";

if (isset($process)) 
{

    $data = json_decode($process->data, true);

    if( time() > $process->timecompleted )
        $duration = 0;
    else
	    $duration = $process->timecompleted - time();

    ?>
    <div class="col-sm-12">
        <div class="panel <?=$panel?>">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10">
                        <p>
                            <span class="glyphicon glyphicon-arrow-right"></span> <?= $process->process?> at <a
                                    href="/game/internet/<?= $data['ipaddress'] ?>/"><?= $data['ipaddress'] ?></a> <span
                                    class="badge"
                                    style="float: right;"><?= date("F j, Y, g:i a", $process->timecompleted) ?></span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-time"></span> <span id="counter<?=$process->processid?>">0</span>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-flash"></span> 100%
                        </p>

                        <?php
                        if (isset($actions))
                        {
                            ?>
                                <div class="panel panel-default" style="margin-top: 8px;">
                                    <div class="panel-body">
                                        <button style="width: 100%;" class="btn btn-primary btn-lg" type="button" disabled>
                                            <span class="glyphicon glyphicon-pause" aria-hidden="true"></span>
                                            Pause
                                        </button>
                                        <button style="width: 100%; margin-top: 12px;" class="btn btn-danger btn-lg" type="button"
                                                onclick="window.location.href = '/processes/<?= $process->processid ?>/delete'">
                                            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                                            Delete
                                        </button>

                                        <?php

                                        if ( time() > $process->timecompleted )
                                        {

                                            ?>
                                            <button style="width: 100%; margin-top: 12px;" class="btn btn-success btn-lg"
                                                    type="button"
                                                    onclick="window.location.href = '/processes/<?= $process->processid ?>/complete'">
                                                <span class="glyphicon glyphicon-arrow-up"
                                                      aria-hidden="true"></span> Complete
                                                </button>
                                                <?php
                                        }
                                            ?>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-2">
                        <div style="height: 100%; width: 100%; margin-left: auto; margin-right: auto; margin-top: 24px;">
                            <div id="progressbar<?= $process->processid ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (  time() < $process->timecompleted ) {
        ?>
        <script>
            var counter<?=$process->processid?> = document.getElementById('counter<?=$process->processid?>');
            var duration<?=$process->processid?> = <?=$duration?>;

            var intervalduration<?=$process->processid?> = setInterval(onTick<?=$process->processid?>, 1000);

            function onTick<?=$process->processid?>() {
                duration<?=$process->processid?> = duration<?=$process->processid?> - 1;
                counter<?=$process->processid?>.innerHTML = duration<?=$process->processid?> + " seconds";

                if (duration<?=$process->processid?> <= -1) {
                    clearInterval(intervalduration<?=$process->processid?>);
                    counter<?=$process->processid?>.innerHTML = "Complete"
                }
            }
        </script>
        <?php
    }
    ?>
    <script>
        var line = new ProgressBar.Circle('#progressbar<?=$process->processid?>', {
            color: '#6e2caf',
            strokeWidth: 2,
            trailWidth: 1,
            duration: <?=$duration?>,
            easing: 'easeIn'
        });

        <?php
                if( $duration > 0 )
                    echo("line.animate(" . ( 1000 / ( $duration * ( time() - $process->timestarted ) ) ) . ")");
                else
                    echo("line.animate(1)");
        ?>


        function onComplete()
        {

            <?php
                if( @$redirect )
                    echo("window.location.href = '/processes/" . $process->processid . "/complete';")
            ?>
        
            clearTimeout(interval);
        }

        var interval = setInterval(onComplete, <?=1000 * $duration?> );
    </script>
    <?php
}
?>

