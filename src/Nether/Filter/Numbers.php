<?php ##########################################################################
################################################################################

namespace Nether\Filter;

use Nether\Meta\Code;

################################################################################
################################################################################

class Numbers {

	#[Code\Info('Always return an Int within range 1 to PHP_INT_MAX.')]
	static public function
	Page(mixed $Item):
	int {

		$Item = Type::Int($Item);

		if($Item < 1)
		return 1;

		return $Item;
	}

	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////

	#[Code\Info('String to Int. Supports decimal, octal 0o, hex 0x, and binary 0b.')]
	#[Code\Added('2027-11-03')]
	static public function
	Numeric(mixed $Val):
	int {

		if(is_int($Val))
		return $Val;

		////////

		$Result = match(TRUE) {
			(is_string($Val))
			=>  match(TRUE) {
				str_starts_with($Val, '0o'),
				=> octdec($Val),

				str_starts_with($Val, '0x')
				=> hexdec($Val),

				str_starts_with($Val, '0b')
				=> bindec($Val),

				default
				=> Type::Int($Val)
			},

			default
			=> Type::Int($Val)
		};

		////////

		return $Result;
	}

	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////

	#[Code\Info('Typecast to Integer, capping within specified range (Or this other specified value).')]
	#[Code\Added('2026-11-04')]
	static public function
	RangeInt(mixed $Input, int $Min=PHP_INT_MIN, int $Max=PHP_INT_MAX, ?int $Or=NULL):
	int {

		$Input = Type::Int($Input);

		if($Or !== NULL && $Input === $Or)
		return $Input;

		return max($Min, min($Max, $Input));
	}

	#[Code\Info('Typecast to Float, capping within specified range (Or this other specified value).')]
	#[Code\Added('2026-11-04')]
	static public function
	RangeFloat(mixed $Input, float $Min=PHP_INT_MIN, float $Max=PHP_INT_MAX, ?float $Or=NULL):
	float {

		$Input = Type::Float($Input);

		if($Or !== NULL && $Input === $Or)
		return $Input;

		return max($Min, min($Max, $Input));
	}

	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////

};
