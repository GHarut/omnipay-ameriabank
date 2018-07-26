<?php
namespace Omnipay\Ameriabank\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;
/**
 * Class PurchaseResponse
 * @package Omnipay\Ameriabank\Message
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{

    /**
     * Gateway payment Url
     * @var string
     */
    protected $paymentUrl = 'https://payments.ameriabank.am/webservice/PaymentService.svc?wsdl';
    protected $paymentTestUrl = 'https://testpayments.ameriabank.am/webservice/PaymentService.svc?wsdl';


    /**
     * Gateway $endpoint
     * @var string
     */
    protected $endpoint = 'https://payments.ameriabank.am/forms/frm_paymentstype.aspx';
    protected $endpointTest = 'https://testpayments.ameriabank.am/forms/frm_paymentstype.aspx';


    /**
     * Set successful to false, as transaction is not completed yet
     * @return bool
     */
    public function isSuccessful()
    {
        return false;
    }


    /**
     * Mark purchase as redirect type
     * @return bool
     */
    public function isRedirect()
    {
        return true;
    }


    /**
     * Get redirect URL
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->data['testMode'] ? $this->endpointTest.'?'.http_build_query($this->getRedirectData())
                                       : $this->endpoint.'?'.http_build_query($this->getRedirectData());
    }


    /**
     * Get redirect method
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }


    /**
     * Get redirect data
     * @return array|mixed
     */
    public function getRedirectData()
    {
        return $this->data;
    }


    /**
     * Create Payment Request Soap coll
     * @return mixed
     */
    public function createPaymentRequest()
    {
        $client = new \SoapClient($this->getPaymentUrl(), [
            'soap_version'    => SOAP_1_1,
            'exceptions'      => true,
            'trace'           => 1,
            'wsdl_local_copy' => true
        ]);

        $args['paymentfields'] = array(
            'Opaque'        => $this->data['Opaque'],
            'backURL'       => $this->data['backURL'],
            'OrderID'       => $this->data['OrderID'],
            'Username'      => $this->data['Username'],
            'Password'      => $this->data['Password'],
            'ClientID'      => $this->data['ClientID'],
            'Description'   => $this->data['Description'],
            'Currency'      => $this->data['Currency'],
            'PaymentAmount' => $this->data['PaymentAmount'],
        );
        dd($args);
        return $webService = $client->GetPaymentID($args);
    }
}
