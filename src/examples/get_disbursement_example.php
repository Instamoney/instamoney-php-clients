<?php
    require('config/instamoney_php_client_config.php');
    require('InstamoneyPHPClient.php');
    
    $options['secret_api_key'] = constant('SECRET_API_KEY');

    $instamoneyPHPClient = new InstamoneyClient\InstamoneyPHPClient($options);

    $disbursement_id = $argv[1];

    $response = $instamoneyPHPClient->getDisbursement($disbursement_id);
    print_r($response);
?>
