<?php
	if (isset( $assets["js_header"] ))
		foreach ( $assets["js_header"] as $script)
			echo "<script src='" . $script . "'></script>";

?>