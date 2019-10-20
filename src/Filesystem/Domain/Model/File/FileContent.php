<?php
declare(strict_types = 1);

namespace App\Filesystem\Domain\Model\Folder;

final class FileContent
{
    const MAX_LENGTH = 10000;

    private $value;

    public function __construct(string $value)
    {
        $this->ensureLength($value);

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureLength(string $name): void
    {
        if (strlen($name) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException('The name folder length can\'t be greater than ' . self::MAX_LENGTH);
        }
    }

    public function __toString()
    {
        return $this->value();
    }
}