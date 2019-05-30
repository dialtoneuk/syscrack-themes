<?php

use Framework\Syscrack\Game\Operations;

if (isset($processclass) == false) {

    $processclass = new Operations();
}

if( isset( $panel ) == false )
    $panel = "panel-primary";

if (isset($processid)) {

    $process = $processclass->getProcess($processid);

    if ($processclass->canComplete($processid)) {

        if (isset($auto) == true) {

            Flight::redirect('/processes/' . $processid . '/complete');
        }
    }

    $data = json_decode($process->data, true);

    if ($processclass->canComplete($processid)) {

        $duration = 1;
    } else {

        $duration = ($process->timecompleted - time(true));
    }
    ?>
    <div class="col-sm-12">
        <div class="panel <?=$panel?>">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-10">
                        <p>
                            <span class="glyphicon glyphicon-arrow-right"></span> <?= $process->process ?> at <a
                                    href="/game/internet/<?= $data['ipaddress'] ?>/"><?= $data['ipaddress'] ?></a> <span
                                    class="badge"
                                    style="float: right;"><?= date("F j, Y, g:i a", $process->timecompleted) ?></span>
                        </p>
                        <p>
                            <?php
                            if ($processclass->canComplete($processid) == false) {

                                ?>
                                <span class="glyphicon glyphicon-time"></span> <span id="counter<?=$processid?>">0</span>
                                <?php
                            }
                            ?>
                        </p>
                        <p>
                            <span class="glyphicon glyphicon-flash"></span> 100%
                        </p>

                        <?php
                        if (isset($actions)) {
                            ?>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <button style="width: 100%;" class="btn btn-danger btn-sm" type="button"
                                                onclick="window.location.href = '/processes/<?= $processid ?>/delete'">
                                            <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                                            Delete
                                        </button>

                                        <?php

                                        if ($processclass->canComplete($processid)) {

                                            ?>
                                            <button style="width: 100%; margin-top: 2.5%;" class="btn btn-success btn-sm"
                                                    type="button"
                                                    onclick="window.location.href = '/processes/<?= $processid ?>/complete'">
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
                        <div style="height: 100%; width: 100%; margin-left: auto; margin-right: auto; margin-top: 5%">
                            <div id="progressbar<?= $processid ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if ($processclass->canComplete($processid) == false) {
        ?>
        <script>
            var counter<?=$processid?> = document.getElementById('counter<?=$processid?>');
            var duration<?=$processid?> = <?=$duration?>;

            var intervalduration<?=$processid?> = setInterval(onTick<?=$processid?>, 1000);

            function onTick<?=$processid?>() {
                duration<?=$processid?> = duration<?=$processid?> - 1;
                counter<?=$processid?>.innerHTML = duration<?=$processid?> + " seconds";

                if (duration<?=$processid?> <= -1) {
                    clearInterval(intervalduration<?=$processid?>);
                    counter<?=$processid?>.innerHTML = "Press refresh!"
                }
            }
        </script>
        <?php
    }
    ?>
    <script>
        var line = new ProgressBar.Circle('#progressbar<?=$processid?>', {
            color: '#337ab7',
            strokeWidth: 4,
            trailWidth: 1,
            duration: <?=1000 * $duration?>,
            easing: 'easeIn'
        });

        line.animate(<?=$duration?>);

        function onComplete() {

            <?php

            if( isset($auto) )
            {

            if( $auto == true )
            {

            ?>
            window.location.href = '/processes/<?=$processid?>/complete';
            <?php
            }
            }
            else
            ?>

            clearTimeout(interval);
        }

        var interval = setInterval(onComplete, <?=1000 * $duration?> );

        <?php
        if( $processclass->canComplete($processid) )
        {

        if( isset($auto) )
        {

        if( $auto == true )
        {

        ?>
        window.location.href = '/processes/<?=$processid?>/complete';
        <?php
        }
        }
        }
        ?>
    </script>
    <?php
}
?>

