<?php
declare(strict_types=1);
namespace phpPostaOnline\Connector\Adapter;
use phpPostaOnline\Connector\Payload\Request\Tol\Mittente as Mittente;
use phpPostaOnline\Connector\Payload\Request\RecipientsValidation as RecipientsValidation;

abstract class PostaOnline
{
    
    const TOL = "Tol";
    const ROL = "Rol";
    const LOL = "Lol";
    
    private $mittente;
    
    private $debug = false;
    
    private $serviceType = null;
    
    /**
     * 
     * @var configuration
     */
    private $config = null;
    
    /**
     *
     * @var \SoapClient
     */
    private $client = null;
    
    /**
     * @return mixed
     */
    public function getMittente()
    {
        return $this->mittente;
    }
    
    public function validateAddress(array $address, $idRequest):array {
        switch($this->getServiceType()) {
            case self::TOL:
                $this->recipientsValidation = new RecipientsValidation();
                $this->recipientsValidation->hydrate($address);
                break;
        }
        return [];
    }
    
    /**
     * @param mixed $mittente
     */
    public function setMittente($mittente)
    {
        switch($this->getServiceType()) {            
            case self::TOL:
                $this->mittente = new Mittente();
                $this->mittente->hydrate($mittente); 
                break;
        }        
    }

    /**
     * @return boolean
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * @return mixed
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param mixed $serviceType
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
    }

    /**
     * @return \phpPostaOnline\Connector\Adapter\configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return SoapClient
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \phpPostaOnline\Connector\Adapter\configuration $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @param SoapClient $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    
    
    
    /**
     * 
     * @return bool
     */
    abstract public function connect(): bool;
    
    
}