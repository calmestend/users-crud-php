<?php

namespace DTL\ArgumentResolver\ParamConverter;

use DTL\ArgumentResolver\ArgumentConverter;
use DTL\ArgumentResolver\ArgumentResolver;
use ReflectionClass;
use ReflectionParameter;
use RuntimeException;

class RecursiveInstantiator implements ArgumentConverter
{
    public function canConvert(ReflectionParameter $parameter, $argument): bool
    {
        return $parameter->getType()->isBuiltin() === false && is_array($argument);
    }

    public function convert(ArgumentResolver $resolver, ReflectionParameter $parameter, $argument)
    {
        $className = $parameter->getType()->getName();
        $reflectionClass = new ReflectionClass($className);

        if (!$reflectionClass->hasMethod('__construct') && empty($argument)) {
            return $reflectionClass->newInstance();
        }

        if (!$reflectionClass->hasMethod('__construct')) {
            throw new RuntimeException(sprintf(
                'Class "%s" must have a __construct method',
                $reflectionClass->getName()
            ));
        }

        $arguments = $resolver->resolveArguments($reflectionClass->getName(), '__construct', $argument);

        return $reflectionClass->newInstanceArgs($arguments);
    }
}
