<?php

function convertKeys()
{
	$lines = "A1:NAME
A2:FIRST-YEAR
A3:LAST-YEAR
A4:CONTRIBUTORS
A5:INSTITUTIONS
A6:INFLUENCED-BY
A7:NAT-LANGS
A8:PROG-LANGS
A9:SOURCE-CODE
A10:KB-TYPE
A11:KB-TYPE-DESC
A12:SENTENCE-TYPES
A13:ARTICLES
A14:NAME-DESC
A90:LONG-DESC
Z1:NP
Z2:VP
Z3:DP
Z4:AP
Z5:RC
Z6:NEG
Z7:CONJ
Z8:ANAPHORA
Z9:AUX
Z10:MODALS
Z11:COMP-EXP
Z12:PASSIVES
Z13:CLEFTS
Z14:THERE
Z15:ELLIPSIS
Z16:PP
B1-a:TOKENIZE-HEADER
B1:DO-TOKENIZE
B2:DO-DICT-LOOKUP
B3:DO-MORPH-ANA
B4:DO-WORD-SEPA
B5:DO-SPELL-CORR
B6:DO-OPEN-ENDED
B7:DO-PROP-NAME-KB
B8:DO-PROP-NAME-MAT
B9:DO-QUOTED-STRINGS
C1-a:PARSE-HEADER
C1-b:GRAMMAR-TYPE
C1-c:PARSER-TYPE
C1:DO-PARSE
D-a:SYNTACTIC-FORM-TYPE
D1:DO-SEMANTIC-ATTACH
D2-a:SEMANTIC-COMP-TYPE
D2-b:INTERPRET-HEADER
D2:DO-SEMANTIC-COMP
D3:DO-SEMANTIC-CONFLICT
D4:QUANTIFIER-SCOPE
D5:ANAPHORA-RESOL
D6:PLAUSIB-JUDGE
D7:UNIFORM-REWRITES
E-a:SEMANTIC-FORM-TYPE
E-b:SEMANTIC-FORM-DESC
E-c:EVENT-BASED
E-d:ONTOLOGY-USED
E-e:STD-ONTOLOGY
E1-a:CONVERT-TYPE
E1-b:CONVERT-HEADER
E1-c:KB-METADATA
E1:DO-SYNTACTIC-REWRITE
E2:INFORMATION-RESTRUCT
F-a:KN-LANGS
F1-a:KB-ACTIONS
F1-b:EXECUTE-HEADER
F1:DO-EXECUTE
F2:DO-LOGICAL-REASON
G1-a:GENERATE-HEADER
G1:DO-GENERATE";

//$lines = "QUANTIFIER-SCOPE:DO-QUANTIFIER-SCOPE
//ANAPHORA-RESOL:DO-ANAPHORA-RESOL
//PLAUSIB-JUDGE:DO-PLAUSIB-JUDGE
//UNIFORM-REWRITES:DO-UNIFORM-REWRITES";

	foreach ([
//		         'data/c-phrase.txt',
//		         'data/cle.txt',
//		         'data/eufid.txt',
//		         'data/orakel.txt',
//		         'data/shrdlu.txt',
//		         'data/team.txt',
//				 'doc/structure.txt',
//				 'doc/template.txt',
//				 'api/NliSystem.php',
//				 'language-constructs.php'
	         ] as $file) {
		$path = __DIR__ . '/../' . $file;
		$content = file_get_contents($path);
		foreach (explode("\n", $lines) as $line) {
			list ($before, $after) = explode(':', $line);
			if ($after) {
				$content = preg_replace('/\b' . $before .'\b/', $after, $content);
			}
		}

		file_put_contents($path, $content);
	}
}