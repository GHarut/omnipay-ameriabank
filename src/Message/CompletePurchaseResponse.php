<?php
namespace Omnipay\Ameriabank\Message;
use Omnipay\Common\Message\AbstractResponse;
/**
 * Class CompletePurchaseResponse
 * @package Omnipay\Ameriabank\Message
 */
class CompletePurchaseResponse extends AbstractResponse
{

    /**
     * Gateway payment Url
     * @var string
     */
    protected $paymentUrl = 'https://payments.ameriabank.am/webservice/PaymentService.svc?wsdl';
    protected $paymentTestUrl = 'https://testpayments.ameriabank.am/webservice/PaymentService.svc?wsdl';


    /**
     * Indicates whether transaction was successful
     * @return bool
     */
    public function isSuccessful()
    {
        return !empty($this->data['success']);
    }


    /**
     * get payment Url
     * @return string
     */
    public function getPaymentUrl()
    {
        return $this->data['testMode'] ? $this->paymentTestUrl : $this->paymentUrl;
    }


    /**
     * Get Payment Fields Ameria Bank
     * @return mixed
     */
    public function getPaymentFields()
    {
        $client = new \SoapClient($this->getPaymentUrl(), [
            'soap_version'    => SOAP_1_1,
            'exceptions'      => true,
            'trace'           => 1,
            'wsdl_local_copy' => true
        ]);


        $args['paymentfields'] = array(
            'OrderID'       => $this->data['OrderID'],
            'Username'      => $this->data['Username'],
            'Password'      => $this->data['Password'],
            'ClientID'      => $this->data['ClientID'],
            'PaymentAmount' => $this->data['PaymentAmount'],
        );

        return $client->GetPaymentFields($args);
    }

}