<?php
    if( isset( $name ) == false )
        $name = "softwaretypes";
?>
<select name="<?=$name?>" class="combobox input-sm form-control">
    <?php

    if (empty($values) == false)
    {
        foreach (@$values as $key)
            echo('<option value="' . $key . '">' . $key . '</option>');
    }
    else
	    echo '<option value="">Error retrieving data</option>'
    ?>
</select>