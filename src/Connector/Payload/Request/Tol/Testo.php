<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;

class Testo
{
    public $NumeroParteCorrente = 0;
    public $Testo = null;
    /**
     * @return number
     */
    public function getNumeroParteCorrente()
    {
        return $this->NumeroParteCorrente;
    }

    /**
     * @return mixed
     */
    public function getTesto()
    {
        return $this->Testo;
    }

    /**
     * @param number $NumeroParteCorrente
     */
    public function setNumeroParteCorrente($NumeroParteCorrente)
    {
        $this->NumeroParteCorrente = $NumeroParteCorrente;
    }

    /**
     * @param mixed $Testo
     */
    public function setTesto($Testo)
    {
        $this->Testo = $Testo;
    }

    
    
}