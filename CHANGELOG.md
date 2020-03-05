# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 1.0.5 - 2020-03-05
### Changed
- Changed company name references.

## 1.0.4 - 2020-01-14
### Fixed
- Added translation for callable type.

## 1.0.3 - 2020-01-12
### Fixed
- Renamed file InvalidParameterTypeException so it can be autoloaded.
- Translated internal type aliases to the same result as gettype returns.

## 1.0.2 - 2019-11-17
### Added
- Mixed parameter support.

### Changed
- Depending on deprecated method `__toString` on ReflectionType, to `getName`.

## 1.0.1 - 2019-11-17

### Removed
- Composer dependency on `ulrack/configuration`.

## 1.0.0 - 2019-11-17

### Added
- Created the initial implementation of the ObjectFactory.

[Unreleased]: https://github.com/ulrack/object-factory/compare/1.0.5...HEAD
[1.0.5]: https://github.com/ulrack/object-factory/compare/1.0.4...1.0.5
[1.0.4]: https://github.com/ulrack/object-factory/compare/1.0.3...1.0.4
[1.0.3]: https://github.com/ulrack/object-factory/compare/1.0.2...1.0.3
[1.0.2]: https://github.com/ulrack/object-factory/compare/1.0.1...1.0.2
[1.0.1]: https://github.com/ulrack/object-factory/compare/1.0.0...1.0.1
