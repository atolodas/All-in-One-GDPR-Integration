<?php

class ExampleIntegration extends AIOGDPRIntegration{
 
	public $name = 'Example Integration';
	public $slug = 'example-Integration';

	
	public function boot(){
		if(!class_exists('\My\API\Class')){
			// require_once dirname(__FILE__) .'/My-API-Class.php';
		}
	}

	public function view(){
		include plugin_dir_path(__FILE__) .'view.php';
	}

	public function viewSubmit(){
		update_option('example_api_token', $_REQUEST['example_api_token']);

		$this->redirectBack();
	}



	public function onUnsubscribe($email, $user){
		$request = curl_init(); 
		curl_setopt($request, CURLOPT_URL, "http://example.com"); 
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
		curl_exec($request); 
		curl_close($request);
	}

	public function onSAR($email, $user){}

	public function onPermissionGranted($email, $user){}

	public function onPermissionDeclined($email, $user){}

}

ExampleIntegration::register();