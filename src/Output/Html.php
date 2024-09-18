<?php

namespace Duna\Helpers\QrCode\Output;

use Duna\Helpers\QrCode\QrCode;

class Html
{

	/**
	 * @param \Duna\Helpers\QrCode\QrCode $qrCode
	 *
	 * @return string
	 */
	public function output(QrCode $qrCode)
	{
		$response = '';
		$qrSize = $qrCode->getQrSize();
		$final = $qrCode->getFinal();

		$minSize = 0;
		$maxSize = $qrSize;

		if ($qrCode->isBorderDisabled()) {
			$minSize = 4;
			$maxSize = $qrSize - 4;
		}

		$response .= '<table class="qr" cellpadding="0" cellspacing="0" style="font-size: 1px;">' . "\n";

		for ($y = $minSize; $y < $maxSize; $y++) {
			$response .= '<tr style="height: 4px;">';
			for ($x = $minSize; $x < $maxSize; $x++) {
				$on = $final[$x + $y * $qrSize + 1];
				$response .= '<td class="' . ($on ? 'on' : 'off') . '" style="width: 4px; background-color: ' . ($on ? '#000' : '#FFF') . '">&nbsp;</td>';
			}
			$response .= '</tr>' . "\n";
		}

		$response .= '</table>';

		return $response;
	}

}
