<?php

namespace Omnipay\Ameriabank\Message;
use Omnipay\Common\Message\AbstractRequest;

/**
 * Class PurchaseRequest
 * @package Omnipay\Ameriabank\Message
 */
class PurchaseRequest extends AbstractRequest
{

    /**
     * Currency ISO codes.
     *
     * @var array
     */
    protected static $currencyISOCodes = [
        'AMD' => '051',
        'USD' => '840',
        'EUR' => '978',
        'RUB' => '643'
    ];

    /**
     * Sets the request language.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setParameter('lang', $value);
    }


    /**
     * Get the request language.
     * @return $this
     */
    public function getLanguage()
    {
        return $this->getParameter('lang');
    }


    /**
     * Sets the request client ID.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setClientId($value)
    {
        return $this->setParameter('clientId', $value);
    }


    /**
     * Get the request client ID.
     * @return $this
     */
    public function getClientId()
    {
        return $this->getParameter('clientId');
    }


    /**
     * Sets the request username.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }


    /**
     * Get the request username.
     * @return $this
     */
    public function getUsername()
    {
        return $this->getParameter('username');
    }


    /**
     * Sets the request Opaque.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setOpaque($value)
    {
        return $this->setParameter('opaque', $value);
    }


    /**
     * Get the request Opaque.
     * @return $this
     */
    public function getOpaque()
    {
        return $this->getParameter('opaque');
    }


    /**
     * Sets the request OrderID.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setOrderId($value)
    {
        return $this->setParameter('orderID', $value);
    }


    /**
     * Get the request OrderID.
     * @return $this
     */
    public function getOrderId()
    {
        return $this->getParameter('orderID');
    }


    /**
     * Sets the request password.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }


    /**
     * Get the request password.
     * @return $this
     */
    public function getPassword()
    {
        return $this->getParameter('password');
    }


    /**
     * Sets the request payment id.
     *
     * @param $value
     *
     * @return $this
     */
    public function setPaymentId($value)
    {
        return $this->setParameter('paymentid', $value);
    }


    /**
     * Get the request payment id.
     * @return $this
     */
    public function getPaymentId()
    {
        return $this->getParameter('paymentid');
    }


    /**
     * Sets the request ClientUrl.
     *
     * @param $value
     *
     * @return $this
     */
    public function setClientUrl($value)
    {
        return $this->setParameter('clienturl', $value);
    }


    /**
     * Get the request Client Url.
     * @return $this
     */
    public function getClientUrl()
    {
        return $this->getParameter('clienturl');
    }


    /**
     * Prepare data to send
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('clientId', 'username', 'password');
        return [
            'Opaque'        => $this->getOpaque(),
            'backURL'       => $this->getReturnUrl(),
            'OrderID'       => $this->getOrderId(),
            'Username'      => $this->getUsername(),
            'Password'      => $this->getPassword(),
            'ClientID'      => $this->getClientId(),
            'Description'   => $this->getDescription(),
            'Currency'      => self::$currencyISOCodes[$this->getCurrency()],
            'PaymentAmount' => $this->getAmount(),
            'clienturl'     => $this->getClientUrl(),
            'paymentid'     => $this->getPaymentId(),
            'lang'          => $this->getLanguage(),
            'testMode'      => $this->getTestMode()
        ];
    }
    /**
     * Send data and return response instance
     *
     * @param mixed $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface|\Omnipay\Ameriabank\Message\PurchaseResponse
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }


    /**
     * Create Payment Request Ameria Bank
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function createPaymentRequest()
    {
        $data = [
            'Opaque'        => $this->getOpaque(),
            'backURL'       => $this->getReturnUrl(),
            'OrderID'       => $this->getOrderId(),
            'Username'      => $this->getUsername(),
            'Password'      => $this->getPassword(),
            'ClientID'      => $this->getClientId(),
            'Description'   => $this->getDescription(),
            'Currency'      => self::$currencyISOCodes[$this->getCurrency()],
            'PaymentAmount' => $this->getAmount(),
            'testMode'      => $this->getTestMode()

        ];

        $response = new PurchaseResponse($this, $data);
        return $this->response = $response->createPaymentRequest();
    }

}