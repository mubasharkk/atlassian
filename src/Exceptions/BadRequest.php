<?php

namespace Mubasharkk\Atlassian\Exceptions;

class BadRequest extends \JsonException
{

    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, 400);
        $this->message = $message;
    }

    public function toJson(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return json_decode($this->message);
    }
}