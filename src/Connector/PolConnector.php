<?php
declare(strict_types=1);
namespace Connector;
use Connector\Adapter\PostaOnline;

class PolConnector extends  PostaOnline
{
    protected $config = null;
    
    public function __construct():void {
        
    }
    
    public function connect(): bool
    {
        
    }
}