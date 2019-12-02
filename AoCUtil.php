<?php

class AoCUtil {
	public function getPuzzleInput($filepath, $delimiter = "\n") {
		$puzzleInput = trim(file_get_contents($filepath));
		$puzzleInput = explode($delimiter, $puzzleInput);

		return $puzzleInput;
	}
}