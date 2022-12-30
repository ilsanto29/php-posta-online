<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;

class Mittente
{    
    public $CAP;
    public $Citta;
    public $Cognome;
    public $Indirizzo;
    public $InvioAlMittente = 0;
    public $Nome;
    public $RagioneSociale;
    public $Telefono;
    /**
     * @return mixed
     */
    public function getCAP()
    {
        return $this->CAP;
    }

    /**
     * @return mixed
     */
    public function getCitta()
    {
        return $this->Citta;
    }

    /**
     * @return mixed
     */
    public function getCognome()
    {
        return $this->Cognome;
    }

    /**
     * @return mixed
     */
    public function getIndirizzo()
    {
        return $this->Indirizzo;
    }

    /**
     * @return number
     */
    public function getInvioAlMittente()
    {
        return $this->InvioAlMittente;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @return mixed
     */
    public function getRagioneSociale()
    {
        return $this->RagioneSociale;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param mixed $CAP
     */
    public function setCAP($CAP)
    {
        $this->CAP = $CAP;
    }

    /**
     * @param mixed $Citta
     */
    public function setCitta($Citta)
    {
        $this->Citta = $Citta;
    }

    /**
     * @param mixed $Cognome
     */
    public function setCognome($Cognome)
    {
        $this->Cognome = $Cognome;
    }

    /**
     * @param mixed $Indirizzo
     */
    public function setIndirizzo($Indirizzo)
    {
        $this->Indirizzo = $Indirizzo;
    }

    /**
     * @param number $InvioAlMittente
     */
    public function setInvioAlMittente($InvioAlMittente)
    {
        $this->InvioAlMittente = $InvioAlMittente;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    /**
     * @param mixed $RagioneSociale
     */
    public function setRagioneSociale($RagioneSociale)
    {
        $this->RagioneSociale = $RagioneSociale;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }

    public function extract() {
        return get_object_vars($this);
    }
    
    public function hydrate(array $arrayData): void  {
        foreach( $arrayData as $key => $val ) {
            $method = "set$key";
            self::$method($val);
        }
    }
    
}