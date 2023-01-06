<?php
declare(strict_types=1);
namespace phpPostaOnline\Connector;
use phpPostaOnline\Connector\Adapter\PostaOnline;
use Laminas\Soap\Client;
use phpPostaOnline\Connector\Exception\Exception;

class PolConnector extends PostaOnline
{
    
    private static $messages = array(
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Syntax error, malformed JSON',
        JSON_ERROR_CTRL_CHAR => 'Unexpected control character found',
        JSON_ERROR_SYNTAX => 'Syntax error, malformed JSON',
        5 /*JSON_ERROR_UTF8*/ => 'Invalid UTF-8 sequence',
        6 /*JSON_ERROR_RECURSION*/ => 'Recursion detected',
        7 /*JSON_ERROR_INF_OR_NAN*/ => 'Inf and NaN cannot be JSON encoded',
        8 /*JSON_ERROR_UNSUPPORTED_TYPE*/ => 'Type is not supported',
    );
    
    public function __construct($config = null) {              
        if (! isset($config['postalService'])) {
            throw new \Exception('Configuration postalService not set.');
        }
        $this->config = $config['postalService'];        
        ini_set('soap.wsdl_cache_enabled',"1");
        ini_set('soap.wsdl_cache_ttl',"1");
        ini_set('soap.wsdl_cache_dir', "/tmp");        
    }
    
    public function connect():bool {
        $config = [
            'soap_version' => SOAP_1_1 , 
            'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_DEFLATE,
            'cachewsdl' => WSDL_CACHE_MEMORY,
            'connectiontimeout' => 10,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
            'keepalive' => 1,
            "stream_context" =>
            stream_context_create(
                [
                    //'trace' => 1,
                    'ssl' => [
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                    ],
                ]
            ),
        ];
        
        try {
            $this->client = new Client(
                    $this->config["wsdl" . $this->getServiceType()],
                    $config
                );
            $this->client->setUri($this->config["endPoint" . $this->getServiceType()]);
            $this->client->setLocation($this->config["endPoint" . $this->getServiceType()]);
        } catch(\Exception $e ) {
            $ret = $e->getMessage();
            if( $this->isDebug() ) {
                echo $ret; die();
            }
        } catch (\SoapFault $e ) {
            $ret = $e->getMessage();
            if( $this->isDebug() ) {
                echo $ret; die();
            }            
        }
        return true;
    }
    
    private function login($username, $password):void {
        if( empty( $username) || empty( $password) ) {
            $username = $this->config["username"];
            $password = $this->config["password"];
        }
        if( empty( $username ) || empty( $password )) {
            throw new \Exception('Check Username or\\and Password');
        }        
        $this->client->setHttpLogin($username);
        $this->client->setHttpPassword($password);
    }
    
    
    public function __call($SoapAction = null, $data = []) {
        // needed to receive 'recursion detected' error
        set_error_handler(function($severity, $message) {
            restore_error_handler();
            throw new JsonException($message);
        });
        
        try {
            $username = (!empty( $data[0]["username"] )?$data[0]["username"]:null);
            $password = (!empty( $data[0]["password"] )?$data[0]["password"]:null);            
            $this->connect();
            $this->login( $username , $password );
            $ret = $this->client->call( $SoapAction, (!empty($data[0]["data"])?$data[0]["data"]:null) );
            $xml = $this->client->getLastRequest();
            if( empty( $ret ) ) { return null;  }
            //if( $SoapAction == self::ACTION_SUBMIT ) $this->logger->log(__FUNCTION__ .  " $SoapAction " . print_r( $ret, 1) );
            return $ret;
        } catch(\Exception $e ) {
            $xml = $this->client->getLastRequest();
            $ret = $e->getMessage();
            if( $this->isDebug() ) {
                echo "<textarea>$xml</textarea>";
                echo "Errore 1 " . $e->getMessage(); die();                
                echo $ret; die();
            }            
            throw new Exception($e->getMessage(), $e->getCode() );
            
        } catch (\SoapFault $e ) {
            $xml = $this->client->getLastRequest();
            $ret = $e->getMessage();
            if( $this->isDebug() ) {
                echo "<textarea>$xml</textarea>";
                echo "Errore 1 " . $e->getMessage(); die();
                echo $ret; die();
            }
            throw new Exception($e->getMessage(), $e->getCode() );
        } catch (RuntimeException $e) {
            $xml = $this->client->getLastRequest();
            $ret = $e->getMessage();
            if( $this->isDebug() ) {
                echo "<textarea>$xml</textarea>";
                echo "Errore 1 " . $e->getMessage(); die();
                echo $ret; die();
            }
            throw new Exception($e->getMessage(), $e->getCode() );
        }
        return false;
        //throw new \Exception("Non e' stato possibile reperire la richiesta", 90001);
    }  
    
}