<?php
    use Framework\Application\Render;
?>
<!DOCTYPE html>
<html>

<?php

Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Game'));
?>
<body>
<div class="container">
	<?php
		Render::view('syscrack/templates/template.navigation');
		Render::view('syscrack/templates/template.errors');
	?>
    <div class="row">
        <div class="col-md-12">

            <?php

            if (isset($_GET['error']))
                Render::view('syscrack/templates/template.alert', array('message' => $_GET['error']));
            elseif (isset($_GET['success']))
                Render::view('syscrack/templates/template.alert', array('message' => $settings['alert_success_message'], 'alert_type' => 'alert-success') );
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" onclick="window.location.href = '/computer/'">
            <h5 style="color: #ababab" class="text-uppercase">
                <span class="badge"><?= $currentcomputer->type ?></span> <?= $currentcomputer->ipaddress ?>
            </h5>
        </div>
    </div>
    <div class="row" style="margin-top: 1.5%;">

        <?php
            Render::view('syscrack/templates/template.computer.actions');
        ?>
        <div class="col-md-8">

            <?php

            if (empty($processes) == false) {
	            ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-body text-center">
                                    <h2>Process Center</h2>
                                    <small><a onclick="window.location.reload( true )" href="#"> Click here to manage your processes</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                <?=count($processes)?> total processes
                            </h5>
                        </div>
                    </div>
                <?php
                foreach ($processes as $process) {
                    ?>
                        <div class="row">
                            <?php Render::view('syscrack/templates/template.process', array('process' => $process, 'refresh' => true) ); ?>
                        </div>
                    <?php
                }
            } else {

                ?>
                    <div class="panel panel-danger">
                        <div class="panel-body text-center">
                            <h3>Empty</h3>
                            <small><a onclick="window.location.reload( true )" href="#"> Click here to refresh</a></small>
                        </div>
                    </div>
                    <?php
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