<?php

namespace FOS\OAuthServerBundle\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class LegacyArrayType extends Type
{
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getClobTypeDeclarationSQL($column);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        return $value === null ? null : serialize($value);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        return $value === null ? null : unserialize($value);
    }

    public function getName(): string
    {
        return 'array';
    }
}
