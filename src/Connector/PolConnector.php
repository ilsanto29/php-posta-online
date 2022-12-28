<?php
declare(strict_types=1);
namespace phpPostaOnline\Connector;
use phpPostaOnline\Connector\Adapter\PostaOnline;

class PolConnector extends  PostaOnline
{
    protected $config = null;
    
    public function __construct() {
        
    }
    
    public function connect(): bool
    {
        
    }
}