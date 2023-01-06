<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;

use PhpParser\Node\Expr\Array_;

class Telegramma
{
    public $DataTelegramma = new \Date();
    public $Destinatari = Array(new TelegrammaDestinatario());
    public $Firma = null;
    public $GUIDMessage = null;
    public $Jokid = new Destinazioni();
    public $Mittente = new Mittente();
    public $Nazionale = 1;
    public $Opzioni = new Opzioni();
    public $PartiTesto = new Testo();
    /**
     * @return \Date
     */
    public function getDataTelegramma()
    {
        return $this->DataTelegramma;
    }

    /**
     * @return multitype:\phpPostaOnline\Connector\Payload\Request\Tol\TelegrammaDestinatario 
     */
    public function getDestinatari()
    {
        return $this->Destinatari;
    }

    /**
     * @return mixed
     */
    public function getFirma()
    {
        return $this->Firma;
    }

    /**
     * @return mixed
     */
    public function getGUIDMessage()
    {
        return $this->GUIDMessage;
    }

    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\Mittente
     */
    public function getMittente()
    {
        return $this->Mittente;
    }

    /**
     * @return number
     */
    public function getNazionale()
    {
        return $this->Nazionale;
    }

    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\Opzioni
     */
    public function getOpzioni()
    {
        return $this->Opzioni;
    }

    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\Testo
     */
    public function getPartiTesto()
    {
        return $this->PartiTesto;
    }

    /**
     * @param \Date $DataTelegramma
     */
    public function setDataTelegramma($DataTelegramma)
    {
        $this->DataTelegramma = $DataTelegramma;
    }

    /**
     * @param multitype:\phpPostaOnline\Connector\Payload\Request\Tol\TelegrammaDestinatario  $Destinatari
     */
    public function setDestinatari($Destinatari)
    {
        $this->Destinatari = $Destinatari;
    }

    /**
     * @param mixed $Firma
     */
    public function setFirma($Firma)
    {
        $this->Firma = $Firma;
    }

    /**
     * @param mixed $GUIDMessage
     */
    public function setGUIDMessage($GUIDMessage)
    {
        $this->GUIDMessage = $GUIDMessage;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\Mittente $Mittente
     */
    public function setMittente($Mittente)
    {
        $this->Mittente = $Mittente;
    }

    /**
     * @param number $Nazionale
     */
    public function setNazionale($Nazionale)
    {
        $this->Nazionale = $Nazionale;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\Opzioni $Opzioni
     */
    public function setOpzioni($Opzioni)
    {
        $this->Opzioni = $Opzioni;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\Testo $PartiTesto
     */
    public function setPartiTesto($PartiTesto)
    {
        $this->PartiTesto = $PartiTesto;
    }

    
    
}