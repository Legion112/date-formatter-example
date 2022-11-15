<?php
declare(strict_types=1);

interface DateFormatterInterface {
    public function formatDate(DateTimeInterface $date):string;
}

class DateFormatter implements DateFormatterInterface
{
    public function __construct(private readonly string $format)
    {

    }

    public function formatDate(DateTimeInterface $date): string
    {
        return $date->format($this->format);
    }
}
class Entity {
    public function __construct(public readonly DateTimeInterface $createdAt)
    {
    }
}

class Response {
    public function __construct(public readonly string $createdAt)
    {
    }
}

class Mapper {
    public function __construct(private readonly DateFormatter $dateFormatter)
    {
    }

    public function map(Entity  $object):Response
    {
        return new Response($this->dateFormatter->formatDate($object->createdAt));
    }
}