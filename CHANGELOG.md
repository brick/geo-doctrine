# Changelog

## [0.5.1](https://github.com/brick/geo-doctrine/releases/tag/0.5.1) - 2026-02-27

🐛 **Bug fixes**

- Geometry types now implement `getMappedDatabaseTypes()`, fixing a schema comparison error with `doctrine/dbal` `4.3`+

✨ **New features**

- Thanks to `getMappedDatabaseTypes()`, calling `$platform->registerDoctrineTypeMapping()` manually is no longer necessary

## [0.5.0](https://github.com/brick/geo-doctrine/releases/tag/0.5.0) - 2025-03-18

✨ **Upgrades**

- Compatibility with `brick/geo` version `0.13`

💥 **Breaking changes**

- No longer compatible with `brick/geo` versions `0.10`, `0.11` and `0.12`

## [0.4.1](https://github.com/brick/geo-doctrine/releases/tag/0.4.1) - 2025-03-18

✨ **Upgrades**

- Compatibility with `brick/geo` version `0.12`

## [0.4.0](https://github.com/brick/geo-doctrine/releases/tag/0.4.0) - 2024-12-19

💥 **Breaking changes**

- compatibility with `doctrine/orm` `3.x` (`2.x` is no longer supported)
- compatibility with `doctrine/dbal` `4.x` (`2.x` and `3.x` are no longer supported)

🐛 **Bug fixes**

- `GeometryType::convertToDatabaseValue()` now properly throws `ConversionException` as it should

## [0.3.1](https://github.com/brick/geo-doctrine/releases/tag/0.3.1) - 2024-06-07

✨ **Upgrades**

- Compatibility with `brick/geo` version `0.11`

## [0.3.0](https://github.com/brick/geo-doctrine/releases/tag/0.3.0) - 2024-01-23

💥 **Breaking changes**

- Minimum PHP version is now `8.1`

✨ **Upgrades**

- Compatibility with `brick/geo` version `0.10`

## [0.2.1](https://github.com/brick/geo-doctrine/releases/tag/0.2.1) - 2022-11-22

✨ **Improvements**

- Compatibility with `brick/geo` version `0.9`

## [0.2.0](https://github.com/brick/geo-doctrine/releases/tag/0.2.0) - 2022-10-11

💥 **Breaking changes**

- Minimum PHP version is now `8.0`

✨ **Improvements**

- Compatibility with `brick/geo` version `0.8`

🩹 **Deprecation fixes**

- Fixed code using deprecated Doctrine method `AbstractPlatform::getName()`

## [0.1.1](https://github.com/brick/geo-doctrine/releases/tag/0.1.1) - 2022-03-21

**Deprecation fixes**

* Add return types to methods.

## [0.1.0](https://github.com/brick/geo-doctrine/releases/tag/0.1.0) - 2021-10-10

:tada: First release!
