<?php

namespace Duna\Helpers\QrCode;

/**
 * @group unit
 */
class QrCodeTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testQrCodeAlnum()
	{
		$qrCode = new QrCode('LOREM IPSUM 2019');

		$this->assertFalse($qrCode->isBorderDisabled());
		$this->assertSame(29, $qrCode->getQrSize());

		$qrCode->disableBorder();

		$this->assertTrue($qrCode->isBorderDisabled());
		$this->assertSame(21, $qrCode->getQrDimensions());
		$this->assertSame(29, $qrCode->getQrSize());
	}

	public function testQrCodeBin()
	{
		$qrCode = new QrCode('Lorem ipsum dolor sit amet');

		$this->assertFalse($qrCode->isBorderDisabled());
	}

	public function testQrCodeNumeric()
	{
		$qrCode = new QrCode('5548741164863348');

		$this->assertFalse($qrCode->isBorderDisabled());

		$this->assertCount(841, $qrCode->getFinal());
	}

	public function testLongData()
	{
		$qrCode = new QrCode(base64_encode(random_bytes(1024 * 2)));

		$this->assertFalse($qrCode->isBorderDisabled());
	}

	public function testInvalidErrorCorrection()
	{
		$this->expectException(\Duna\Helpers\QrCode\QrCodeException::class);

		new QrCode('Invalid ECC', 'X');
	}

	public function testEmptyValue()
	{
		$this->expectException(\Duna\Helpers\QrCode\QrCodeException::class);

		new QrCode('');
	}

	public function testTooLongData()
	{
		$this->expectException(\Duna\Helpers\QrCode\QrCodeException::class);

		new QrCode(base64_encode(random_bytes(1024 * 3)));
	}

	public function testUndefinedIndex()
	{
		$value = '1234567890123456.gov.bcb.pix0114028268660001815204000053039865406119.925802BR5912Clip Oba Oba6013Monten Matriz62120508v10173176304F297';
		$qr = new QrCode($value);
		$this->assertInstanceOf(QrCode::class, $qr);
	}

}
