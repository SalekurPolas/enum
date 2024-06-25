# Laravel Enum

A robust and flexible package for creating enumerations in Laravel. This package simplifies the creation and management of enumerated types, offering a consistent and extensible approach to handle options and their corresponding labels.

## Features

- **Automatic Label Generation**: Automatically generates human-readable labels from enumeration keys.
- **Custom Label Support**: Allows for custom labels through a static `values` method.
- **Option Retrieval**: Provides methods to retrieve all options, specific options by key, and check the existence of options.
- **Key and Label Extraction**: Easily extract all keys or labels from the enumeration.

## Installation

To install the package, use Composer:

```sh
composer require salekur/enum
```

## Usage
Extend the **Enum** class and define constants for each enumerated value to create a new enumeration. Optionally, provide a **values** method to customize labels.

```php
namespace Salekur\Enum\Enum;

class UserRole extends Enum {
    const ADMIN = 'admin';
    const EDITOR = 'editor';
    const VIEWER = 'viewer';

    public static function values(): array {
        return [
            self::ADMIN => 'Administrator',
            self::EDITOR => 'Content Editor',
            self::VIEWER => 'Content Viewer'
        ];
    }
}
```

## Retrieving Options
The **Enum** class provides several methods to retrieve and interact with enumeration options. These methods allow you to access all enumeration options easily, specify option labels, check for the existence of an option, and extract keys and labels. Below are examples demonstrating how to use these methods with the UserRole enum.

```php
$options = UserRole::options();
// ['admin' => 'Administrator', 'editor' => 'Content Editor', 'viewer' => 'Content Viewer']

$label = UserRole::get('admin');
// 'Administrator'

$exists = UserRole::has('editor');
// true

$keys = UserRole::keys();
// ['admin', 'editor', 'viewer']

$labels = UserRole::labels();
// ['Administrator', 'Content Editor', 'Content Viewer']
```
