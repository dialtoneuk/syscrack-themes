<?php

	use Framework\Application\Render;
?>
<html>
	<?php
		Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Admin' ) )
	?>
	<div class="container">
		<?php
			Render::view('syscrack/templates/template.navigation');
		?>
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    Session
                </h1>
                <div class="well">
<pre>
<?php
echo print_r( $model->session );
?>
</pre>
                </div>
                <h1>
                    Raw Data
                </h1>
                <div class="well">
<pre>
<?php
echo print_r( Render::$raw );
?>
</pre>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-12">
                <h1>
                    Errors
                </h1>
				<?php
					Render::view('syscrack/templates/template.errors');
				?>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <input type="hidden" name="type" value="error">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-success">Make Error
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post">
                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                        <input type="hidden" name="type" value="success">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-success">Make Success
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-sm-12">
                    <p class="text-center">
                        <a href="/admin">
                            Go back...
                        </a>
                    </p>
                </div>
            </div>
        </div>
		<?php
			Render::view('syscrack/templates/template.footer', array('breadcrumb' => true));
		?>
	</div>
</html>
