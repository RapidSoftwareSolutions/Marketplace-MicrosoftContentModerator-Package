<?php

$app->post('/api/MicrosoftContentModerator/addImageInList', function ($request, $response) {



    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey','region','listId','imageUrl']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['apiKey'=>'apiKey','region'=>'region','listId'=>'listId','imageUrl'=>'Value'];
    $optionalParams = ['tag'=>'tag','label'=>'label'];
    $bodyParams = [
       'json' => ['Value'],
       'query' => ['listId','label','tag']
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);


    if(!empty($data['tag']))
    {
        $part = explode(':',$data['tag']);
        if(!empty($part[0]))
        {
            $data['tag'] = $part[0];
        }
    }


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
    $data['region'] = $arrayApi[$data['region']];

    

    $client = $this->httpClient;
    $query_str = "https://{$data['region']}.api.cognitive.microsoft.com/contentmoderator/lists/v1.0/imagelists/{$data['listId']}/images";

    

    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = ["Ocp-Apim-Subscription-Key"=>"{$data['apiKey']}"];
    if(!empty($data['Value']))
    {
        $requestParams['json']['DataRepresentation'] = 'Url';
    }



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