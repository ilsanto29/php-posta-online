<?php
namespace phpPostaOnline\Connector\Payload\Request;

class Recipient
{
    public $ClientIDRecipient;
    public $destinatario;
    public $Provincia;
    
    
    
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