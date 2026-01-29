<?php

declare(strict_types=1);

namespace PHPStan\Extension;

use Gember\EventSourcing\UseCase\Attribute\DomainEventSubscriber;
use PHPStan\Reflection\ExtendedMethodReflection;
use PHPStan\Rules\Methods\AlwaysUsedMethodExtension;

final readonly class DomainEventSubscriberMethodExtension implements AlwaysUsedMethodExtension
{
    public function isAlwaysUsed(ExtendedMethodReflection $methodReflection): bool
    {
        return array_any(
            $methodReflection->getAttributes(),
            fn($attribute) => $attribute->getName() === DomainEventSubscriber::class,
        );
    }
}
