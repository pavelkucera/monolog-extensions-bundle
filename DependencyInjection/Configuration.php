<?php

/**
 * Copyright (c) 2014 Pavel Kučera (http://github.com/pavelkucera)
 */

namespace Kucera\MonologExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kucera_monolog_extensions');

        $rootNode->children()
            ->arrayNode('handlers')
                ->useAttributeAsKey('name')
                ->canBeUnset()
                ->prototype('array')
                    ->children()
                        ->scalarNode('log_directory')->defaultValue('%kernel.logs_dir%/blueScreen')->end()
                        ->scalarNode('level')->defaultValue('DEBUG')->end()
                        ->booleanNode('bubble')->defaultTrue()->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }

}
