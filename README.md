# All-in-One-GDPR Integration
### Example of how to integrate with the All-in-One GDPR WordPress plugin

This repository is a working WordPress Plugin. If you are going to build an integration for [All-in-One GDPR](https://gdprplug.in/), fork or download this rep to get started.

For more informtion about how to make a integrtion for All-in-One GDPR please refer to the [GDPRPlug.in/Documentation](https://gdprplug.in/documentation)


```php
class ExampleIntegration extends AIOGDPRIntegration{

	public $title = 'Example Integration';
	public $slug  = 'example-Integration';

	public function boot(){
		if(!class_exists('\My\API\Class')){
			// Require dependencies here.
			// require_once dirname(__FILE__) .'/My-API-Class.php';
		}
	}

	public function view(){
		include dirname(__FILE__) .'/view.php';
	}
	
	public function viewSubmit(){

		if($this->has('example_api_token')){
			update_option('example_api_token', $this->get('example_api_token'));
		}

		$this->redirectBack();
	}


	// -----------------------------------------------------
	// Actions
	// -----------------------------------------------------
	public function onSuperUnsubscribe($email, $firstName = NULL, $lastName = NULL, $user = NULL){
		$request = curl_init(); 
		curl_setopt($request, CURLOPT_URL, "http://example.com"); 
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_exec($request); 
		curl_close($request);
	}

	public function onSubjectAccessRequest($email, $firstName = NULL, $lastName = NULL, $user = NULL){
		
		// Your Code Here!

	}
}

ExampleIntegration::register();
```

view.php (optional admin settings page)
```php
<form method="post" action="<?= MailchimpIntegration::formURL() ?> ">
	<input type="hidden" name="action" value="<?= MailchimpIntegration::action() ?>">

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
```


<p align="center"><img src="https://GDPRPlug.in/static/example-integration.png"></p>
