brick/geo-doctrine
==================

<img src="https://raw.githubusercontent.com/brick/brick/master/logo.png" alt="" align="left" height="64">

Doctrine types & functions for [brick/geo](https://github.com/brick/geo)

[![Build Status](https://github.com/brick/geo-doctrine/workflows/CI/badge.svg)](https://github.com/brick/geo-doctrine/actions)
[![Coverage Status](https://coveralls.io/repos/github/brick/geo-doctrine/badge.svg?branch=master)](https://coveralls.io/github/brick/geo-doctrine?branch=master)
[![Latest Stable Version](https://poser.pugx.org/brick/geo-doctrine/v/stable)](https://packagist.org/packages/brick/geo-doctrine)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

Introduction
------------

This library provides:

- type mappings to use `brick/geo` objects such as `Polygon` as Doctrine entity properties
- functions to use in DQL queries, such as `Distance()` or `Contains()`.

Installation
------------

This library is installable via [Composer](https://getcomposer.org/):

```bash
composer require brick/geo-doctrine
```

Requirements
------------

This library requires PHP 8.1.

Project status & release process
--------------------------------

The current releases are numbered `0.x.y`. When a non-breaking change is introduced (adding new methods, optimizing existing code, etc.), `y` is incremented.

**When a breaking change is introduced, a new `0.x` version cycle is always started.**

It is therefore safe to lock your project to a given release cycle, such as `0.3.*`.

If you need to upgrade to a newer release cycle, check the [release history](https://github.com/brick/geo-doctrine/releases) for a list of changes introduced by each further `0.x.0` version.

Package contents
----------------

### Types

- [GeometryCollectionType](https://github.com/brick/geo-doctrine/blob/master/src/Types/GeometryCollectionType.php)
- [GeometryType](https://github.com/brick/geo-doctrine/blob/master/src/Types/GeometryType.php)
- [LineStringType](https://github.com/brick/geo-doctrine/blob/master/src/Types/LineStringType.php)
- [MultiLineStringType](https://github.com/brick/geo-doctrine/blob/master/src/Types/MultiLineStringType.php)
- [MultiPointType](https://github.com/brick/geo-doctrine/blob/master/src/Types/MultiPointType.php)
- [MultiPolygonType](https://github.com/brick/geo-doctrine/blob/master/src/Types/MultiPolygonType.php)
- [PointType](https://github.com/brick/geo-doctrine/blob/master/src/Types/PointType.php)
- [PolygonType](https://github.com/brick/geo-doctrine/blob/master/src/Types/PolygonType.php)

### Functions

Complete list [here](https://github.com/brick/geo-doctrine/blob/master/src/Functions).
