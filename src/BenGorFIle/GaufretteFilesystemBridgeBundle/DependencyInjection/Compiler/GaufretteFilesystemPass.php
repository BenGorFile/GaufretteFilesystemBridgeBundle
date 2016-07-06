<?php

/*
 * This file is part of the BenGorFile package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BenGorFIle\GaufretteFilesystemBridgeBundle\DependencyInjection\Compiler;

use BenGorFile\GaufretteFilesystemBridge\Infrastructure\Domain\Model\GaufretteFilesystem;
use Gaufrette\Filesystem;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Register Gaufrette filesystem services compiler pass.
 *
 * Service declaration via PHP allows more
 * flexibility with customization extend files.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class GaufretteFilesystemPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter('bengor_file.config');
        foreach ($config['file_class'] as $key => $file) {
            if ('gaufrette' !== key($file['filesystem'])) {
                continue;
            }

            $container->setDefinition(
                'bengor_file.filesystem.gaufrette.' . $key,
                (new Definition(
                    Filesystem::class, [
                        $file['filesystem']['gaufrette'],
                    ]
                ))->setFactory([
                    new Reference('knp_gaufrette.filesystem_map'),
                    'get',
                ])
            )->setPublic(false);

            $container->setDefinition(
                'bengor.file.infrastructure.domain.model.gaufrette_filesystem_' . $key,
                new Definition(
                    GaufretteFilesystem::class, [
                        new Reference('bengor_file.filesystem.gaufrette.' . $key),
                    ]
                )
            )->setPublic(false);

            $container->setAlias(
                'bengor_file.' . $key . '.filesystem',
                'bengor.file.infrastructure.domain.model.gaufrette_filesystem_' . $key
            );
        }
    }
}
