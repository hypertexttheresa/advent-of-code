<?php

class AoCUtil {
	public function getPuzzleInput($filepath) {
		$puzzleInput = trim(file_get_contents($filepath));
		$puzzleInput = explode("\n", $puzzleInput);

		return $puzzleInput;
	}
}