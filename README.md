# All-in-One-GDPR Integration
### Example of how to integrate with the All-in-One GDPR WordPress plugin

This repository is a working WordPress Plugin. If you are going to build an integration for All-in-One GDPR, fork or download this rep to get started.


```php
class ExampleIntegration extends AIOGDPRIntegration{

	public $name = 'Example';
	public $slug = 'example';

	public function boot(){
		if(!class_exists('\My\API\Class')){
			require_once dirname(__FILE__) .'/My-API-Class.php';
		}
	}

	public function view(){
		include plugin_dir_path(__FILE__) .'view.php';
	}

	public function viewSubmit(){
		update_option('example_api_token', $_REQUEST['example_api_token']);

		$this->redirectBack();
	}



	// When a user unsubscribes this method will be called. 
	public function onUnsubscribe($user, $email){
		$request = curl_init(); 
		curl_setopt($request, CURLOPT_URL, "http://example.com"); 
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_exec($request); 
		curl_close($request);
	}
	
	public function onSAR($user, $email){}

	public function onPermissionGranted($user, $email){}

	public function onPermissionDeclined($user, $email){}

}

ExampleIntegration::register();
```

view.php (optional admin settings page)
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
