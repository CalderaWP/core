# Caldera Core

This package provides the application container for sharing services between packages. This package should not do anything else.


## Examples

### Instantiate Core
```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());

```

### Get The Caldera Forms
```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$calderaForms = $core->getCalderaForms();
```

### Get The Caldera Rest API
```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$restApi = $core->getRestApi();
```


### Get The Caldera Events
```php
use calderawp\CalderaContainers\Service\Container;
use calderawp\caldera\core\CalderaCore;

$core = new CalderaCore(new Container());
$calderaEvents = $core->getEvents();
```

### Add A Module 

Module must implement `calderawp\interop\Contracts\CalderaModule`;
```php

$core->addModule($module);
$module = $core->getModule('moduleIdentifier');
```

## Testing
Unit tests are in `tests/Unit`. They are run at same time as integration tests -- `composer test:integration` -- for now.


