<?php
namespace phpPostaOnline\Connector\Payload\Request;
use phpPostaOnline\Connector\Payload\Request\Tol\Recipient as Reciptient;
class RecipientsValidation
{
    public $idRequest;
    public $recipients = [];
    /**
     * @return mixed
     */
    public function getIdRequest()
    {
        return $this->idRequest;
    }

    /**
     * @return multitype:
     */
    public function getRecipients()
    {
        return $this->recipients;
    }

    /**
     * @param mixed $idRequest
     */
    public function setIdRequest($idRequest)
    {
        $this->idRequest = $idRequest;
    }

    /**
     * @param multitype: $recipients
     */
    private function setRecipientsSingle($recipient)
    {
        $recipientObj = new Reciptient();
        $recipientObj->hydrate($recipient);
        $this->recipients[] = $recipientObj;
    }

    /**
     * @param multitype: $recipients
     */
    public function setRecipients(array $recipient)
    {
        foreach( $recipient as $key => $val) {
            $this->setRecipientsSingle($val);
        }
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