<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class Features
{
	const NAME = 'NAME';
	const FIRST_YEAR = 'FIRST_YEAR';
	const LAST_YEAR = 'LAST_YEAR';
	const CONTRIBUTORS = 'CONTRIBUTORS';
	const INSTITUTIONS = 'INSTITUTIONS';
	const INFLUENCED_BY = 'INFLUENCED_BY';
	const NATURAL_LANGUAGES = 'NAT_LANGS';
	const PROGRAMMING_LANGUAGES = 'PROG_LANGS';
	const SOURCE_CODE_URL = 'SOURCE_CODE';
	const KNOWLEDGE_BASE_TYPE = 'KB_TYPE';
	const KNOWLEDGE_BASE_DESCRIPTION = 'KB_TYPE_DESC';
	const SENTENCE_TYPES = 'SENTENCE_TYPES';
	const ARTICLES = 'ARTICLES';
	const BOOKS = 'BOOKS';
	const NAME_DESCRIPTION = 'NAME_DESC';
	const LONG_DESCRIPTION = 'LONG_DESC';

	const ANALYSIS = 'ANALYSIS';
	const SEMANTIC_GRAMMAR = 'SEMANTIC_GRAMMAR';
	const DIALOG = 'DO_DIALOG';
	const NEW_WORDS = 'NEW_WORDS';
	const MULTI_DB = 'MULTI_DB';
	const META_SELF = 'META_SELF';
	const META_KB = 'META_KB';
	const IMPERATIVE = 'IMPERATIVE';
	const IDIOMS = 'IDIONS';

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
	const COMPARATIVE_EXPRESSIONS = 'COMP_EXP';
	const PASSIVES = 'PASSIVES';
	const CLEFTS = 'CLEFTS';
	const THERE_BES = 'THERE';
	const ELLIPSIS = 'ELLIPSIS';

	const MORPHOLOGICAL_ANALYSIS = 'DO_MORPH_ANA';
	const DICTIONARY_LOOKUP = 'DO_DICT_LOOKUP';
	const SPELLING_CORRECTION = 'DO_SPELL_CORR';
	const OPEN_ENDED_TOKEN_RECOGNITION = 'DO_OPEN_ENDED';
	const PROPER_NAMES_FROM_KB = 'DO_PROP_NAME_KB';
	const PROPER_NAMES_BY_MATCHING = 'DO_PROP_NAME_MAT';
	const QUOTED_STRING_RECOGNITION = 'DO_QUOTED_STRINGS';

	const PARSE_HEADER = 'PARSE_HEADER';
	const GRAMMAR_TYPE = 'GRAMMAR_TYPE';
	const PARSER_TYPE = 'PARSER_TYPE';
	const ACCEPT_UNGRAMMATICAL_SENTENCES = 'DO_UNGRAMMATICAL';

	const SYNTACTIC_FORM_TYPE = 'SYNTACTIC_FORM_TYPE';

	const INTERPRET_HEADER = 'INTERPRET_HEADER';
	const SEMANTIC_ATTACHMENT = 'DO_SEMANTIC_ATTACH';
	const MODIFIER_ATTACHMENT = 'DO_MODIFIER_ATTACH';
	const CONJUNCTION_DISJUNCTION = 'DO_CONJUNCTION_DISJUNCTION';
	const NOMINAL_COMPOUNDS = 'DO_NOMINAL_COMPOUNDS';
	const MORPHOLOGICAL_SEMANTIC_COMPOSITION = 'DO_MORPHOLOGICAL_SEMANTIC_COMPOSITION';
	const SEMANTIC_COMPOSITION = 'DO_SEMANTIC_COMP';
	const SEMANTIC_COMPOSITION_TYPE = 'SEMANTIC_COMP_TYPE';
	const SEMANTIC_CONFLICT_DETECTION = 'DO_SEMANTIC_CONFLICT';
	const QUANTIFIER_SCOPING = 'DO_QUANTIFIER_SCOPE';
	const ANAPHORA_RESOLUTION = 'DO_ANAPHORA_RESOL';
	const PLAUSIBILITY_RESOLUTION = 'DO_PLAUSIB_JUDGE';
	const INTERPRET_SPEECH_ACT = 'INTERPRET_SPEECH_ACT';
	const UNIFORMIZATION_REWRITES = 'DO_UNIFORM_REWRITES';
	const COOPERATIVE_RESPONSES = 'COOPERATIVE_RESPONSES'; // Androutsopoulos, p. 24

	const SEMANTIC_FORM_TYPE = 'SEMANTIC_FORM_TYPE';
	const SEMANTIC_FORM_DESC = 'SEMANTIC_FORM_DESC';
	const EVENT_BASED = 'EVENT_BASED';
	const TEMPORAL = 'TEMPORAL';
	const PROPER_NOUN_CONSTANTS = 'PROPER_NOUN_CNST';
	const ONTOLOGY_USED = 'ONTOLOGY_USED';
	const STANDARD_ONTOLOGY = 'STD_ONTOLOGY';

	const CONVERT_HEADER = 'CONVERT_HEADER';
	const SYNTACTIC_REWRITE = 'DO_SYNTACTIC_REWRITE';
	const OPTIMIZE_QUERY = 'DO_OPTIMIZE_QUERY';
	const RESTRUCTURE_INFORMATION = 'DO_INFORMATION_RESTRUCT';

	const KNOWLEDGE_BASE_LANGUAGES  = 'KB_LANGS';
	const KNOWLEDGE_BASE_AGGREGATION = 'KB_AGGREGATIONS';

	const EXECUTE_HEADER = 'EXECUTE_HEADER';
	const LOGICAL_REASONING = 'DO_LOGICAL_REASON';

	const GENERATE_HEADER = 'GENERATE_HEADER';
	const PARAPHRASE_QUERY = 'PARAPHRASE_QUERY';
	const CANNED_RESPONSES = 'CANNED_RESPONSES';
	const PATTERNED_RESPONSES = 'PATTERNED_RESPONSES';

	const SYNTACTIC_FEATURES = 'SYNTACTIC_FEATURES';
	const SEMANTIC_DEFINITION = 'SEMANTIC_DEFINITION';
	const ONLY_IRREGULAR_FORMS = 'ONLY_IRREGULAR_FORMS';

	const GOALS_PLANS_ACTIONS = 'GOALS_PLANS_ACTIONS';

	const TRACK_SUBJECT = 'TRACK_SUBJECT';
	const TRACK_TIME = 'TRACK_TIME';

	const LEARN_NAMES = 'LEARN_NAMES';
	const LEARN_WORDS = 'LEARN_WORDS';
	const LEARN_FACTS = 'LEARN_FACTS';
	const LEARN_RULES = 'LEARN_THEOREMS';
	const REFUSE_TO_ACCEPT = 'REFUSE_TO_ACCEPT';

	const PROOF_BY_EXAMPLE = 'PROOF_BY_EXAMPLE';

	// feature types

	const FEATURETYPE_BOOL = 'boolean';
	const FEATURETYPE_TEXT_SINGLE = 'text_single';
	const FEATURETYPE_TEXT_SINGLE_LONG = 'text_single_long';
	const FEATURETYPE_TEXT_MULTIPLE = 'text_multiple';
	const FEATURETYPE_MULTIPLE_CHOICE = 'multiple_choice';

	// tags

	const TAG_GENERAL = 'general';
	const TAG_CODE = 'code';
	const TAG_STRUCTURE = 'structure';
	const TAG_TOKENIZATION = 'tokenization';
	const TAG_PARSING = 'parsing';
	const TAG_SEMANTIC_ANALYSIS = 'semantic analysis';
	const TAG_CONVERSION_TO_KB = 'conversion to kb';
	const TAG_EXECUTION = 'execution';
	const TAG_ANSWER = 'answer';
	const TAG_DIALOG = 'dialog';
	const TAG_LEARNING = 'learning';
	const TAG_INFERENCE = 'inference';
	const TAG_SEMANTIC_FORM = 'semantic form';
	const TAG_KB_FORM = 'kb form';
	const TAG_KNOWLEDGE_BASE = 'knowledge base';
	const TAG_DOMAIN_MODEL = 'domain model';
	const TAG_LEXICON = 'lexicon';
	const TAG_GRAMMAR = 'grammar';
	const TAG_DISCOURSE_MODEL = 'dialog model';
	const TAG_PHRASE_TYPE = 'phrase type';

	// options

	const OPTION_PATTERN_MATCHING = 'Pattern-matching';
	const OPTION_SYNTAX_BASED = 'Syntax-based';
	const OPTION_SEMANTICS_BASED = 'Semantics-based';

	public static function getFeatures()
	{
		return [
			self::NAME => [
				'name' => 'Name',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => ',
				',
			],
			self::FIRST_YEAR => [
				'name' => 'First year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::LAST_YEAR => [
				'name' => 'Last year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::CONTRIBUTORS => [
				'name' => 'Contributor(s)',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::INSTITUTIONS => [
				'name' => 'Institution',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::INFLUENCED_BY => [
				'name' => 'Influenced by',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::PROGRAMMING_LANGUAGES => [
				'name' => 'Programming language',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'APL' => 'APL',
					'C' => 'C',
					'Fortran' => 'Fortran',
					'Lisp' => 'Lisp',
					'Prolog' => 'Prolog',
				),
				'tags' => [self::TAG_CODE],
				'desc' => '
					Which programming language is used to implement the natural language processing core components of the system?
					This excludes the languages that are only used to interact with the system.
				',
			],
			self::KNOWLEDGE_BASE_TYPE => [
				'name' => 'Knowledge base type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'relational' => 'Relational',
					'tree-based' => 'Tree based',
					'inference engine' => 'Inference engine',
				),
				'tags' => [self::TAG_KNOWLEDGE_BASE],
				'desc' => '
					The way data is stored in the knowledge base:
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
				'tags' => [self::TAG_KB_FORM],
				'desc' => '
				',
			],
			self::SOURCE_CODE_URL => [
				'name' => 'Source code url',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::NAME_DESCRIPTION => [
				'name' => 'Name description',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::LONG_DESCRIPTION => [
				'name' => 'Long description',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::ARTICLES => [
				'name' => 'Articles',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::BOOKS => [
				'name' => 'Books',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_GENERAL],
				'desc' => '
				',
			],
			self::ANALYSIS => [
				'name' => 'Type of analysis',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					self::OPTION_PATTERN_MATCHING => 'Pattern matching',
					self::OPTION_SYNTAX_BASED => 'Syntax based (maps parse tree to DB query)',
					self::OPTION_SEMANTICS_BASED => 'Semantics based (via semantic intermediate)',
				),
				'tags' => [self::TAG_STRUCTURE],
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
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_STRUCTURE],
				'desc' => '
					Domain specific grammar.<br><br>
					The grammar used to parse the sentence contains non-leaf structures that are specially designed for some domain.<br><br>
					Each new application requires a different grammar.<br><br>
					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			],
			self::META_SELF => [
				'name' => 'Answers questions about the Discourse Model',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may ask the system about its current and previous activities.<br><br>
					Example from SHRDLU:<br>
					User: When did you pick it up?<br>
					SHRDLU: While I was stacking up the red cube, a large red block and a large green cube.<br>
					User: Why?<br>
					SHRDLU: To get rid of it.
				',
			],
			self::META_KB => [
				'name' => 'Answers questions about the Domain Model',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may ask the system about the structure of the knowledge base, which is stored in the Domain Model.
				',
			],
			self::DIALOG => [
				'name' => 'Clarification dialog to improve input sentence',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The systems replies with a question in order to establish what the user means, exactly.<br><br>

					Example from SHRDLU:<br>
					User: How many things are on top of green cubes?<br>
					SHRDLU: I\'m not sure what you mean by "on top of" in the phrase "on top of green cubes".
					Do you mean:<br>
					1 - directly on the surface<br>
					2 - anywhere on top of?<br>
					User: 2<br>
					SHRDLU: Three of them
				',
			],
			self::NEW_WORDS => [
				'name' => 'The user may teach the system',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may teach the system about new words or concepts from within the dialog.<br><br>
					An example user sentence: Call the biggest block "superblock" (SHRDLU)
				',
			],
			self::IMPERATIVE => [
				'name' => 'Act on user input',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may tell the system to actually do things, other than answer questions.<br><br>

					Example from SHRDLU:<br>
					User: Pick up a big red block.
				',
			],
			self::IDIOMS => [
				'name' => 'Handle idioms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may use expressions whose meaning cannot be analyzed, and need to be taken as-is.<br><br>

					Example from SHRDLU:<br>
					User: Thank you.<br>
					SHRDLU: You\'re welcome
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
			self::SPELLING_CORRECTION => [
				'name' => 'Spelling correction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Example from RENDEZVOUS:<br>
					User: Give me their locatio also<br>
					RENDEZVOUS: Is the word \'locatio\' intended to be: location? (yes or no)<br>
					User: yes
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
					When a word is not present in the lexicon, the Knowlege Base is queried to find if the word is present as a proper name.
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
			self::GRAMMAR_TYPE => [
				'name' => 'Grammar type',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_GRAMMAR],
				'desc' => '
				',
			],
			self::NATURAL_LANGUAGES => [
				'name' => 'Natural language',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'English' => 'English',
				),
				'tags' => [self::TAG_GRAMMAR],
				'desc' => '
					Which natural languages are supported by this system? The majority of systems just supports English.
				',
			],
			self::SENTENCE_TYPES => [
				'name' => 'Sentence types',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'question' => 'Question',
				    'declarative' => 'Declarative',
				    'imperative' => 'Imperative',
				),
				'tags' => [self::TAG_GRAMMAR],
				'desc' => '
				',
			],
			self::NP => [
				'name' => 'Noun Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::VP => [
				'name' => 'Verb Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PP => [
				'name' => 'Preposition Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::DP => [
				'name' => 'Determiner Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ADVP => [
				'name' => 'ADVerb Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ADJP => [
				'name' => 'ADJective Phrases',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::RC => [
				'name' => 'Relative clauses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::NEG => [
				'name' => 'Negations',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::CONJ => [
				'name' => 'Conjunctions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ANAPHORA => [
				'name' => 'Anaphora',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::AUX => [
				'name' => 'Auxiliaries',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::MODALS => [
				'name' => 'Modals',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::COMPARATIVE_EXPRESSIONS => [
				'name' => 'Comparative expressions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PASSIVES => [
				'name' => 'Passives',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::CLEFTS => [
				'name' => 'Clefts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::THERE_BES => [
				'name' => 'There be',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::ELLIPSIS => [
				'name' => 'Ellipsis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR, self::TAG_PHRASE_TYPE],
				'desc' => '
				',
			],
			self::PARSE_HEADER => [
				'name' => 'Parse header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_PARSING],
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
			self::PARSER_TYPE => [
				'name' => 'Parser type',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_PARSING],
				'desc' => '
				',
			],
			self::SYNTACTIC_FORM_TYPE => [
				'name' => 'Syntactic form type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'parse trees' => 'Parse trees',
				),
				'tags' => [self::TAG_PARSING],
				'desc' => '
				',
			],
			self::INTERPRET_HEADER => [
				'name' => 'Interpreter header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
			],
			self::SEMANTIC_ATTACHMENT => [
				'name' => 'Semantic attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					Meaning structures are taken from the lexicon entries of the matched words and attached to them in the parse tree.
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
			self::MORPHOLOGICAL_SEMANTIC_COMPOSITION => [
				'name' => 'Morphological semantic composition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					Compose the meaning of morphologically compound words by combining the meaning of the morphemes.<br><br>

					Example from SHRDLU: Words like \'littlest\' are not in the dictionary but are interpreted from the root forms
					like \'little\'. (Winograd)
				',
			],
			self::MODIFIER_ATTACHMENT => [
				'name' => 'Modifier attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					The problem is to identify the constituent to which each modifier has to be attached.<br><br>

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction<br><br>

					An example from SHRDLU: Put the blue pyramid on the block in the box.
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
			self::SEMANTIC_COMPOSITION_TYPE => [
				'name' => 'Semantic composition type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'unification' => 'Unification',
					'production rules' => 'Production rules',
					'lambda calculus' => 'Lambda calculus',
					'custom' => 'Custom',
				),
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
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
			self::INTERPRET_SPEECH_ACT => [
				'name' => 'Interpret speech act',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					In general:<br>
					A sentence that starts with a question word is a question.<br>
					A sentence without a subject is an imperative.<br><br>

					But this system is also capable of correctly interpreting some of the sentences like this:<br>
					Can you tell me where I can find Chinese food? (not a yes/no question)<br>
				',
			],
			self::SEMANTIC_FORM_TYPE => [
				'name' => 'Semantic form type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'relational' => 'Relational',
					'procedural' => 'Procedural',
					'ontology' => 'Ontology',
				),
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
				',
			],
			self::SEMANTIC_FORM_DESC => [
				'name' => 'Semantic form description',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_SEMANTIC_FORM],
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
				'tags' => [self::TAG_DOMAIN_MODEL],
				'desc' => '
				',
			],
			self::STANDARD_ONTOLOGY => [
				'name' => 'Standard ontology',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => [self::TAG_DOMAIN_MODEL],
				'desc' => '
				',
			],
			self::CONVERT_HEADER => [
				'name' => 'Convert header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_CONVERSION_TO_KB],
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
				'tags' => [self::TAG_KB_FORM],
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
				'tags' => [self::TAG_EXECUTION],
			],
			self::MULTI_DB => [
				'name' => 'Queries multiple knowledge bases for single request',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_EXECUTION],
				'desc' => '
					The system queries multiple knowledge bases for the same sentence, and integrates the results.
				',
			],
			self::LOGICAL_REASONING => [
				'name' => 'Logical reasoning',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_EXECUTION],
				'desc' => '
					The knowledge base itself contains inference rules that allow facts to be deduced from other facts.
				',
			],
			self::GENERATE_HEADER => [
				'name' => 'Generate header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_ANSWER],
			],
			self::COOPERATIVE_RESPONSES => [
				'name' => 'Cooperative responses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					The system goes beyond literally answering the question,
					it answers in a way that actually helps the user.<br><br>

					Example from SHRDLU:<br>
					 User: \'Is it supported?\'<br>
					 SHRDLU: \'Yes, by the table\'

				',
			],
			self::PARAPHRASE_QUERY => [
				'name' => 'Paraphrase knowledge base query',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
				',
			],
			self::CANNED_RESPONSES => [
				'name' => 'Canned responses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					The system shows fixed pieces of text as a response.<br><br>

					Example from SHRDLU:<br>
					 User: Stack up two pyramids<br>
					 SHRDLU: I can\t.
				',
			],
			self::PATTERNED_RESPONSES => [
				'name' => 'Simple responses with variables',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					The system shows simple pieces of text, with some variables, as a response.<br><br>

					Example from SHRDLU:<br>
					 User: How many blocks are not in the box?<br>
					 SHRDLU: Four of them<br>
					 (the pattern: %n of them)
				',
			],
			self::SYNTACTIC_FEATURES => [
				'name' => 'Syntactic features',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEXICON],
				'desc' => '
					A lexical entry has information syntactic features.<br>
					For example: work (part-of-speech = verb)
				',
			],
			self::SEMANTIC_DEFINITION => [
				'name' => 'Semantic definition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEXICON],
				'desc' => '
					A lexical entry has a definition of the meaning of the word.
				',
			],
			self::ONLY_IRREGULAR_FORMS => [
				'name' => 'Only irregular forms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEXICON],
				'desc' => '
					The lexicon stores only irregular forms of verbs, like \'geese\' and \'slept\'.
					The regular morphological compound forms are derived by applying rules.
				',
			],
			self::GOALS_PLANS_ACTIONS => [
				'name' => 'Goals, plans and actions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DISCOURSE_MODEL],
				'desc' => '
					The system creates goals, plans and actions to answer the user.
				',
			],
			self::TRACK_SUBJECT => [
				'name' => 'Keep track of subject',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DISCOURSE_MODEL],
				'desc' => '
					The system remembers the active subject, in order to resolve references like \'it\'.
				',
			],
			self::TRACK_TIME => [
				'name' => 'Keep track of time',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DISCOURSE_MODEL],
				'desc' => '
					The system remembers the current time of discourse, in order to resolve references like \'then\'.
				',
			],
			self::LEARN_NAMES => [
				'name' => 'Learn new names',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may teach the system new names for things.<br><br>

					Example from SHRDLU:<br>
					User: Call the biggest block "superblock"<br>
					User: Have you picked up superblock since we began?<br>
					SHRDLU: YES.
				',
			],
			self::LEARN_WORDS => [
				'name' => 'Learn new words',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may explain to the system what a words means.<br><br>

					Example from SHRDLU:<br>
					User: A "steeple" is a stack which contains two green cubes and a pyramid<br>
					User: Are there any steeples now?<br>
					SHRDLU: NO.
				',
			],
			self::LEARN_FACTS => [
				'name' => 'Learn new facts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may tell the system about a new fact for the knowledge base.<br><br>

					Example from SHRDLU:<br>
					User: The blue block is mine.<br>
					User: Do I own anything in the box?<br>
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.
				',
			],
			self::LEARN_RULES => [
				'name' => 'Learn new rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may tell the system about rules that apply to the knowledge base.<br><br>

					Example from SHRDLU:<br>
					User: I own blocks which are not red, but I don\'t own anything which supports a pyramid.<br>
					User: Do I own anything in the box?<br>
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.
				',
			],
			self::REFUSE_TO_ACCEPT => [
				'name' => 'Refuse to accept',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					Based on a contradiction with a known fact, the system refuses to accept what the user tells him.<br><br>

					Example from SHRDLU:<br>
					User: There were five blocks to the left of the box then.<br>
					SHRDLU: No, only four of them: the red cube, two large green cubes and a large red block
				',
			],
			self::PROOF_BY_EXAMPLE => [
				'name' => 'Proof by example',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_INFERENCE],
				'desc' => '
					Conclude that something is possible from the existence of at least a single instance.<br><br>

					Example from SHRDLU:<br>
					User: can a pyramid be supported by a block?<br>
					SHRDLU: YES.<br><br>
					The deductive system finds an actual example, so it knows this is possible. (Winograd)
				',
			],
		];
	}
}
