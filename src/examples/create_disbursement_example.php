<?php
    require('config/instamoney_php_client_config.php');
    require('InstamoneyPHPClient.php');
    
    $options['secret_api_key'] = constant('SECRET_API_KEY');

    $instamoneyPHPClient = new InstamoneyClient\InstamoneyPHPClient($options);

    $external_id = $argv[1];
    $amount = $argv[2];
    $bank_code = $argv[3];
    $account_holder_name = $argv[4];
    $account_number = $argv[5];

    $response = $instamoneyPHPClient->createDisbursement($external_id, $amount, $bank_code, $account_holder_name, $account_number);
    print_r($response);
?>
