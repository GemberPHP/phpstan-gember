<?php

declare(strict_types=1);

namespace PHPStan\Extension;

use Gember\EventSourcing\UseCase\Attribute\DomainTag;
use PHPStan\Reflection\ExtendedPropertyReflection;
use PHPStan\Rules\Properties\ReadWritePropertiesExtension;

final readonly class DomainTagPropertyExtension implements ReadWritePropertiesExtension
{
    public function isAlwaysRead(ExtendedPropertyReflection $property, string $propertyName): bool
    {
        return array_any(
            $property->getAttributes(),
            fn($attribute) => $attribute->getName() === DomainTag::class,
        );
    }

    public function isAlwaysWritten(ExtendedPropertyReflection $property, string $propertyName): bool
    {
        return false;
    }

    public function isInitialized(ExtendedPropertyReflection $property, string $propertyName): bool
    {
        return false;
    }
}
