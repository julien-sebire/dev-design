<?php

// Technical
class Controller
{
    /** @var BusinessLogicService */
    private $businessLogicService;

    public function __construct(BusinessLogicService $businessLogicService)
    {
        $this->businessLogicService = $businessLogicService;
    }

    public function addPropertyAction($argument1, $argument2)
    {
        // Technical
        $this->businessLogicService->addProperty($argument1, $argument2);
    }
}

// Business + Technical
class BusinessLogicService
{
    const A_CONSTANT = 'a value';

    /** @var Dependency1 */
    private $dependency1;

    public function __construct(Dependency1 $dependency1)
    {
        $this->dependency1 = $dependency1;
    }

    public function addProperty($argument1, $argument2)
    {
        // Business
        $subject = $this->dependency1->getSubject($argument1);
        $predicate = ServiceLocator::getPropertyGenerator()->getProperty(self::A_CONSTANT) . ' some business rule';
        $object = $argument2;

        // Technical
        return ServiceLocator::getPersistenceService()->exec(
            'INSERT INTO statements (subject, predicate, object)
            VALUES ("' . $subject . '","' . $predicate . '","' . $object . '")'
        );
    }
}
