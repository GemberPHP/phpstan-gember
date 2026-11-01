<?php

declare(strict_types=1);

namespace Gember\PHPStan\Extension;

use Gember\EventSourcing\UseCase\Attribute\DomainEventSubscriber;
use PHPStan\Reflection\ExtendedMethodReflection;
use PHPStan\Rules\Methods\AlwaysUsedMethodExtension;

final readonly class DomainEventSubscriberMethodExtension implements AlwaysUsedMethodExtension
{
    public function isAlwaysUsed(ExtendedMethodReflection $methodReflection): bool
    {
        foreach ($methodReflection->getAttributes() as $attribute) {
            if ($attribute->getName() === DomainEventSubscriber::class) {
                return true;
            }
        }

        return false;
    }
}
