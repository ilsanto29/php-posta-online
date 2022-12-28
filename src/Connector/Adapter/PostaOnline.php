<?php
declare(strict_types=1);
namespace phpPostaOnline\Connector\Adapter;

abstract class PostaOnline
{
    abstract public function connect(): bool;
}