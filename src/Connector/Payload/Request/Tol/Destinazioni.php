<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;
class Destinazioni
{
    public $Fisica = new Fisica();
    public $IndirizziElettronici = new IndirizziElettronici();
    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\Fisica
     */
    public function getFisica()
    {
        return $this->Fisica;
    }

    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\IndirizziElettronici
     */
    public function getIndirizziElettronici()
    {
        return $this->IndirizziElettronici;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\Fisica $Fisica
     */
    public function setFisica($Fisica)
    {
        $this->Fisica = $Fisica;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\IndirizziElettronici $IndirizziElettronici
     */
    public function setIndirizziElettronici($IndirizziElettronici)
    {
        $this->IndirizziElettronici = $IndirizziElettronici;
    }

    
    
}
