# Duna QR Code Library

A versatile QR code generation library that supports HTML, PNG, and SVG output formats.

[![GitHub repo stars](https://img.shields.io/github/stars/davidsgallan/davidsgallan.svg?style=social)](https://github.com/davidsgallan/davidsgallan)

## Overview

The Duna QR Code Library is a QR code generation tool originally based on the `QrCode` library bundled with Duna until v8.0, developed by Laurent Minguet. It is distributed under the LGPL license, providing a flexible and open-source solution for QR code generation.

## Installation

To install the library, use Composer:

```
$ composer require duna/qrcode
```

## Usage

Here's a quick guide to using the Duna QR Code Library:

### Generating QR Codes

First, include the necessary classes and create a QR code instance:

```
<?php

use Duna\Helpers\QrCode\QrCode;
use Duna\Helpers\QrCode\Output;

$qrCode = new QrCode('Lorem ipsum dolor sit amet');
```

### Output Formats

#### PNG Output

To generate a PNG image of the QR code, specifying dimensions and colors, use:

```
// Create PNG output
$output = new Output\Png();

// Generate PNG data with a specified width, background color (white), and foreground color (black)
$data = $output->output($qrCode, 100, [255, 255, 255], [0, 0, 0]);

// Save the PNG data to a file
file_put_contents('file.png', $data);
```

#### SVG Output

For SVG output, which is useful for scalable vector graphics:

```
// Create SVG output
$output = new Output\Svg();

// Generate SVG data with a specified width, background color (white), and foreground color (black)
echo $output->output($qrCode, 100, 'white', 'black');
```

#### HTML Output

To display the QR code as an HTML table:

```
// Create HTML output
$output = new Output\Html();

// Generate HTML table representation of the QR code
echo $output->output($qrCode);
```

## License

This library is provided under the GNU Lesser General Public License (LGPL) v3.0. See the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please refer to our [CONTRIBUTING](CONTRIBUTING.md) guidelines for more information.

## Issues and Support

For issues and support, please refer to our [issue tracker](https://github.com/dunawork/qrcode/issues) or reach out to the community.