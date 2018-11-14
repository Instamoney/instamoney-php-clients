<?php
    require('config/instamoney_php_client_config.php'); 
    require('InstamoneyPHPClient.php');
    
    $options['secret_api_key'] = constant('SECRET_API_KEY');

    $instamoneyPHPClient = new InstamoneyClient\InstamoneyPHPClient($options);

    $external_id = $argv[1];
    $bank_code = $argv[2];
    $name = $argv[3];

    $response = $instamoneyPHPClient->createCallbackVirtualAccount($external_id, $bank_code, $name);
    print_r($response);
?>
