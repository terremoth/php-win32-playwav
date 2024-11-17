# PHP Native Win32 Play Sound (wav)
Play wav (wave) files natively with PHP on Windows. Zero extensions or dependencies needed! 

It uses `PlaySound` from `winmm.dll`, unlocked by the power of PHP [FFI](https://www.php.net/manual/en/book.ffi.php)

_Not because we must do it, but because we can!_

Made by [Terremoth](https://github.com/terremoth/) with ⚡ & ❤

[![CodeCov](https://codecov.io/gh/terremoth/php-win32-playwav/graph/badge.svg?token=TOKEN)](https://app.codecov.io/gh/terremoth/php-win32-playwav)
[![Psalm type coverage](https://shepherd.dev/github/terremoth/php-win32-playwav/coverage.svg)](https://shepherd.dev/github/terremoth/php-win32-playwav)
[![Psalm level](https://shepherd.dev/github/terremoth/php-win32-playwav/level.svg)](https://shepherd.dev/github/terremoth/php-win32-playwav)
[![Test Run Status](https://github.com/terremoth/php-win32-playwav/actions/workflows/workflow.yml/badge.svg?branch=main)](https://github.com/terremoth/php-win32-playwav/actions/workflows/workflow.yml)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a13132be1af401ddb871/test_coverage)](https://codeclimate.com/github/terremoth/php-win32-playwav/test_coverage)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ef78c9a6fa6843a1aa10646bd70a1e9d)](https://app.codacy.com/gh/terremoth/php-win32-playwav/dashboard?utm_source=gh&utm_medium=referral&utm_content=&utm_campaign=Badge_grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/a13132be1af401ddb871/maintainability)](https://codeclimate.com/github/terremoth/php-win32-playwav/maintainability)
[![License](https://img.shields.io/github/license/terremoth/php-win32-playwav.svg?logo=gnu&color=41bb13)](https://github.com/terremoth/php-win32-playwav/blob/main/LICENSE)

See [demos/demo.php](demos/demo.php) for examples.

## Documentation

### Play Sync

```php
<?php

require 'vendor/autoload.php';

use Win32Sound\PlayWav;

$sound = new PlayWav('test.wav');
$sound->play();

```

### Play Async

```php
<?php

require 'vendor/autoload.php';

use Win32Sound\PlayWav;

$sound = new PlayWav('test.wav');
$sound->async()->play();
```

### Loop the audio

Also, you can "loop" and then, stop if you want.  
__IMPORTANT__: `loop()` requires ``->async()`` at some point, in order to work due to Windows API:

```php
<?php

require 'vendor/autoload.php';

use Win32Sound\PlayWav;

$sound = new PlayWav('test.wav');
$sound->async()->loop()->play();

// if the scripts ends it will "kill" the audio process,
// so, to listen just put a sleep in order to test
sleep(5); 

// if you want to stop the looping audio, just:
$sound->stop();
```
