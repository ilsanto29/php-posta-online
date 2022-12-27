<?php
declare(strict_types=1);
namespace postaOnline\Connector\Adapter;

abstract class PostaOnline
{
    abstract public function connect(): bool;
}