# Description
Examples of design patterns implementations.

## Factory
###Demo at: `/pattern/standard-factory`.
Training plan:
- Muscle gain
- Weight loss

Implements standard `factory` pattern, not `abstract factory` since it uses also dependency injection - about which client (controller) is still unaware of - to parametrize one of the factories, as described by Mark Seeman here https://stackoverflow.com/a/2168882

# TODO
* README cleanup
* Psalm? https://psalm.dev/
* Upgrade to PHP 8.1 and use enum ; remove myclabs/php-enum then
* Unittests