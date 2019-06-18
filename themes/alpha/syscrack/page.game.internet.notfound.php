<?php use Framework\Application\Render;?>
<!DOCTYPE html>
<html>
<?php Render::view('syscrack/templates/template.header', array('pagetitle' => 'Syscrack | Game')); ?>
    <body>
    <div class="container">
	    <?php
		    Render::view('syscrack/templates/template.navigation');
		    Render::view('syscrack/templates/template.errors');
	    ?>
        <div class="row">
            <div class="col-md-12">
	            <?php Render::view('syscrack/templates/template.searchbar', ["ipaddress" =>  strip_tags( @$_GET["ipaddress"] ) ]); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 12px">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-body text-center">
                       <h1 style="font-size: 18.5em;">404</h1>
                       <h1>Struggling?</h1>
                       <p>
                           Check out the whois server for a list of valid ip addresses!
                       </p>
                       <button class="btn btn-default"
                               onclick="window.location.href = '/game/internet/<?=@$computer->ipaddress?>'">Connect</button>
                   </div>
               </div>
           </div>
        </div>
        <?php Render::view('syscrack/templates/template.footer', array('breadcrumb' => true)); ?>
    </div>
    </body>
</html>