<?php

$app->post('/api/MicrosoftContentModerator/detectProfanityLanguage', function ($request, $response) {

    $arrayApi = array(
        'West US' => 'westus',
        'West US 2' => 'westus2',
        'East US' => 'eastus',
        'East US 2' => 'eastus2',
        'West Central US' => 'westcentralus',
        'South Central US' => 'southcentralus',
        'West Europe' => 'westeurope',
        'North Europe' => 'northeurope',
        'Southeast Asia' => 'southeastasia',
        'East Asia' => 'eastasia',
        'Australia East' => 'australiaeast',
        'Brazil South' => 'brazilsouth'
    );


    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','region','text','contentType','language']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'apiKey','region'=>'region','text'=>'text','language'=>'language','contentType' => 'contentType'];
    $optionalParams = ['autocorrect'=>'autocorrect','personalIdentifiableInformation'=>'Pll','listId'=>'listId'];
    $bodyParams = [
       'body' => ['text'],
       'query' => ['autocorrect','listId','language','Pll']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);
    $data['region'] = $arrayApi[$data['region']];

    

    $client = $this->httpClient;
    $query_str = "https://{$data['region']}.api.cognitive.microsoft.com/contentmoderator/moderate/v1.0/ProcessText/Screen";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Ocp-Apim-Subscription-Key"=>"{$data['apiKey']}","Content-Type" => "{$data['contentType']}"];
     

    try {
        $resp = $client->post($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});