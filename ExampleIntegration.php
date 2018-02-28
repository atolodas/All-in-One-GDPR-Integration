<?php

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