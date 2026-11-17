<?php

declare(strict_types=1);

namespace FriendsOfBehat\SymfonyExtension\Bundle;

use Symfony\Component\DependencyInjection\ContainerInterface;

final class BehatContainerAccessor
{
    private static ?ContainerInterface $container = null;

    private function __construct()
    {
    }

    public static function set(?ContainerInterface $container): void
    {
        self::$container = $container;
    }

    public static function get(): ContainerInterface
    {
        if (null === self::$container) {
            throw new \LogicException(
                'The Behat container is not available. The "behat.service_container" service can only be used while a scenario is running.',
            );
        }

        return self::$container;
    }
}
