<?php

// Technical
class Controller
{
    /** @var BusinessLogicService */
    private $businessLogicService;

    /** @var PersistenceService */
    private $persistenceService;

    public function __construct(BusinessLogicService $businessLogicService, PersistenceService $persistenceService)
    {
        $this->businessLogicService = $businessLogicService;
        $this->persistenceService = $persistenceService;
    }

    // Technical
    public function addPropertyAction($argument1, $argument2)
    {
        // Technical
        [$subject, $predicate, $object] = $this->businessLogicService->addProperty($argument1, $argument2);

        // Technical
        return $this->persistenceService->addTriple($subject, $predicate, $object);
    }
}

// Technical
class PersistenceService
{
    /** @var PersistenceThirdPartyLibrary */
    private $persistenceThirdPartyLibrary;

    public function __construct(PersistenceThirdPartyLibrary $persistenceThirdPartyLibrary)
    {
        $this->persistenceThirdPartyLibrary = $persistenceThirdPartyLibrary;
    }

    public function addTriple($subject, $predicate, $object)
    {
        // Technical
        return $this->persistenceThirdPartyLibrary->exec(
            'INSERT INTO statements (subject, predicate, object)
            VALUES ("' . $subject . '","' . $predicate . '","' . $object . '")'
        );
    }
}

// Business
class BusinessLogicService
{
    const A_CONSTANT = 'a value';

    /** @var Dependency1 */
    private $dependency1;

    /** @var PropertyGenerator */
    private $propertyGenerator;

    public function __construct(Dependency1 $dependency1, PropertyGenerator $propertyGenerator)
    {
        $this->dependency1 = $dependency1;
        $this->propertyGenerator = $propertyGenerator;
    }

    public function addProperty($argument1, $argument2)
    {
        // Business
        $subject = $this->dependency1->getSubject($argument1);
        $predicate = $this->propertyGenerator->getProperty(self::A_CONSTANT) . ' some business rule';
        $object = $argument2;

        return [$subject, $predicate, $object];
    }
}
