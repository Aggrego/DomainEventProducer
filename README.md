[![License](https://poser.pugx.org/aggrego/domain-event-producer/license.svg)](https://packagist.org/packages/aggrego/domain-event-producer)
[![Latest Stable Version](https://poser.pugx.org/aggrego/domain-event-producer/v/stable.svg)](https://packagist.org/packages/aggrego/domain-event-producer)
[![Total Downloads](https://poser.pugx.org/aggrego/domain-event-producer/downloads.svg)](https://packagist.org/packages/aggrego/domain-event-producer)
[![Travis](https://travis-ci.org/Aggrego/DomainEventProducer.svg?branch=master)](https://travis-ci.org/Aggrego/DomainEventProducer/builds)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Aggrego/DomainEventProducer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Aggrego/DomainEventProducer/?branch=master)

# DomainEventProducer

This module is cross-cut for pulling events from domain and pushing them to consume.

As `Board\Repository`'s decorator it implements `UnitOfWork` - after executing command, pull all releated `Events` from aggregates.


## Related libs

* [Domain](https://github.com/Aggrego/Domain)
* [EventConsumer](https://github.com/Aggrego/EventConsumer)

## Versioning
 
Staring version ``0.1.0``, will follow [Semantic Versioning v2.0.0](http://semver.org/spec/v2.0.0.html).

## Contributors

* Tomasz Kunicki [TimiTao](http://github.com/timiTao) [lead developer]