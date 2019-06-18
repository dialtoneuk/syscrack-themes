<?php
    use Framework\Application\Render;
?>
<!DOCTYPE html>
<html>

<?php
    Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Game'))
?>
<body>
<div class="container">
	<?php
		Render::view('syscrack/templates/template.navigation');
		Render::view('syscrack/templates/template.errors');
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Internet Browser</h3>
                    <p>Surf the internet, find new websites to hack. Maybe you'll find some sweet
                        new software too and <b>you may also find helpful information to assist you.</b></p>
                    <p><a href="/game/internet/" class="btn btn-primary" role="button">Open</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Finances</h3>
                    <p>View your finances, transfer cash between accounts anonymously. Sit meticulously
                        counting the loads of dosh in your accounts.</p>
                    <p><a href="/finances/" class="btn btn-primary" role="button">Open</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3>Processes</h3>
                    <p>Take a look at what's using your resources and see globally whats going on around your
                    network.</p>
                    <p><a href="/processes/" class="btn btn-primary" role="button">Open</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Virtual Computer
                </div>
                <div class="panel-body">
                    <?php

                    if ( isset( $currentcomputer ) )
                    {

                        ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?= $currentcomputer->ipaddress ?>
                                <small>
                                    <span class="badge" style="float: right;"><?= $currentcomputer->type ?></span>
                                </small>
                            </div>
                            <div class="panel-body">
                                <button style="width: 100%;" class="btn btn-primary"
                                        onclick="window.location.href = '/computer/'">
                                    <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> View
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="panel-footer">
                    <div class="badge"><?= @count( @$computers ) ?> computers in total</div> <small>Click <a href="/game/computer">here to buy a new computer</a></small>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    News
                </div>
                <div class="panel-body">
                    <p>
                        There is no news to report...
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php

    Render::view('syscrack/templates/template.footer', array('breadcrumb' => true));
    ?>
</div>
</body>
</html>