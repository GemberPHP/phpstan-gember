<?php

declare(strict_types=1);

namespace Gember\PHPStan\Extension;

use Gember\EventSourcing\UseCase\Attribute\DomainTag;
use PHPStan\Reflection\ExtendedPropertyReflection;
use PHPStan\Rules\Properties\ReadWritePropertiesExtension;

final readonly class DomainTagPropertyExtension implements ReadWritePropertiesExtension
{
    public function isAlwaysRead(ExtendedPropertyReflection $property, string $propertyName): bool
    {
        foreach ($property->getAttributes() as $attribute) {
            if ($attribute->getName() === DomainTag::class) {
                return true;
            }
        }

        return false;
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
