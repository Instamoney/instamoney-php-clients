<?php

    namespace InstamoneyClient;

    class InstamoneyPHPClient {
        function __construct ($options) {
            $this->server_domain = 'https://api.instamoney.co';
            $this->secret_api_key = $options['secret_api_key'];
        }

        function createDisbursement ($external_id, $amount, $bank_code, $account_holder_name, $account_number, $disbursement_options = null) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            if (!empty($disbursement_options['X-IDEMPOTENCY-KEY'])) {
                array_push($headers, 'X-IDEMPOTENCY-KEY: '.$disbursement_options['X-IDEMPOTENCY-KEY']);
            }

            $end_point = $this->server_domain.'/disbursements';

            $data['external_id'] = $external_id;
            $data['amount'] = (int)$amount;
            $data['bank_code'] = $bank_code;
            $data['account_holder_name'] = $account_holder_name;
            $data['account_number'] = $account_number;

            if (!empty($disbursement_options['description'])) {
                $data['description'] = $disbursement_options['description'];
            }

            $payload = json_encode($data);

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        function getVirtualAccountBanks () {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/available_virtual_account_banks';

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        function createCallbackVirtualAccount ($external_id, $bank_code, $name, $virtual_account_number = null) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/callback_virtual_accounts';

            $data['external_id'] = $external_id;
            $data['bank_code'] = $bank_code;
            $data['name'] = $name;

            if (!empty($virtual_account_number)) {
                $data['virtual_account_number'] = $virtual_account_number;
            }

            $payload = json_encode($data);

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        function getDisbursement ($disbursement_id) {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/disbursements/'.$disbursement_id;

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        function getAvailableDisbursementBanks () {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/available_disbursements_banks';

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }

        function getBalance () {
            $curl = curl_init();

            $headers = array();
            $headers[] = 'Content-Type: application/json';

            $end_point = $this->server_domain.'/balance';

            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_USERPWD, $this->secret_api_key.":");
            curl_setopt($curl, CURLOPT_URL, $end_point);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
            curl_close($curl);

            $responseObject = json_decode($response, true);
            return $responseObject;
        }
    }
?>
