<select name="accountnumber" class="combobox input-sm form-control" style="margin-top: 16px;">
    <?php
        if (empty($accounts) == false) {

            foreach ($accounts as $account) {

                ?>
                <option value="<?= $account->accountnumber ?>">#<?= $account->accountnumber ?>
                    (<?= $settings['bank_currency'] . number_format($account->cash) ?>)<?php if( isset( $ipaddresses[ $account->computerid ] ) ) { echo "@" . $ipaddresses[ $account->computerid ]; }?></option>
                <?php
            }
        }
        else
            echo '<option value="">Error retrieving data</option>'
        ?>
</select>