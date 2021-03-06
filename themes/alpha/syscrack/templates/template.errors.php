<?php
	$render = function( &$contents, $page ) use( $settings )
	{

		foreach( $contents as $key=>$error )
		{

		    if( isset( $model->session["data"]["form"]["drawn"] ) == false )
		        $model->session["data"]["form"]["drawn"] = [];

		    $model->session["data"]["form"]["drawn"][ $page ] = ["key" => $key, "modified" => time ()];

			if( isset( $error["success"] ) == true && $error["success"] )
			{
				?>
                <div class="row">
                    <div class="col-md-12">
                        <div id="error<?=$key?>" class="alert alert-success" role="alert">
                            <button type="button" style="padding-left: 5px;" class="close" data-content="none" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <small>
                                <span class="glyphicon glyphicon-star"></span> Message:
                            </small>
							<?php

								if( empty( @$error["message"] ) )
								{
									echo "Success";
								}
								else
									echo @$error["message"];?>
                                <span style="float: right;">
                                    <span class="glyphicon glyphicon-time"></span>
                                    <?=@$error["time"]?>
                                    <span class="glyphicon glyphicon-file"></span>
                                    <a href="/<?=$page?>"><?=$page?></a>
                                </span>
                        </div>
                    </div>
                </div>
				<?php
			}
			else
			{

				?>
                <div class="row">
                    <div class="col-md-12">
                        <div id="error<?=$key?>" class="alert alert-danger" role="alert">
                            <button type="button" style="padding-left: 5px;" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <small>
                                <span class="glyphicon glyphicon-exclamation-sign"></span> Error!
                            </small>
                            <b>
	                            <?php
		                            if( empty( @$error["message"] ) )
		                            {
			                            echo "Error";
		                            }
		                            else
			                            echo @$error["message"];?>
                            </b>
                            <span style="float: right;">
                                <span class="glyphicon glyphicon-time"></span>
                                <?=@$error["time"]?>
                                <span class="glyphicon glyphicon-file"></span>
                                <a href="/<?=$page?>"><?=$page?></a>
                            </span>
                        </div>
                    </div>
                </div>
				<?php
			}

		}
	};
	
	$string = "<div class='row'><div class='col-md-12'></div><div class='well'>" . json_encode( $model->session ) . "</div></div>";

	if( isset( $debug ) )
	    echo( $string );

	if( isset( $model->session["data"]["form"] ) == false || empty( $model->session["data"]["form"] ) )
		return;

	if( isset( $page ) == false )
    {

	    foreach( $model->session["data"]["form"] as $page=>$contents )
	        if( $page !== "drawn")
	            $render( $model->session["data"]["form"][ $page ], $page );
    }
    else
        if( isset( $model->session["data"]["form"][ $page ] ) )
	        $render( $model->session["data"]["form"][ $page ] ,$page );

?>
