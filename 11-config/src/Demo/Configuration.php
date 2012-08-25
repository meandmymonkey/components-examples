<?php

namespace Demo;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $builder
            ->root('config')
                ->children()
                    ->arrayNode('foo')
                        ->prototype('scalar')
                            ->validate()
                                ->ifNotInArray(array('apples', 'oranges', 'bananas', 'cherries'))
                                ->thenInvalid('Invalid fruit: %s')
                            ->end()
                        ->end()
                    ->end()
                    ->scalarNode('bar')->end()
                    ->scalarNode('qux')
                        ->defaultValue('default value')
                    ->end()
                ->end()
            ->end()
        ;

        return $builder;
    }
}
