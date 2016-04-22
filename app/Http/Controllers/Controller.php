<?php

namespace App\Http\Controllers;


use App\Modules\DawgUK\AmazonMWS\Amazon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use SimpleXMLElement;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index(){


        $arrConfig = array(
            'SellerId' => 'ANXST7NVE82WC',
            'MWSAuthToken' => 'ATVPDKIKX0DER',
            'AWSAccessKeyId' => 'AKIAIKIOAOW2W7A6OI2Q',
            'SecretKey' => '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',
            'Endpoint' => 'mws.amazonservices.co.uk'
        );

        $objAmazon = new Amazon($arrConfig);

        $arrListOrdersPayload = array(
            'MarketplaceId.Id.1' => 'A1F83G8C2ARO7P',
            'CreatedAfter' => '2016-01-01T19:00:00Z'
        );

        $objResponseXML = $objAmazon->call('Feeds/getFeedSubmissionList', $arrListOrdersPayload);

        var_dump($objResponseXML);
        //echo $objResponseXML->asXML();

        die;
        return 'dd';
    }
}
