<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromReturnNewRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Closure\AddClosureReturnTypeRector;
use Rector\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $services = $containerConfigurator->services();

    $parameters->set(Option::PATHS, [__DIR__ . '/src']);
    $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan/config.neon');

    // basic rules
    // $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::IMPORT_DOC_BLOCKS, true);
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    $services->set(AddClosureReturnTypeRector::class);
    $services->set(AddReturnTypeDeclarationRector::class);
    $services->set(AddVoidReturnTypeWhereNoReturnRector::class);
    $services->set(ReturnTypeDeclarationRector::class);
    $services->set(ReturnTypeFromReturnNewRector::class);
    $services->set(ReturnTypeFromStrictTypedCallRector::class);
    $services->set(ReturnTypeFromStrictTypedPropertyRector::class);
};
