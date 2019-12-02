<?php
include('AoCUtil.php');

class Fuel {
	public function __construct() {
		$this->input = AoCUtil::getPuzzleInput('AoC1.txt');
	}

	public function getTotalFuel() {
		$fuel = 0;
		foreach ($this->input as $mass) {
			$fuel += $this->_getFuel($mass);
		}

		return $fuel;
	}

	protected function _getFuel($mass) {
		$fuel = floor($mass / 3) - 2;
		if ($fuel <= 0) {
			return 0;
		}

		return $this->_getFuel($fuel) + $fuel;
	}
}

$fuel = new Fuel();
var_dump($fuel->getTotalFuel());

