# Business logic and technical stack separation

This is the kind of things we can find in legacy code:

[Legacy code](01-legacy-code.php)

There are the usual steps to improve this legacy (not even talking about testing):

[Injecting dependencies](02-injected-dependencies.php)

[Hiding implementation](03-hidden-implementation.php)

Here you think you can just replace the persistence third party library by another one and you're done.
But BusinessLogicService::addProperty still mixes business logic and technical stuff (line 70).

There is an additional step that should be performed prior to even think about changing any third party library:
 
[Actually seperating business logic and technical stuff](04-separated-business-and-tech.php)
 
It works for every part of the technical stack: routing, persisting, request-response, ...

Now business logic and technical stack are really separated in different classes, allowing:
- business-logic-aware (or feature) people to deal with only business logic code (the BusinessLogicService class) without even caring about technical implementation,
- technical people to improve technical stack and be quicker efficient (no business logic to learn),
- sparing everyone's ego.
