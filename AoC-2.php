<?php
include('AoCUtil.php');

class IntCode {
	public function __construct() {
		$this->input = AoCUtil::getPuzzleInput('AoC2.txt', ',');
		$this->memory = $this->input;
	}

	public function getFirst() {
		$this->pointer = 0;
		$this->input[1] = 12;
		$this->input[2] = 2;
		$this->__runOpCode();
		$programOutcome = $this->input[0];

		return $programOutcome;
	}

	public function getSecond() {
		for ($i = 0; $i <= 100; $i++) {
			for ($j = 0; $j <= 100; $j++) {
				$this->pointer = 0;
				$this->input = $this->memory;
				$this->input[1] = $i;
				$this->input[2] = $j;
				$this->__runOpCode();
				$programOutcome = $this->input[0];
				if ($programOutcome == 19690720) {
					$noun = $this->input[1];
					$verb = $this->input[2];
					return $noun * 100 + $verb;
				}
			}
		}
	}

	private function __runOpCode() {
		$opCode = $this->input[$this->pointer];
		if ($opCode == 99) {
			return;
		}

		$inputAddressOne = $this->input[$this->pointer + 1];
		$inputAddressTwo = $this->input[$this->pointer + 2];
		$outputAddress = $this->input[$this->pointer + 3];

		if ($opCode == 1) {
			$this->input[$outputAddress] = $this->input[$inputAddressOne] + $this->input[$inputAddressTwo];
		}

		if ($opCode == 2) {
			$this->input[$outputAddress] = $this->input[$inputAddressOne] * $this->input[$inputAddressTwo];
		}

		$this->pointer = $this->pointer + 4;

		$this->__runOpCode();
	}

}

$intCode = new IntCode();
var_dump($intCode->getFirst());
var_dump($intCode->getSecond());