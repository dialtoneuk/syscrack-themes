<?php
    use Framework\Application\Render;
?>
<html>
    <?php
        Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Admin'));
    ?>
    <div class="container">
	    <?php
		    Render::view('syscrack/templates/template.navigation');
		    Render::view('syscrack/templates/template.errors');
	    ?>
        <div class="row">
            <?php
            Render::view('syscrack/templates/template.admin.options');
            ?>
            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    foreach( $users as $value )
                    {

                        ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <span class="badge" style="font-size: 2em;"><?=$value->userid?></span><span class="badge" style="margin-left: 5%;"><?=$value->group?></span>
                                                </div>
                                                <div class="col-sm-5">
                                                    <h5>
                                                        <?=htmlspecialchars($value->username)?>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="btn-group" style="float: right;" role="group" aria-label="...">
                                                        <button type="button" onclick="window.location.href = '/admin/users/edit/<?=$value->userid?>/'"class="btn btn-success">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
</html>