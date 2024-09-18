<?php

namespace Duna\Helpers\QrCode\Output;

use Duna\Duna as DunaObject;
use Duna\Helpers\QrCode\QrCode;

class Duna
{

	/**
	 * Write the QR code into an Duna\Duna object
	 *
	 * @param \Duna\Helpers\QrCode\QrCode $qrCode QR code instance
	 * @param \Duna\Duna $duna Duna instance
	 * @param float $x position X
	 * @param float $y position Y
	 * @param float $w QR code width
	 * @param int[] $background RGB background color
	 * @param int[] $color RGB foreground and border color
	 */
	public function output(QrCode $qrCode, DunaObject $duna, $x, $y, $w, $background = [255, 255, 255], $color = [0, 0, 0])
	{
		$size = $w;
		$qrSize = $qrCode->getQrSize();
		$s = $size / $qrCode->getQrDimensions();

		$duna->SetDrawColor($color[0], $color[1], $color[2]);
		$duna->SetFillColor($background[0], $background[1], $background[2]);

		if ($qrCode->isBorderDisabled()) {
			$minSize = 4;
			$maxSize = $qrSize - 4;
			$duna->Rect($x, $y, $size, $size, 'F');
		} else {
			$minSize = 0;
			$maxSize = $qrSize;
			$duna->Rect($x, $y, $size, $size, 'FD');
		}

		$duna->SetFillColor($color[0], $color[1], $color[2]);

		$final = $qrCode->getFinal();

		for ($j = $minSize; $j < $maxSize; $j++) {
			for ($i = $minSize; $i < $maxSize; $i++) {
				if ($final[$i + $j * $qrSize + 1]) {
					$duna->Rect($x + ($i - $minSize) * $s, $y + ($j - $minSize) * $s, $s, $s, 'F');
				}
			}
		}
	}

}
