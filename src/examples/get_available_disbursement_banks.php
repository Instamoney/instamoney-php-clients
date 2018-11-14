<?php
    require('config/instamoney_php_client_config.php');
    require('InstamoneyPHPClient.php');
    
    $options['secret_api_key'] = constant('SECRET_API_KEY');

    $instamoneyPHPClient = new InstamoneyClient\InstamoneyPHPClient($options);

    $response = $instamoneyPHPClient->getAvailableDisbursementBanks();
    print_r($response);
?>
