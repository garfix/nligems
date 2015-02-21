<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class Features
{
	const NAME = 'NAME';
	const FIRST_YEAR = 'FIRST-YEAR';
	const LAST_YEAR = 'LAST-YEAR';
	const CONTRIBUTORS = 'CONTRIBUTORS';
	const INSTITUTIONS = 'INSTITUTIONS';
	const INFLUENCED_BY = 'INFLUENCED-BY';
	const NATURAL_LANGUAGES = 'NAT-LANGS';
	const PROGRAMMING_LANGUAGES = 'PROG-LANGS';
	const SOURCE_CODE_URL = 'SOURCE-CODE';
	const KNOWLEDGE_BASE_TYPE = 'KB-TYPE';
	const KNOWLEDGE_BASE_DESCRIPTION = 'KB-TYPE-DESC';
	const SENTENCE_TYPES = 'SENTENCE-TYPES';
	const ARTICLES = 'ARTICLES';
	const BOOKS = 'BOOKS';
	const GEM_IMAGE = 'GEM-IMAGE';
	const NAME_DESCRIPTION = 'NAME-DESC';
	const LONG_DESCRIPTION = 'LONG-DESC';

	const ANALYSIS = 'ANALYSIS';
	const SEMANTIC_GRAMMAR = 'SEMANTIC-GRAMMAR';
	const DIALOG = 'DO-DIALOG';
	const NEW_WORDS = 'NEW-WORDS';
	const MULTI_DB = 'MULTI-DB';
	const META_SELF = 'META-SELF';
	const META_KB = 'META-KB';

	const NP = 'NP';
	const VP = 'VP';
	const PP = 'PP';
	const DP = 'DP';
	const ADVP = 'ADVP';
	const ADJP = 'ADJP';
	const RC = 'RC';
	const NEG = 'NEG';
	const CONJ = 'CONJ';
	const ANAPHORA = 'ANAPHORA';
	const AUX = 'AUX';
	const MODALS = 'MODALS';
	const COMPARATIVE_EXPRESSIONS = 'COMP-EXP';
	const PASSIVES = 'PASSIVES';
	const CLEFTS = 'CLEFTS';
	const THERE_BES = 'THERE';
	const ELLIPSIS = 'ELLIPSIS';

	const MORPHOLOGICAL_ANALYSIS = 'DO-MORPH-ANA';
	const DICTIONARY_LOOKUP = 'DO-DICT-LOOKUP';
	const WORD_SEPARATION = 'DO-WORD-SEPA';
	const SPELLING_CORRECTION = 'DO-SPELL-CORR';
	const OPEN_ENDED_TOKEN_RECOGNITION = 'DO-OPEN-ENDED';
	const PROPER_NAMES_FROM_KB = 'DO-PROP-NAME-KB';
	const PROPER_NAMES_BY_MATCHING = 'DO-PROP-NAME-MAT';
	const QUOTED_STRING_RECOGNITION = 'DO-QUOTED-STRINGS';

	const PARSE_HEADER = 'PARSE-HEADER';
	const GRAMMAR_TYPE = 'GRAMMAR-TYPE';
	const PARSER_TYPE = 'PARSER-TYPE';
	const ACCEPT_UNGRAMMATICAL_SENTENCES = 'DO-UNGRAMMATICAL';

	const SYNTACTIC_FORM_TYPE = 'SYNTACTIC-FORM-TYPE';

	const INTERPRET_HEADER = 'INTERPRET-HEADER';
	const SEMANTIC_ATTACHMENT = 'DO-SEMANTIC-ATTACH';
	const MODIFIER_ATTACHMENT = 'DO-MODIFIER-ATTACH';
	const CONJUNCTION_DISJUNCTION = 'DO-CONJUNCTION-DISJUNCTION';
	const NOMINAL_COMPOUNDS = 'DO-NOMINAL-COMPOUNDS';
	const SEMANTIC_COMPOSITION = 'DO-SEMANTIC-COMP';
	const SEMANTIC_COMPOSITION_TYPE = 'SEMANTIC-COMP-TYPE';
	const SEMANTIC_CONFLICT_DETECTION = 'DO-SEMANTIC-CONFLICT';
	const QUANTIFIER_SCOPING = 'DO-QUANTIFIER-SCOPE';
	const ANAPHORA_RESOLUTION = 'DO-ANAPHORA-RESOL';
	const PLAUSIBILITY_RESOLUTION = 'DO-PLAUSIB-JUDGE';
	const UNIFORMIZATION_REWRITES = 'DO-UNIFORM-REWRITES';
	const COOPERATIVE_RESPONSES = 'COOPERATIVE-RESPONSES'; // Androutsopoulos, p. 24

	const SEMANTIC_FORM_TYPE = 'SEMANTIC-FORM-TYPE';
	const SEMANTIC_FORM_DESC = 'SEMANTIC-FORM-DESC';
	const EVENT_BASED = 'EVENT-BASED';
	const TEMPORAL = 'TEMPORAL';
	const PROPER_NOUN_CONSTANTS = 'PROPER-NOUN-CNST';
	const ONTOLOGY_USED = 'ONTOLOGY-USED';
	const STANDARD_ONTOLOGY = 'STD-ONTOLOGY';

	const CONVERT_HEADER = 'CONVERT-HEADER';
	const CONVERT_TYPE = 'CONVERT-TYPE';
	const SYNTACTIC_REWRITE = 'DO-SYNTACTIC-REWRITE';
	const OPTIMIZE_QUERY = 'DO-OPTIMIZE-QUERY';
	const RESTRUCTURE_INFORMATION = 'DO-INFORMATION-RESTRUCT';

	const KNOWLEDGE_BASE_LANGUAGES  = 'KB-LANGS';
	const KNOWLEDGE_BASE_AGGREGATION = 'KB-AGGREGATIONS';

	const EXECUTE_HEADER = 'EXECUTE-HEADER';
	const LOGICAL_REASONING = 'DO-LOGICAL-REASON';

	const GENERATE_HEADER = 'GENERATE-HEADER';
	const PARAPHRASE_QUERY = 'PARAPHRASE-QUERY';

	// feature types

	const FEATURETYPE_BOOL = 'boolean';
	const FEATURETYPE_TEXT_SINGLE = 'text_single';
	const FEATURETYPE_TEXT_SINGLE_LONG = 'text_single_long';
	const FEATURETYPE_TEXT_MULTIPLE = 'text_multiple';

	// tags

	const TAG_CODE = 'code';
	const TAG_STRUCTURE = 'structure';
	const TAG_TOKENIZATION = 'tokenization';
	const TAG_PARSING = 'parsing';
	const TAG_SEMANTIC_ANALYSIS = 'semantic analysis';
	const TAG_CONVERSION_TO_KB = 'conversion to kb';
	const TAG_EXECUTION = 'execution';
	const TAG_ANSWER = 'answer';
	const TAG_DIALOG = 'dialog';
	const TAG_SEMANTIC_FORM = 'semantic form';
	const TAG_KB_FORM = 'kb form';
	const TAG_DOMAIN_MODEL = 'domain model';
	const TAG_LEXICON = 'lexicon';
	const TAG_GRAMMAR = 'grammar';
	const TAG_DIALOG_MODEL = 'dialog model';
	const TAG_PHRASE_TYPE = 'phrase type';

	public static function getFeatures()
	{
		return [
			self::NAME => [
				'name' => 'Name',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::FIRST_YEAR => [
				'name' => 'First year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::LAST_YEAR => [
				'name' => 'Last year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::CONTRIBUTORS => [
				'name' => 'Contributor(s)',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::INSTITUTIONS => [
				'name' => 'Institution',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::INFLUENCED_BY => [
				'name' => 'Influenced by',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::NATURAL_LANGUAGES => [
				'name' => 'Natural language',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'English' => 'English',
				),
				'desc' => '
					Which natural languages are supported by this system? The majority of systems just supports English.
				',
			],
			self::PROGRAMMING_LANGUAGES => [
				'name' => 'Programming language',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'APL' => 'APL',
					'C' => 'C',
					'Fortran' => 'Fortran',
					'Lisp' => 'Lisp',
					'Prolog' => 'Prolog',
				),
				'desc' => '
					Which programming language is used to implement the natural language processing core components of the system?
					This excludes the languages that are only used to interact with the system.
				',
			],
			self::KNOWLEDGE_BASE_TYPE => [
				'name' => 'Domain model type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'relational' => 'Relational',
					'tree-based' => 'Tree based',
					'inference engine' => 'Inference engine',
				),
				'desc' => '
					The way data is stored in the domain model:
					<dl>
						<dt>Relational</dt><dd>A relational database</dd>
						<dt>Tree based</dt><dd>A hierarchical database</dd>
						<dt>Inference engine</dt><dd>A logical database, with inference rules</dd>
					</dl>
				',
			],
			self::KNOWLEDGE_BASE_DESCRIPTION => [
				'name' => 'Knowledge base description',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::SENTENCE_TYPES => [
				'name' => 'Sentence types',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'question' => 'Question',
				    'declarative' => 'Declarative',
				    'imperative' => 'Imperative',
				),
				'desc' => '
				',
			],
			self::SOURCE_CODE_URL => [
				'name' => 'Source code url',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::GEM_IMAGE => [
				'name' => 'Gem image',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::NAME_DESCRIPTION => [
				'name' => 'Name description',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'desc' => '
				',
			],
			self::LONG_DESCRIPTION => [
				'name' => 'Long description',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'desc' => '
				',
			],
			self::ARTICLES => [
				'name' => 'Articles',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::BOOKS => [
				'name' => 'Books',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::DIALOG => [
				'name' => 'Clarification dialog to improve input sentence',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
				',
			],
			self::ANALYSIS => [
				'name' => 'Type of analysis',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'Pattern-matching' => 'Pattern matching',
					'Syntax-based' => 'Syntax based (maps parse tree to DB query)',
					'Semantics-based' => 'Semantics based (via semantic intermediate)',
				),
				'desc' => '
					The main categories of natural language interfaces<br>
					<dl>
						<dt>Pattern matching</dt><dd>Literal occurrences of a pattern in a sentence are converted directly to parts of a DB query</dd>
						<dt>Syntax based</dt><dd>A sentence is parsed and the parse tree is mapped directly to a DB query</dd>
						<dt>Semantics based</dt><dd>After a sentence is parsed, it is first converted into an intermediate semantic expression, which is in turn converted into a DB query</dd>
					</dl>
					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			],
			self::SEMANTIC_GRAMMAR => [
				'name' => 'Semantic grammar',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_STRUCTURE],
				'desc' => '
					Domain specific grammar.<br><br>
					The grammar used to parse the sentence contains non-leaf structures that are specially designed for some domain.<br><br>
					Each new application requires a different grammar.<br><br>
					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			],
			self::NEW_WORDS => [
				'name' => 'Allows the user to introduce new words and concepts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may enter new words into the lexicon from within the dialog.<br><br>
					An example user sentence: Call the biggest block "superblock" (SHRDLU)
				',
			],
			self::MULTI_DB => [
				'name' => 'Queries multiple knowledge bases for single request',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_EXECUTION],
				'desc' => '
					The system queries multiple knowledge bases for the same sentence, and integrates the results.
				',
			],
			self::ACCEPT_UNGRAMMATICAL_SENTENCES => [
				'name' => 'Accept ungrammatical sentences',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PARSING],
				'desc' => '
					Sentences that do not follow the system\'s grammar are not discarded off hand.
					The system will make an effort to understand them and / or to make the user change them.
				',
			],
			self::META_SELF => [
				'name' => 'Answers meta questions about its own processes',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
				',
			],
			self::META_KB => [
				'name' => 'Answers meta questions about the knowledge base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may ask the system about the structure of the knowledge base.
				',
			],
			self::DICTIONARY_LOOKUP => [
				'name' => 'Lexicon lookup',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Uses (among others) a lexicon to recognize tokens in a sentence.<br><br>
					Especially useful for compound nouns, like \'distance learning\' that cannot be recognized by
					using space as a delimiter alone.<br><br>
					The lexicon may also provide the part-of-speech of the word, i.e. noun, verb, preposition, to be used in the parsing process.
				',
			],
			self::MORPHOLOGICAL_ANALYSIS => [
				'name' => 'Morphological analysis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Removes the prefixes and suffixes of a word to find the root form (present in the lexicon)<br><br>
					For example: larger => large; finding => find; unable => able
				',
			],
			self::WORD_SEPARATION => [
				'name' => 'Word separation',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
				',
			],
			self::SPELLING_CORRECTION => [
				'name' => 'Spelling correction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
				',
			],
			self::OPEN_ENDED_TOKEN_RECOGNITION => [
				'name' => 'Open-ended token recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Recognizes words from an endless category that is not a good fit for a lexicon.<br><br>
					Examples are ordinals: 42, forty-two, forty-second
				',
			],
			self::PROPER_NAMES_FROM_KB => [
				'name' => 'Proper names lookup in knowledge base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					When a word is not present in the lexicon, the domain model is queried to find if the word is present as a proper name.
				',
			],
			self::PROPER_NAMES_BY_MATCHING => [
				'name' => 'Proper names by matching',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Proper names are recognized by fitting them into a pattern.<br><br>
					For example: [A-Z][a-z]* van der [A-Z][a-z]*
				',
			],
			self::QUOTED_STRING_RECOGNITION => [
				'name' => 'Quoted string recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Recognizes quoted sentences as part of a sentence.<br><br>
					For example: Who said "Gravitation is not responsible for people falling in love"?
				',
			],
			self::NP => [
				'name' => 'Noun Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::VP => [
				'name' => 'Verb Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PP => [
				'name' => 'Preposition Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::DP => [
				'name' => 'Determiner Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ADVP => [
				'name' => 'ADVerb Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ADJP => [
				'name' => 'ADJective Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::RC => [
				'name' => 'Relative clauses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::NEG => [
				'name' => 'Negations',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::CONJ => [
				'name' => 'Conjunctions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ANAPHORA => [
				'name' => 'Anaphora',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::AUX => [
				'name' => 'Auxiliaries',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::MODALS => [
				'name' => 'Modals',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::COMPARATIVE_EXPRESSIONS => [
				'name' => 'Comparative expressions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PASSIVES => [
				'name' => 'Passives',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::CLEFTS => [
				'name' => 'Clefts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::THERE_BES => [
				'name' => 'There be',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ELLIPSIS => [
				'name' => 'Ellipsis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PARSE_HEADER => [
				'name' => 'Parse header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
			],
			self::GRAMMAR_TYPE => [
				'name' => 'Grammar type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::PARSER_TYPE => [
				'name' => 'Parser type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::SYNTACTIC_FORM_TYPE => [
				'name' => 'Syntactic form type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'parse trees' => 'Parse trees',
				),
				'desc' => '
				',
			],
			self::INTERPRET_HEADER => [
				'name' => 'Interpreter header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
			],
			self::SEMANTIC_ATTACHMENT => [
				'name' => 'Semantic attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					Meaning structures are taken from the lexicon entries of the matched words and attached to them in the parse tree.
				',
			],
			self::MODIFIER_ATTACHMENT => [
				'name' => 'Modifier attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
				',
			],
			self::CONJUNCTION_DISJUNCTION => [
				'name' => 'Proper interpretation of conjunction and disjunction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
				',
			],
			self::NOMINAL_COMPOUNDS => [
				'name' => 'Nominal compounds',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					An attempt is made to derive the meaning of compounds that are not in de lexicon.
				',
			],
			self::SEMANTIC_COMPOSITION => [
				'name' => 'Semantic composition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					The meaning structure of a phrase, and the sentence as a whole is derived by composing the meaning of the words.
				',
			],
			self::SEMANTIC_COMPOSITION_TYPE => [
				'name' => 'Semantic composition type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'unification' => 'Unification',
					'production rules' => 'Production rules',
					'lambda calculus' => 'Lambda calculus',
					'custom' => 'Custom',
				),
				'desc' => '
				',
			],
			self::SEMANTIC_CONFLICT_DETECTION => [
				'name' => 'Semantic conflict detection',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					The system detects conflicts in semantic structure information.<br><br>
					For example: How many corners has a ball?
				',
			],
			self::QUANTIFIER_SCOPING => [
				'name' => 'Quantifier scoping',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
				',
			],
			self::ANAPHORA_RESOLUTION => [
				'name' => 'Anaphora resolution',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
				',
			],
			self::PLAUSIBILITY_RESOLUTION => [
				'name' => 'Plausibility resolution',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
				',
			],
			self::UNIFORMIZATION_REWRITES => [
				'name' => 'Uniformization rewrites',
				'type' => self::FEATURETYPE_BOOL,
				'desc' => '
				',
			],
			self::COOPERATIVE_RESPONSES => [
				'name' => 'Cooperative responses',
				'type' => self::FEATURETYPE_BOOL,
				'desc' => '
				',
			],
			self::SEMANTIC_FORM_TYPE => [
				'name' => 'Semantic form type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'relational' => 'Relational',
					'procedural' => 'Procedural',
					'ontology' => 'Ontology',
				),
				'desc' => '
				',
			],
			self::SEMANTIC_FORM_DESC => [
				'name' => 'Semantic form description',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'desc' => '
				',
			],
			self::EVENT_BASED => [
				'name' => 'Event based',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
				',
			],
			self::TEMPORAL => [
				'name' => 'Temporal',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
				',
			],
			self::PROPER_NOUN_CONSTANTS => [
				'name' => 'Uses constants for proper nouns',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
				',
			],
			self::ONTOLOGY_USED => [
				'name' => 'Uses an ontology',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
				',
			],
			self::STANDARD_ONTOLOGY => [
				'name' => 'Standard ontology',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::CONVERT_HEADER => [
				'name' => 'Convert header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
			],
			self::CONVERT_TYPE => [
				'name' => 'Convert type',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'options' => array(
					'hard-coded' => 'Hard coded',
				),
				'desc' => '
				',
			],
			self::SYNTACTIC_REWRITE => [
				'name' => 'Syntactic rewrites',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_CONVERSION_TO_KB],
				'desc' => '
				',
			],
			self::OPTIMIZE_QUERY => [
				'name' => 'Optimize query',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_CONVERSION_TO_KB],
				'desc' => '
					The raw knowledge base query is rewritten for reasons of processing speed.
				',
			],
			self::RESTRUCTURE_INFORMATION => [
				'name' => 'Restructure information',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_CONVERSION_TO_KB],
				'desc' => '
				',
			],
			self::KNOWLEDGE_BASE_LANGUAGES => [
				'name' => 'Knowledge base languages',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'desc' => '
				',
			],
			self::KNOWLEDGE_BASE_AGGREGATION => [
				'name' => 'Handle aggregations',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_KB_FORM],
				'desc' => '
				',
			],
			self::EXECUTE_HEADER => [
				'name' => 'Execute header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
			],
			self::LOGICAL_REASONING => [
				'name' => 'Logical reasoning',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_EXECUTION],
				'desc' => '
				',
			],
			self::GENERATE_HEADER => [
				'name' => 'Generate header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
			],
			self::PARAPHRASE_QUERY => [
				'name' => 'Paraphrase knowledge base query',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
				',
			],
		];
	}
}
