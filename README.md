# All-in-One-GDPR-Integration
### Example of how to Integrate with the All-in-One GDPR plugin



```php
class ExampleIntegration extends AIOGDPRIntegration{

	public $name = 'Example';
	public static $slug = 'example';


	public function page(){
		include plugin_dir_path(__FILE__) .'page.php';
	}

	public function onUnsubscribe($user, $emai){
		$request = curl_init(); 
		curl_setopt($request, CURLOPT_URL, "http://example.com"); 
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_exec($request); 
		curl_close($request);
	}

	public function adminSubmit(){
		update_option('example_api_token', $_REQUEST['example_api_token']);
		$this->redirectBack();
	}
}

ExampleIntegration::register();
```

page.php (optional admin settings page)
```php
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
```

functions.php
```php

function AIO_GDPR_booted_callback(){
	require 'ExampleIntegration.php';
}
add_action('AIO_GDPR_booted', 'AIO_GDPR_booted_callback');

```


<p align="center"><img src="https://ideea.co.uk/wp-content/themes/ideea/build/images/integration-example.png"></p>
