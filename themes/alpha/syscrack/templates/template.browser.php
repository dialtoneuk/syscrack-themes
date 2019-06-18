<?php
use Framework\Application\Render;
?>
<form method="post" action="/game/internet/">
    <div class="panel panel-default">
        <?php
            if( isset( $metadata ) && empty( $metadata->custom ) == false || isset( $metadata->custom["name"] ) )
            {
                ?>
                    <div class="panel-heading">
                        <?=@$metadata->custom["name"]?>
                    </div>
                <?php
            }

        ?>
        <div class="panel-body">
            <?php
                if( isset( $metadata ) == false && empty( $metadata->custom ) || isset( $metadata->custom["browserpage"] ) == false )
                {

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    Successfully connected to <?=$ipaddress?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else
                    if( isset( $browser_page) )
                        echo( $browser_page );
            ?>
        </div>
        <div class="panel-footer">
            <?php echo $computer->type;
            echo ' <small>' . date('d-M-y H:m:s') . '</small>'; ?>
        </div>
    </div>
</form>
