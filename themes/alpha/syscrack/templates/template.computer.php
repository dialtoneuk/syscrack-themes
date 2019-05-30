<?php
use Framework\Application\Render;
?>
<?php
    if ( $computer->userid == $user->userid) {
?>
    <div class="panel panel-primary">
        <div class="panel-body">
            You are the owner of the current computer you are accessing.
        </div>
    </div>
<?php
    }
?>
<form method="post" action="/game/internet/">
    <div class="input-group">
        <input type="text" class="form-control" id="ipaddress" name="ipaddress"
               placeholder="<?=@$ipaddress?>">
        <span class="input-group-btn">
            <button class="btn btn-default"
                    onclick="window.location.href = '/game/internet/' . $('#ipaddress').value()">Connect</button>
        </span>
    </div><!-- /input-group -->
</form>
<div class="panel panel-default" style="margin-top: 2.5%">
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#log">Log</a></li>
            <li><a data-toggle="tab" href="#software">Software</a></li>
            <li><a data-toggle="tab" href="#hardware">Hardware</a></li>
            <li><a data-toggle="tab" href="#storage">Storage</a></li>
        </ul>
        <div class="tab-content">
            <div id="log" class="tab-pane fade in active" style="padding-top: 18px;">
                <form method="post" action="/game/internet/<?=$ipaddress?>/clear">
                    <?php Render::view('syscrack/templates/template.log'); ?>
                </form>
            </div>
            <div id="software" class="tab-pane fade" style="padding-top: 18px;">
                <?php Render::view('syscrack/templates/template.softwares', array( 'tools' => $tools_software ) ); ?>
            </div>
            <div id="hardware" class="tab-pane fade"style="padding-top: 18px;">
                <div class="row">
                    <div class="col-lg-12">
                        <?php Render::view('syscrack/templates/template.hardware', array( 'hardwares' => json_decode( $computer->hardware, true ) ) ); ?>
                    </div>
                </div>
            </div>
            <div id="storage" class="tab-pane fade"style="padding-top: 18px;">
                <?php
                    $usedspace = 0;

                    if( isset( $softwares ) )
                        foreach( $softwares as $software )
                            $usedspace += @$software->size;
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php Render::view('syscrack/templates/template.storage', array( 'hardwares' => json_decode( $computer->hardware, true ), 'usedspace' => $usedspace ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <?php echo strtoupper($computer->type);
        echo ' <small>' . date('d-M-y H:m:s') . '</small>'; ?>
    </div>
</div>
