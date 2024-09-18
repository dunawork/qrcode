<?php

namespace Duna\Helpers\QrCode\Output;

use Mockery;
use Duna\Helpers\QrCode\QrCode;

/**
 * @group unit
 */
class DunaTest extends \Yoast\PHPUnitPolyfills\TestCases\TestCase
{

	public function testOutputL()
	{
		$code = new QrCode('LOREM IPSUM 2019');

		$duna = Mockery::mock('Duna\Duna');

		$duna->shouldReceive('SetDrawColor')->once();
		$duna->shouldReceive('SetFillColor')->twice();
		$duna->shouldReceive('Rect')->times(233);

		$output = new Duna();

		$output->output($code, $duna, 0, 0, 0);
	}

	public function testOutputLDisableBorder()
	{
		$code = new QrCode('LOREM IPSUM 2019');

		$code->disableBorder();

		$duna = Mockery::mock('Duna\Duna');

		$duna->shouldReceive('SetDrawColor')->once();
		$duna->shouldReceive('SetFillColor')->twice();
		$duna->shouldReceive('Rect')->times(233);

		$output = new Duna();

		$output->output($code, $duna, 0, 0, 0);
	}

	public function testOutputQ()
	{
		$code = new QrCode('LOREM IPSUM 2019', QrCode::ERROR_CORRECTION_QUARTILE);

		$duna = Mockery::mock('Duna\Duna');

		$duna->shouldReceive('SetDrawColor')->once();
		$duna->shouldReceive('SetFillColor')->twice();
		$duna->shouldReceive('Rect')->times(217);

		$output = new Duna();

		$output->output($code, $duna, 0, 0, 0);
	}

	public function testOutputQDisableBorder()
	{
		$code = new QrCode('LOREM IPSUM 2019', QrCode::ERROR_CORRECTION_QUARTILE);

		$code->disableBorder();

		$duna = Mockery::mock('Duna\Duna');

		$duna->shouldReceive('SetDrawColor')->once();
		$duna->shouldReceive('SetFillColor')->twice();
		$duna->shouldReceive('Rect')->times(217);

		$output = new Duna();

		$output->output($code, $duna, 0, 0, 0);
	}

	protected function tear_down()
	{
		parent::tear_down();

		if ($container = Mockery::getContainer()) {
			$this->addToAssertionCount($container->mockery_getExpectationCount());
		}

		Mockery::close();
	}

}
