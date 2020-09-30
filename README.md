# Messenger Version Control

![CodeStyle](https://travis-ci.org/jhyangxyz/messenger-version-control.svg?branch=master)


A Simple Bunlde to version your Symfony Messenger messages.

* Versionning of a message
* Requeuing consumers that has different version with the concerned message

## Dependencies
* PHP >= 7.4
* symfony/messenger

## Installation

```bash
composer require jhyangxyz/messenger-version-control
```

## Usage

Configure this Middleware to your MessageBus

### Symfony Basic Example

#### Register the Bundle if not done automaticaly

```yaml
<?php

return [
    ...,
    Jhyangxyz\MessengerVersionControl\JhyangxyzMessengerVersionControlBundle::class => ['all' => true],
];

```

#### Configure Middleware

```yaml
framework:
    messenger:
        buses:
            message.bus.commands:
                middleware:
                    - jhyangxyz.messenger_version_control.middleware.version_checker_middleware
```
