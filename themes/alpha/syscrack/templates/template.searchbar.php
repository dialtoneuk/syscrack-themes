<div class="input-group">
	<span class="input-group-addon" id="basic-addon1">URL</span>
	<input type="text" class="form-control" id="ipaddress" name="ipaddress"
	       value="<?php if (isset($ipaddress)) {
		       echo $ipaddress;
	       }?>">
	<span class="input-group-btn">
            <button class="btn btn-default"
                    onclick="window.location.href = '/game/internet/' + $('#ipaddress').val()">Connect</button>
        </span>
	<span class="input-group-btn">
            <button class="btn btn-info"
                    onclick="window.location.href = '/game/save/<?=@$ipaddress?>'"><span class="glyphicon glyphicon-floppy-save"></span></button>
        </span>
	<span class="input-group-btn">
            <button class="btn btn-warning"
                    onclick="window.location.reload( true )"><span class="glyphicon glyphicon-refresh"></span></button>
        </span>
</div><!-- /input-group -->