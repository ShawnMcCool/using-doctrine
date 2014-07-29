<?php namespace Example\DBALTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class MemberId
 * @package Example\DBALTypes
 */
final class MemberId extends Type
{
    /**
     * @var string
     */
    const MEMBERID = 'memberid'; // modify to match your type name

    /**
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string
     */
    public function getSqlDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL([]);
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return \Example\ValueObjects\MemberId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \Example\ValueObjects\MemberId($value);
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string) $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::MEMBERID; // modify to match your constant name
    }
}
