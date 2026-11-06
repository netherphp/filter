<?php ##########################################################################
################################################################################

namespace Nether\Filter;

################################################################################
################################################################################

class Text {

	static public function
	Trimmed(mixed $Input):
	string {

		$Input = Type::String($Input);

		return trim($Input);
	}

	static public function
	TrimmedNullable(mixed $Input):
	?string {

		$Input = Type::StringNullable($Input);

		if(!is_string($Input))
		return null;

		return trim($Input);
	}

};
