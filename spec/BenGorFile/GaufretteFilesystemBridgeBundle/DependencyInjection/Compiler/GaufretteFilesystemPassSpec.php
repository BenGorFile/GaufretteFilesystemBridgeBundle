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

namespace spec\BenGorFile\GaufretteFilesystemBridgeBundle\DependencyInjection\Compiler;

use BenGorFile\GaufretteFilesystemBridgeBundle\DependencyInjection\Compiler\GaufretteFilesystemPass;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * Spec file of GaufretteFilesystemPass class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 */
class GaufretteFilesystemPassSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GaufretteFilesystemPass::class);
    }

    function it_implmements_compiler_pass_interface()
    {
        $this->shouldImplement(CompilerPassInterface::class);
    }

    function it_does_not_process_because_the_filesystem_is_not_gaufrette(ContainerBuilder $container)
    {
        $container->getParameter('bengor_file.config')->shouldBeCalled()->willReturn([
            'file_class' => [
                'file' => [
                    'class'              => 'AppBundle\Entity\File',
                    'firewall'           => 'main',
                    'persistence'        => 'doctrine_orm',
                    'storage'            => 'symfony',
                    'upload_destination' => '/symfony/filesystem/path',
                ],
            ],
        ]);

        $this->process($container);
    }

    function it_processes_gaufrette_filesystem(ContainerBuilder $container, Definition $definition)
    {
        $container->getParameter('bengor_file.config')->shouldBeCalled()->willReturn([
            'file_class' => [
                'file' => [
                    'class'              => 'AppBundle\Entity\File',
                    'firewall'           => 'main',
                    'persistence'        => 'doctrine_orm',
                    'storage'            => 'gaufrette',
                    'upload_destination' => 'gaufrette-configured-filesystem',
                ],
            ],
        ]);

        $container->setDefinition(
            'bengor_file.filesystem.gaufrette.file',
            Argument::type(Definition::class)
        )->shouldBeCalled()->willReturn($definition);
        $container->setDefinition(
            'bengor.file.infrastructure.domain.model.gaufrette_filesystem_file',
            Argument::type(Definition::class)
        )->shouldBeCalled()->willReturn($definition);

        $container->setAlias(
            'bengor_file.file.filesystem',
            'bengor.file.infrastructure.domain.model.gaufrette_filesystem_file'
        )->shouldBeCalled();

        $this->process($container);
    }
}
