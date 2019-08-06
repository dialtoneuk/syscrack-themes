<footer id="footer" style="margin-top: 8px;">
    <?php
        if (isset($breadcrumb))
        {

            $url = $_SERVER['REQUEST_URI'];

            if (empty(explode('?', $url)) == false)
                $url = explode('?', $url)[0];


            $paths = explode('/', $url);
            $built = '';

            echo '<ol class="breadcrumb">';
            echo '<li><a href="/' . $settings['controller_index_page'] . '">Home</a></li>';

            foreach ($paths as $path)
            {

                if (empty(explode('?', $path)) == false)
                    $path = explode('?', $path)[0];

                if (empty($path) || $path == $settings['controller_index_page'])
                    continue;
                ?>
                    <li>
                        <a class="text-capitalize" href="<?= '/' . htmlspecialchars($built . $path, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?></a>
                    </li>
                <?php

                $built = $built . $path . '/';
            }
            echo '</ol>';
        }
    ?>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?=$settings["github_main"]?>">Github</a></li>
                <li class="list-group-item"><a href="/faq/tos">Terms Of Service</a></li>
                <li class="list-group-item"><a href="/faq/privacy">Privacy Information</a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <h4>
                Syscrack is a video game and does not condone real life hacking.
                <small>
                    Developed by Lewis Lancaster under the Apache-2.0 license.
                </small>
            </h4>
            <p>
                This installation of Syscrack could potentially be using third-party software in the form
                of modifications. Because of this we are unable to verify the integrity of games which
                run mods and cannot verify the saftey of users who use modded versions of Syscrack. For more
                information, please <a href="<?=$settings["github_main"]?>"> refer to our github.</a>
            </p>
        </div>
    </div>
	<?php
		if (isset( $assets["js"]))
			foreach ( $assets["js"] as $script)
				echo "<script src='" . $script . "'></script>";
	?>
</footer>
