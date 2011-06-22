# FuelPHP OAuth2 package

> Ported from OAuth 2.0 PHP client. <https://github.com/vznet/oauth_2.0_client_php>

##Installation
Add `oauth` to the packages array in app/config/config.php.

## Usage

A quick example how to use:

	// configuration of client credentials
	$client = new OAuth\Client(
	        'CLIENT_ID',
	        'CLIENT_SECRET',
	        'CALLBACK_URL');

	// configuration of service
	$configuration = new OAuth\Service_Configuration(
	        'AUTHORIZE_ENDPOINT',
	        'ACCESS_TOKEN_ENDPOINT');

	// storage class for access token, just extend OAuth2_Datastore_Abstract for
	// your own implementation
	$datastore = new OAuth\Datastore_Session();

	$scope = null;

	$service = new OAuth\Service($client, $configuration, $datastore, $scope);

	if (\Input::get('action')) {

	    switch (strtolower(\Input::get('action'))) {
	        case 'authorize':
	            // redirects to authorize endpoint
	            $service->authorize();
	            break;
	        case 'requestapi':
	            // calls api endpoint with access token
	            echo $service->callApiEndpoint('API_ENDPOINT');
	            break;
	    }
	}

	if (\Input::get('code')) {
	    // retrieve access token from endpoint
	    $service->getAccessToken();
	}

	$token = $datastore->retrieveAccessToken();