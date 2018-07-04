<?php
namespace Omnipay\Ameriabank;


use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\AbstractGateway;
use Omnipay\Ameriabank\Message\CompletePurchaseRequest;
use Omnipay\Ameriabank\Message\PurchaseRequest;
use Symfony\Component\HttpFoundation\Request as HttpRequest;


/**
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class Gateway extends AbstractGateway
{

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return 'Ameriabank';
    }


    /**
     * Gateway constructor.
     *
     * @param \Omnipay\Common\Http\ClientInterface|null      $httpClient
     * @param \Symfony\Component\HttpFoundation\Request|null $httpRequest
     */
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        parent::__construct($httpClient, $httpRequest);
    }


    /**
     * Get default parameters
     * @return array|\Illuminate\Config\Repository|mixed
     */
    public function getDefaultParameters()
    {
        return [
            'clientId' => '',
            'username' => '',
            'password' => '',
        ];
    }


    /**
     * Sets the request language.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }


    /**
     * Get the request language.
     * @return $this
     */
    public function getLanguage()
    {
        return $this->getParameter('language');
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
     * Create a purchase request
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $options = array())
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }


    /**
     * Complete purchase
     *
     * @param array $options
     *
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
    }
}
