<?php
declare(strict_types = 1);

namespace App\Filesystem\Domain\Model\File;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

final class FileId
{
    private $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);

        $this->value = $value;
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->__toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    public function __toString()
    {
        return $this->value();
    }
}
