<?php

class ExampleIntegration extends AIOGDPRIntegration{

	public $name = 'Example';
	public static $slug = 'example';


	public function page(){
		include plugin_dir_path(__FILE__) .'page.php';
	}

	public function adminSubmit(){
		update_option('example_api_token', $_REQUEST['example_api_token']);

		$this->redirectBack();
	}


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