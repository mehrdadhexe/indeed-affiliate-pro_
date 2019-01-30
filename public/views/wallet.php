<div class="uap-ap-wrap">

<?php if (!empty($data['title'])):?>
	<h3><?php echo $data['title'];?></h3>
<?php endif;?>


         <?php


               if (class_exists('WooWallet'))
              {
                 /*  $tr_type=get_user_meta($uid_ref,'uap_affiliate_payment_type',true);
                   if ($tr_type=='wallet')
                    woo_wallet()->wallet->credit($uid_ref,$comis,"Ref App");*/
              }

             // add_action('woo_wallet_before_transaction_details_content');
               //$array = WC_Tracker::get_active_payment_gateways();
              // echo var_dump($array);



                     $transactions = get_wallet_transactions();


add_action('woo_wallet_before_transaction_details_content');

         ?>
<table class="uap-account-table">
    <thead>
        <tr>
            <th style="font-size: 20px; text-align: right;"><?php _e('ID', 'woo-wallet'); ?></th>
            <th style="font-size: 20px; text-align: right;"><?php _e('Credit', 'woo-wallet'); ?></th>
            <th style="font-size: 20px; text-align: right;"><?php _e('Debit', 'woo-wallet'); ?></th>
            <!--<th><?php _e('Details', 'woo-wallet'); ?></th>  -->
            <th style="font-size: 20px; text-align: right;"><?php _e('Date', 'woo-wallet'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $key => $transaction) : ?>
        <tr>
            <td><?php echo $transaction->transaction_id; ?></td>
            <td><?php echo $transaction->type == 'credit' ? wc_price(apply_filters('woo_wallet_amount', $transaction->amount, $transaction->currency, $transaction->user_id)) : ' - '; ?></td>
            <td><?php echo $transaction->type == 'debit' ? wc_price(apply_filters('woo_wallet_amount', $transaction->amount, $transaction->currency, $transaction->user_id)) : ' - '; ?></td>
           <!-- <td><?php echo $transaction->details; ?></td>   -->
            <td><?php echo wc_string_to_datetime($transaction->date)->date_i18n(wc_date_format()); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!--php add_action('woo_wallet_after_transaction_details_content');-->
















<div class="uap-row">



	<div class="uapcol-md-2 uap-account-wallet-tab2">
		<div class="uap-account-no-box uap-account-box-green">
			<div class="uap-account-no-box-inside">
				<div class="uap-count"> <?php echo woo_wallet()->wallet->get_wallet_balance(get_current_user_id()); ?></div>
				<div class="uap-detail"><?php echo __('Wallet available Credit', 'uap'); ?></div>
			</div>
		</div>
	</div>

</div>






<!--
<?php if ($data['stats']['unpaid_payments_value'] && $data['stats']['unpaid_payments_value']>=$settings['uap_wallet_minimum_amount']):?>
		<a href="<?php echo $data['add_new'];?>" class="uap-addd-to-wallet"><?php _e('Add New Wallet Credit', 'uap');?></a>
<?php endif;?>
<?php if (!empty($data['message'])):?>
	<p><?php echo do_shortcode($data['message']);?></p>
<?php endif;?>
<?php if ($data['items']):?>
	<table class="uap-account-table">
		<thead>
			<tr>
				<th><?php _e('Coupon Code', 'uap');?></th>
				<th><?php _e('Type', 'uap');?></th>
				<th><?php _e('Amount', 'uap');?></th>
				<th><?php _e('Delete', 'uap');?></th>
			</tr>
		</thead>
	<?php foreach ($data['items'] as $k=>$v):?>
		<tr>
			<td style="font-size: 20px;"><?php echo $v['code'];?></td>
			<td><?php echo uap_service_type_code_to_title($v['type']);?></td>
			<td><?php echo uap_format_price_and_currency($data['currency'], $v['amount']);?></td>
			<td><i onClick="uap_remove_wallet_item('<?php echo $v['type']?>', '<?php echo $v['code']?>');" class="fa-uap fa-trash-uap"></i></td>
		</tr>
	<?php endforeach;?>
	</table>
<?php endif;?>


-->






</div>

<script>
	var uap_current_url = '<?php echo $base_url;?>';
</script>
