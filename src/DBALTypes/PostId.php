<?php namespace Example\DBALTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Class PostId
 * @package Example\DBALTypes
 */
final class PostId extends Type
{
    /**
     * @var string
     */
    const POSTID = 'memberid'; // modify to match your type name

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
     * @return \Example\ValueObjects\PostId
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \Example\ValueObjects\PostId($value);
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
        return self::POSTID; // modify to match your constant name
    }
}
