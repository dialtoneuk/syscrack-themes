<?php
foreach ($hardwares as $type => $hardware)
{
    $icons = $settings['hardware_icons'];
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <?php

                            if (isset($icons[$type])) {

                                ?>
                                <h1>
                                    <span class="glyphicon <?= $icons[$type] ?>"></span>
                                </h1>
                                <?php
                            } else {

                                ?>
                                <h1>
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                </h1>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-10">
                            <h1>
                                <?php

                                if (isset($hardware['value'])) {

                                    echo (string)$hardware['value'];
                                }

                                $extensions = $settings['hardware_extensions'];

                                if (isset($extensions[$type])) {

                                    ?>
                                    <span class="small"><?= $extensions[$type] ?></span>
                                    <?php
                                }
                                ?>
                                <small><span class="badge" style="float: right;"><?=@$type?></span></small>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>