<?php

namespace spec\Sylius\Bundle\ResourceBundle\Controller;

use PhpSpec\ObjectBehavior;

/**
 * Resource resolver spec.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class ResourceResolverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\ResourceBundle\Controller\ResourceResolver');
    }

    /**
     * @param Sylius\Bundle\ResourceBundle\Model\RepositoryInterface $repository
     * @param Sylius\Bundle\ResourceBundle\Controller\Configuration  $configuration
     */
    function it_calls_proper_method_with_arguments_based_on_configuration($repository, $configuration)
    {
        $configuration->getMethod('findBy')->willReturn('findAll');
        $configuration->getArguments(array())->willReturn(array(5));

        $repository->findAll(5)->shouldBeCalled()->willReturn(array('foo', 'bar'));

        $this->getResource($repository, $configuration, 'findBy')->shouldReturn(array('foo', 'bar'));
    }
}
