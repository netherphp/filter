<?php ##########################################################################
################################################################################

namespace Nether\Filter;

use Nether\Meta\Code;

################################################################################
################################################################################

class Text {

	#[Code\Info('Return a trimmed string.')]
	#[Code\Added('2026-11-06')]
	static public function
	Trimmed(mixed $Input):
	string {

		$Input = Type::String($Input);

		return trim($Input);
	}

	#[Code\Info('Return a trimmed string or null.')]
	#[Code\Added('2026-11-06')]
	static public function
	TrimmedNullable(mixed $Input):
	?string {

		$Input = Type::StringNullable($Input);

		if(!is_string($Input))
		return NULL;

		return trim($Input);
	}

};
