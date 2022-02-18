<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonyLevelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $services = $containerConfigurator->services();

    $parameters->set(Option::PATHS, [__DIR__ . '/src']);
    $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan/config.neon');

    // basic rules
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::IMPORT_DOC_BLOCKS, true);
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_72);
    $containerConfigurator->import(LevelSetList::UP_TO_PHP_72);
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SymfonyLevelSetList::UP_TO_SYMFONY_54);
};
