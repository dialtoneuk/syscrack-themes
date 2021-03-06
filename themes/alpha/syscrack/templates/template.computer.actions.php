<?php

use Framework\Application\Settings;
use Framework\Syscrack\Game\Computer;

if (isset($computer_controller) == false) {

    $computer_controller = new Computer();
}

$currentcomputer = $computer_controller->getComputer($computer_controller->computerid());
?>
<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-body text-center">
            <h2>
                <?=@$computer->type?> OS v1.0
            </h2>
            <small>Welcome <a><?=@$model->user["username"]?></a></small>
        </div>
    </div>
    <div class="list-group">
        <a href="/computer/" class="list-group-item">
            <h4 class="list-group-item-heading">Software</h4>
            <p class="list-group-item-text">View the contents of your drive.</p>
        </a>
        <a href="/computer/log/" class="list-group-item">
            <h4 class="list-group-item-heading">Access Logs</h4>
            <p class="list-group-item-text">View your computers system log.</p>
        </a>
        <a href="/computer/processes/" class="list-group-item">
            <h4 class="list-group-item-heading">Processes</h4>
            <p class="list-group-item-text">View whats current hogging your processor.</p>
        </a>
        <a href="/computer/hardware/" class="list-group-item">
            <h4 class="list-group-item-heading">Hardware</h4>
            <p class="list-group-item-text">View your system hardware.</p>
        </a>
        <a href="/computer/preferences/" class="list-group-item">
            <h4 class="list-group-item-heading">Preferences</h4>
            <p class="list-group-item-text">View your system preferences.</p>
        </a>
    </div>
    <?php

    if ($computer_controller->hasType($currentcomputer->computerid, $settings['software_collector_type'], true)) {

        ?>
        <div class="list-group">
            <a href="/computer/collect/" class="list-group-item list-group-item-info">
                <h4 class="list-group-item-heading">Network Collect</h4>
                <p class="list-group-item-text">Collect the profits from all of your viruses across your network.</p>
            </a>
        </div>
        <?php
    }
    ?>
    <?php

    if ($computer_controller->hasType($currentcomputer->computerid, $settings['software_research_type'], true)) {

        ?>
        <div class="list-group">
            <a href="/computer/research/" class="list-group-item list-group-item-info">
                <h4 class="list-group-item-heading">Research Center</h4>
                <p class="list-group-item-text">View all of the licensed software currently on your computer, license
                    new software and research software to higher levels.</p>
            </a>
        </div>
        <?php
    }
    ?>
</div>