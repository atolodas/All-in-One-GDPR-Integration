<form method="post" action="<?= admin_url('/admin-ajax.php'); ?>">
	<input type="hidden" name="action" value="example">

	<table class="form-table">
		<tbody>	
			<tr>
				<th scope="row"><label for="example_api_token">Example </label></th>
				<td>
					<input name="example_api_token" type="text" id="example_api_token" aria-describedby="admin-email-description" value="<?= get_option('example_api_token') ?>" class="regular-text ltr">
				</td>
			</tr>
		</tbody>
	</table>

    <?php submit_button(); ?>
</form>