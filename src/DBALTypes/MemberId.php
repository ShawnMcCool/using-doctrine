<?php namespace Example\DBALTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class MemberId extends Type
{
    const MEMBERID = 'memberid'; // modify to match your type name

    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL([]);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \Example\ValueObjects\MemberId($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    public function getName()
    {
        return self::MEMBERID; // modify to match your constant name
    }
}
