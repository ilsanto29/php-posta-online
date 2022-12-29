<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;

class Preconfirm
{
    public $idRequest;
    public $autoConfirm         = 0;
    public $forceOrderCreation  = 1;
}