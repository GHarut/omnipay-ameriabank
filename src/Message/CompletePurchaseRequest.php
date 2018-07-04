<?php
namespace Omnipay\Ameriabank\Message;


use Symfony\Component\HttpFoundation\ParameterBag;
/**
 * Class CompletePurchaseRequest
 * @package Omnipay\Ameriabank\Message
 */
class CompletePurchaseRequest extends PurchaseRequest
{
    /**
     * Prepare and get data
     * @return mixed|void
     */
    public function getData()
    {
        return $this->validateRequest($this->httpRequest->request);
    }


    /**
     * Send data and return response
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\Ameriabank\Message\CompletePurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }


    /**
     * Get Payment Fields Ameria Bank
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getPaymentFields()
    {
        $data = [
            'OrderID'       => $this->getOrderId(),
            'Username'      => $this->getUsername(),
            'Password'      => $this->getPassword(),
            'ClientID'      => $this->getClientId(),
            'PaymentAmount' => $this->getAmount(),
            'testMode'      => $this->getTestMode()
        ];

        $response = new CompletePurchaseResponse($this, $data);;
        return $this->response = $response->getPaymentFields();
    }


    /**
     * Validate request and return data, merchant has to echo with just 'OK' at the end
     *
     * @param \Symfony\Component\HttpFoundation\ParameterBag $requestData
     *
     * @return array
     */
    protected function validateRequest(ParameterBag $requestData)
    {
        $data = $requestData->all();

        $data['success'] = false;
        // Check for required request data
        if ($requestData->has('Username') &&
            $requestData->has('ClientID') &&
            $requestData->has('Password') &&
            $requestData->has('OrderID') &&
            $requestData->has('PaymentAmount')) {
            $data['success'] = true;
        }
        return $data;
    }
}