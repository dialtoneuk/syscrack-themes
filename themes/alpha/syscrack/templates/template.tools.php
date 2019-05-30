<?php
use Framework\Application\Render;
?>
<?php
    if( isset( $tools ) == false )
    {
        ?>
            <div class="panel panel-warning">
                <div class="panel-body">
                    You currently don't have any tools to your disposal. This could be due to the fact you have
                    no software.
                </div>
            </div>
        <?php
    }
    else
    {

        foreach( $tools as $tool )
        {

            if( isset( $tool["requirements"]["empty"] ) )
                continue;

            ?>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/game/internet/<?=$ipaddress ?>/<?=$tool["action"]?>" method="post">
                            <?php
                            if( isset( $tool["requirements"]["panel"] ) )
                                echo "<div class=\"panel panel-" .  $tool["requirements"]["panel"]  . "\">";
                            else
                                echo"<div class=\"panel panel-default\">"
                            ?>
                                <div class="panel-body">
                                <?php
	                                if( @$tool["requirements"]["local"] )
	                                    echo "<p class='text-center'>Local Executable</p>";
                                        if( !empty( $tool["inputs"] ) )
                                            foreach( $tool["inputs"] as $input )
                                            {
                                                if( $input["type"] == "softwares" )
                                                    Render::view("syscrack/templates/template.software.search", array('values' => @$softwares ) );
                                                elseif( $input["type"] == "accounts" )
                                                    Render::view("syscrack/templates/template.software.search", array('values' => @$accounts ) );
                                                elseif( $input["type"] == "localsoftwares" )
                                                    Render::view("syscrack/templates/template.software.search", array('values' => @$localsoftwares) );
                                                else
                                                    echo( $input["html"] );
                                            }

                                        ?>
                                    <button style="width: 100%;" class="btn btn-<?=@$tool["class"]?>" type="submit">
                                        <span class="glyphicon glyphicon-<?=@$tool["icon"]?> aria-hidden="true"></span> <?=$tool["description"]?>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
        }
    }
?>
