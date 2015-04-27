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
	const GOAL_HISTORY = 'GOAL_HISTORY';
	const STATE_HISTORY = 'STATE_HISTORY';
	const KNOWLEDGE_BASE_DESCRIPTION = 'KB_TYPE_DESC';
	const SENTENCE_TYPES = 'SENTENCE_TYPES';
	const PHRASE_TYPES = 'PHRASE_TYPES';
	const ARTICLES = 'ARTICLES';
	const BOOKS = 'BOOKS';
	const NAME_DESCRIPTION = 'NAME_DESC';
	const LONG_DESCRIPTION = 'LONG_DESC';

	const ANALYSIS = 'ANALYSIS';
	const SEMANTIC_GRAMMAR = 'SEMANTIC_GRAMMAR';
	const AMBIGUITY = 'AMBIGUITY';
	const INTEGRATED_KNOWLEDGE_BASE = 'INTEGRATED_KNOWLEDGE_BASE';
	const DIALOG = 'DO_DIALOG';
	const NEW_WORDS = 'NEW_WORDS';
	const MULTI_DB = 'MULTI_DB';
	const META_SELF = 'META_SELF';
	const META_GOAL_MODEL = 'META_GOAL_MODEL';
	const META_KB = 'META_KB';
	const IMPERATIVE = 'IMPERATIVE';
	const IDIOMS = 'IDIONS';
	const QUESTION_TYPES = 'QUESTION_TYPES';

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
	const CLAUSES_AS_OBJECTS = 'CLAUSES_AS_OBJECTS';

	const TOKENIZATION_HEADER = 'TOKENIZATION_HEADER';
	const MORPHOLOGICAL_ANALYSIS = 'DO_MORPH_ANA';
	const DICTIONARY_LOOKUP = 'DO_DICT_LOOKUP';
	const SPELLING_CORRECTION = 'DO_SPELL_CORR';
	const OPEN_ENDED_TOKEN_RECOGNITION = 'DO_OPEN_ENDED';
	const PROPER_NAMES_FROM_KB = 'DO_PROP_NAME_KB';
	const PROPER_NAMES_BY_MATCHING = 'DO_PROP_NAME_MAT';
	const QUOTED_STRING_RECOGNITION = 'DO_QUOTED_STRINGS';
	const POS_TAGGER = 'POS_TAGGER';

	const PARSE_HEADER = 'PARSE_HEADER';
	const GRAMMAR_TYPE = 'GRAMMAR_TYPE';
	const PARSER_TYPE = 'PARSER_TYPE';
	const ACCEPT_UNGRAMMATICAL_SENTENCES = 'DO_UNGRAMMATICAL';

	const SYNTACTIC_FORM_TYPE = 'SYNTACTIC_FORM_TYPE';
	const APPLY_SELECTIONAL_RESTRICTIONS = 'APPLY_SELECTIONAL_RESTRICTIONS';

	const INTERPRET_HEADER = 'INTERPRET_HEADER';
	const SEMANTIC_ANALYSIS_PARSING = 'SEMANTIC_ANALYSIS_PARSING';
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
	const DEDUCTION_RULES = 'DEDUCTION_RULES';
	const PLANS = 'PLANS';

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
	const GENERATE_FULL_RESPONSE = 'GENERATE_FULL_RESPONSE';
	const CANNED_RESPONSES = 'CANNED_RESPONSES';
	const PATTERNED_RESPONSES = 'PATTERNED_RESPONSES';

	const SYNTACTIC_FEATURES = 'SYNTACTIC_FEATURES';
	const SEMANTIC_DEFINITION = 'SEMANTIC_DEFINITION';
	const ONLY_IRREGULAR_FORMS = 'ONLY_IRREGULAR_FORMS';
	const SELECTIONAL_RESTRICTIONS = 'SELECTIONAL_RESTRICTIONS';

	const DEICTIC_CENTER = 'DEICTIC_CENTER';
	const TRACK_SUBJECT = 'TRACK_SUBJECT';
	const TRACK_TIME = 'TRACK_TIME';
	const TRACK_PLANS = 'TRACK_PLANS';

	const LEARN_NAMES = 'LEARN_NAMES';
	const LEARN_WORDS = 'LEARN_WORDS';
	const LEARN_FACTS = 'LEARN_FACTS';
	const LEARN_RULES = 'LEARN_THEOREMS';
	const REFUSE_TO_ACCEPT = 'REFUSE_TO_ACCEPT';

	const DEDUCTION = 'DEDUCTION';
	const PROOF_BY_EXAMPLE = 'PROOF_BY_EXAMPLE';

	const INSTANTIATED_GOALS = 'INSTANTIATED_GOALS';

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
	const TAG_GOAL_MODEL = 'goal model';
	const TAG_LEXICON = 'lexicon';
	const TAG_GRAMMAR = 'grammar';
	const TAG_DISCOURSE_MODEL = 'dialog model';

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

					Relational
					: A relational database
					Tree based
					: A hierarchical database
					Inference engine
					: A logical database, with inference rules
				',
			],
			self::STATE_HISTORY => [
				'name' => 'History of states and events',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_KNOWLEDGE_BASE],
				'desc' => '
					In order to answer questions about previous states, the system needs to keep track of its states and events,
					and how they were connected.

					## Example from SHRDLU
					User: What did the red cube support before you started to clear it off?
					SHRDLU: The green pyramid
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
					The main categories of natural language interfaces

						Pattern matching
						: Literal occurrences of a pattern in a sentence are converted directly to parts of a DB query
						Syntax based
						: A sentence is parsed and the parse tree is mapped directly to a DB query
						Semantics based
						: After a sentence is parsed, it is first converted into an intermediate semantic expression, which is in turn converted into a DB query

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			],
			self::SEMANTIC_GRAMMAR => [
				'name' => 'Semantic grammar',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_STRUCTURE],
				'desc' => '
					Domain specific grammar.

					The grammar used to parse the sentence contains non-leaf structures that are specially designed for some domain.
					Each new application requires a different grammar.

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			],
			self::AMBIGUITY => [
				'name' => 'Ambiguity',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'Early-convergence' => 'Early convergence',
					'Late-convergence' => 'Late convergence',
				),
				'tags' => [self::TAG_STRUCTURE],
				'desc' => '
					How does the system deal with the ambiguity in the input sentence?

					Ambiguity occurs at the tokenization phase (the word \'de\' may be part of a last name, or it may be an article),
					at the parsing phase (causing multiple parse trees), and at the semantic analysis phase (quantifier scoping problems, for example).

					Early convergence
					: Apply as much restrictions as available, early in the process. At all stages, pick only a single interpretation.
					Late convergence
					: Keep all interpretations open. Pick the interpretation that gives the \'best\' result in the end. Score results.

				',
			],
			self::INTEGRATED_KNOWLEDGE_BASE => [
				'name' => 'Integrated knowledge base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_STRUCTURE],
				'desc' => '
					The knowledge base is part of the system.

					 Advantages:
					 <ul>
					    <li>No need to convert a semantic structure to a knowledge base structure.</li>
					 </ul>

					 Disadvantages:
					 <ul>
					    <li>The system is not extendable at this point. It has no ready-made facilities to link to external knowledge bases.</li>
					 </ul>
				',
			],
			self::META_SELF => [
				'name' => 'Answers questions about the Knowledge Base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					This is the basic function of a Natural Language Interface: to answer questions about a knowledge base.
				',
			],
			self::META_GOAL_MODEL => [
				'name' => 'Answers questions about the Goal Model',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may ask the system about the means and motives of the system (how and why).

					## Example from SHRDLU:
					User: When did you pick it up?
					SHRDLU: While I was stacking up the red cube, a large red block and a large green cube.
					User: Why?
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
			self::NEW_WORDS => [
				'name' => 'The user may teach the system',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may teach the system about new words or concepts from within the dialog.

					An example user sentence: Call the biggest block "superblock" (SHRDLU)
				',
			],
			self::IMPERATIVE => [
				'name' => 'Act on user input',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may tell the system to actually do things, other than answer questions.

					## Example from SHRDLU:
					User: Pick up a big red block.
				',
			],
			self::IDIOMS => [
				'name' => 'Handle idioms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DIALOG],
				'desc' => '
					The user may use expressions whose meaning cannot be analyzed, and need to be taken as-is.

					## Example from SHRDLU:
					User: Thank you.
					SHRDLU: You\'re welcome

					## Classic idiom example from ThoughtTreasure:
					User: Peter kicked the bucket.
					ThoughtTreasure structure: [died Peter]
				',
			],
			self::QUESTION_TYPES => [
				'name' => 'Types of questions',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'yes/no' => 'Yes / No',
					'wh' => 'Which / What / Who',
					'how many' => 'How many',
					'when' => 'When',
					'how' => 'How',
					'why' => 'Why',
				),
				'tags' => [self::TAG_DIALOG],
				'desc' => '',
			],
			self::TOKENIZATION_HEADER => [
				'name' => 'Tokenization header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '',
			],
			self::DICTIONARY_LOOKUP => [
				'name' => 'Lexicon lookup',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Uses (among others) a lexicon to recognize tokens in a sentence.

					Especially useful for compound nouns, like \'distance learning\' that cannot be recognized by using space as a delimiter alone.

					The lexicon may also provide the part-of-speech of the word, i.e. noun, verb, preposition, to be used in the parsing process.
				',
			],
			self::MORPHOLOGICAL_ANALYSIS => [
				'name' => 'Morphological analysis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Removes the prefixes and suffixes of a word to find the root form (present in the lexicon)

					For example: larger => large; finding => find; unable => able
				',
			],
			self::SPELLING_CORRECTION => [
				'name' => 'Spelling correction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					## Example from RENDEZVOUS:
					User: Give me their locatio also
					RENDEZVOUS: Is the word \'locatio\' intended to be: location? (yes or no)
					User: yes
				',
			],
			self::OPEN_ENDED_TOKEN_RECOGNITION => [
				'name' => 'Open-ended token recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Recognizes words from an endless category that is not a good fit for a lexicon.

					Examples are ordinals: 42, forty-two, forty-second

					ThoughtTreasure: Date expressions such as the following are recognized (Mueller):

					Monday March 11, 1996<br>
					March 11, 1996<br>
					March 1996<br>
					March \'96<br>
					lundi le 11 mars 1996<br>
					..
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
					Proper names are recognized by fitting them into a pattern.

					For example: [A-Z][a-z]* van der [A-Z][a-z]*
				',
			],
			self::QUOTED_STRING_RECOGNITION => [
				'name' => 'Quoted string recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					Recognizes quoted sentences as part of a sentence.

					For example: Who said "Gravitation is not responsible for people falling in love"?
				',
			],
			self::POS_TAGGER => [
				'name' => 'Uses a part-of-speech tagger',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_TOKENIZATION],
				'desc' => '
					An off-the-shelf part-of-speech tagger is used to determine the parts-of-speech of the words in a sentence.
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
			self::PHRASE_TYPES => [
				'name' => 'Phrase types',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					self::NP => 'Noun Phrases',
					self::VP => 'Verb Phrases',
					self::PP => 'Preposition Phrases',
					self::DP => 'Determiner Phrases',
					self::ADVP => 'ADVerb Phrases',
					self::ADJP => 'ADJective Phrases',
					self::RC => 'Relative Clauses',
					self::NEG => 'Negations',
					self::CONJ => 'Conjunctions',
					self::ANAPHORA => 'Anaphora',
					self::AUX => 'Auxiliaries',
					self::MODALS => 'Modals',
					self::COMPARATIVE_EXPRESSIONS => 'Comparative expressions',
					self::PASSIVES => 'Passives',
					self::CLEFTS => 'Clefts',
					self::THERE_BES => 'There be',
					self::CLAUSES_AS_OBJECTS => 'Clauses as objects',
				),
				'tags' => [self::TAG_GRAMMAR],
				'desc' => '
					## Clauses as objects; example from SHRDLU:
					User: Find a block which is taller than the one I told you to pick up.<br>
					"you to pick up" is a clause that is treated as an object (Winograd)
				',
			],
			self::ELLIPSIS => [
				'name' => 'Ellipsis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GRAMMAR],
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
			self::APPLY_SELECTIONAL_RESTRICTIONS => [
				'name' => 'Apply selectional restrictions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_PARSING],
				'desc' => '
					The parser excludes sentences that violate (semantic) selectional restrictions that the verb (predicate)
					imposes on its arguments.

					For example, this the sentence "Sam drank a car" will not parse if the verb "drink" imposes the class "liquid"
					on its object.
				',
			],
			self::INTERPRET_HEADER => [
				'name' => 'Interpreter header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
			],
			self::SEMANTIC_ANALYSIS_PARSING => [
				'name' => 'Analyse while parsing',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					Semantic analysis takes place as part of the parsing process.

					The alternative would be that semantic analysis only takes places after parsing is complete.

					The semantic structures created for different parts of the parse tree may conflict, and when they do,
						this path is abandoned. This helps to cut down the number of possible parse trees.
				',
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
					Compose the meaning of morphologically compound words by combining the meaning of the morphemes.

					Example from SHRDLU:<br>
					Words like \'littlest\' are not in the dictionary but are interpreted from the root forms
					like \'little\'. (Winograd)
				',
			],
			self::MODIFIER_ATTACHMENT => [
				'name' => 'Modifier attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					The problem is to identify the constituent to which each modifier has to be attached.

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction

					An example from SHRDLU:<br>
					Put the blue pyramid on the block in the box.
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
					'custom' => 'Custom procedures',
				),
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					Semantic composition is the process of building the meaning of a sentence from the meanings of
					the phrases and eventually, the words.

					Unification
					: .
					Production rules
					: .
					Lambda calculus
					: /.
					Custom procedures
					: Custom pieces of code act on the contents of parse tree nodes and attach semantic structures to them. Very flexible but in general not very extendible

				',
			],
			self::SEMANTIC_CONFLICT_DETECTION => [
				'name' => 'Semantic conflict detection',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_SEMANTIC_ANALYSIS],
				'desc' => '
					The system detects conflicts in semantic structure information.
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
					A sentence that starts with a question word is a question.
					A sentence without a subject is an imperative.

					But this system is also capable of correctly interpreting some of the sentences like this:
					Can you tell me where I can find Chinese food? (not a yes/no question)
				',
			],
			self::SEMANTIC_FORM_TYPE => [
				'name' => 'Semantic form type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'relational' => 'Relational',
					'list-based' => 'List based',
					'goal-based' => 'Goal based',
					'fopl-based' => 'First order Predicate Logic',
				),
				'tags' => [self::TAG_SEMANTIC_FORM],
				'desc' => '
					Relational
					: ?
					List-based
					: A nested list of [predicate argument, argument, ...] where each argument can be another list.
					Goal-based
					: A nested structure of [goal means means, ...] where each means can be another tree
					First Order Predicate Logic
					: A nested logical structure of functions and operators

					An example from ThoughtTreasure (list-based):<br>
					"Who directed Rendezvous in Paris?"<br>is represented as
					~~~
					[preterit-indicative
						[director-of *RDP *human-interrogative-pronoun]]
					~~~
					An example from SHRDLU (goal-based):<br>
					"Is any block  supported by three pyramids?"<br>is represented as the Planner construct
					~~~
					(THFIND ALL $?X1 (X1)
						(THGOAL (#IS $?X1 #BLOCK))
						(THFIND 3 $?X2 (X2)
							(THGOAL (#IS $?X2 #PYRAMID))
							(THGOAL (#SUPPORT $?X2 $?X1))))
					~~~
					An example from Orakel (FOPL)
					"Which river passes through Berlin?"
					~~~
					?x (river(x) &and; flow_through(x, Berlin))
					~~~
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
			self::DEDUCTION_RULES => [
				'name' => 'Deduction rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DOMAIN_MODEL],
				'desc' => '
					IF/THEN inference rules to deduce facts from other facts.
				',
			],
			self::PLANS => [
				'name' => 'A plan library',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DOMAIN_MODEL],
				'desc' => '
					A set of plans needed to reach certain goals.
					A plan consists of a goal and a set of actions, or lower level plans.
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
					it answers in a way that actually helps the user.

					## Example from SHRDLU:
					User: Is it supported?
					SHRDLU: Yes, by the table
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
					The system shows a fixed piece of text as a response to a question.

					## Example from SHRDLU:
					User: Stack up two pyramids
					SHRDLU: I can\'t.

					## Example from ThoughtTreasure:
					User: How are you?
					ThoughtTreasure: Very well, thank you.
				',
			],
			self::PATTERNED_RESPONSES => [
				'name' => 'Simple responses with variables',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					The system shows simple pieces of text, with some variables, as a response.

					## Example from SHRDLU:
					User: How many blocks are not in the box?
					SHRDLU: Four of them
				',
			],
			self::GENERATE_FULL_RESPONSE => [
				'name' => 'Generate full response',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					## Example from ThoughtTreasure:
					User: List my appointments.
					ThoughtTreasure: You have an appointment with Ruth Northville at the Four Seasons in one hour. You have an appointment with Amy Newton on Thursday March 21, 1996 at eight pm.
				',
			],
			self::DIALOG => [
				'name' => 'Clarification dialog to improve input sentence',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_ANSWER],
				'desc' => '
					The systems replies with a question in order to establish what the user means, exactly.

					## Example from SHRDLU:
					User: How many things are on top of green cubes?
					SHRDLU: I\'m not sure what you mean by "on top of" in the phrase "on top of green cubes".<br>Do you mean:<br>1 - directly on the surface<br>2 - anywhere on top of?
					User: 2
					SHRDLU: Three of them

					## Example from ThoughtTreasure:
					User: I want to buy a Fiat Spider.
					ThoughtTreasure: A 124, a 2000, or a 1800?
					User: A 124.
					ThoughtTreasure: A 1978 Fiat 124 was for sale for 3000 dollars by Todd Spire at "toddspi@quapaw.astate.edu".
				',
			],
			self::SYNTACTIC_FEATURES => [
				'name' => 'Syntactic features',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEXICON],
				'desc' => '
					A lexical entry has information syntactic features.

					For example: work (part-of-speech = verb), birds (part-of-speech = noun, number = plural)
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
			self::SELECTIONAL_RESTRICTIONS => [
				'name' => 'Selectional restrictions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEXICON],
				'desc' => '
					The lexicon stores constraints (semantic) selectional constraints for each verb.

					For example, the verb may contain the restrictions:
					* subject: instance of living organism
					* object: instance of a liquid
				',
			],
			self::DEICTIC_CENTER => [
				'name' => 'Deictic center',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'person' => 'Person',
					'time' => 'Time',
					'space' => 'Space',
				),
				'tags' => [self::TAG_DISCOURSE_MODEL],
				'desc' => '
					Some words can only be understood in reference to an origin. This origin is called the deictic center.

					Person
					: Words like like \'he\', \'their\'
					Time
					: Words like \'yesterday\'
					Space
					: Words like \'there\', \'this\'

					Hence the system needs to update the origin with each new sentence.
				',
			],
			self::TRACK_PLANS => [
				'name' => 'Keep track of active plans',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_DISCOURSE_MODEL],
				'desc' => '
					The system needs to remember what plans it is currently working on.
				',
			],
			self::LEARN_NAMES => [
				'name' => 'Learn new names',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may teach the system new names for things.

					## Example from SHRDLU:
					User: Call the biggest block "superblock"
					User: Have you picked up superblock since we began?
					SHRDLU: YES.

					## ThoughtTreasure
					If the name text agent encounters an unknown word in a context where it is likely to be a name,
					such as after a first name, if it has a prefix or suffix  commonly used in names, it learns the new name.
				',
			],
			self::LEARN_WORDS => [
				'name' => 'Learn new words',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may explain to the system what a words means.

					## Example from SHRDLU:
					User: A "steeple" is a stack which contains two green cubes and a pyramid
					User: Are there any steeples now?
					SHRDLU: NO.
				',
			],
			self::LEARN_FACTS => [
				'name' => 'Learn new facts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may tell the system about a new fact for the knowledge base.

					## Example from SHRDLU:
					User: The blue block is mine.
					User: Do I own anything in the box?
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.
				',
			],
			self::LEARN_RULES => [
				'name' => 'Learn new rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					The user may tell the system about rules that apply to the knowledge base.

					## Example from SHRDLU:
					User: I own blocks which are not red, but I don\'t own anything which supports a pyramid.
					User: Do I own anything in the box?
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.
				',
			],
			self::REFUSE_TO_ACCEPT => [
				'name' => 'Refuse to accept',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_LEARNING],
				'desc' => '
					Based on a contradiction with a known fact, the system refuses to accept what the user tells him.

					## Example from SHRDLU:
					User: There were five blocks to the left of the box then.
					SHRDLU: No, only four of them: the red cube, two large green cubes and a large red block
				',
			],
			self::DEDUCTION => [
				'name' => 'Deduction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_INFERENCE],
				'desc' => '
					Deductive reasoning: reason from premises to conclusions.

					Apply the deduction rules from the Domain Model to reach factual statements that are not stored literally in the Knowledge Base.
				',
			],
			self::PROOF_BY_EXAMPLE => [
				'name' => 'Proof by example',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_INFERENCE],
				'desc' => '
					Conclude that something is possible from the existence of at least a single instance.

					## Example from SHRDLU:
					User: can a pyramid be supported by a block?
					SHRDLU: YES.<br>
					The deductive system finds an actual example, so it knows this is possible. (Winograd)
				',
			],
			self::INSTANTIATED_GOALS => [
				'name' => 'Instantiated goals',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GOAL_MODEL],
				'desc' => '
					Goals, plans and actions. Goals are taken from the Domain Model and instantiated with data from the user query.

					The plans are also taken from the Domain Model, and bound to variables from the goal.

					## From SHRDLU:
					User: Pick up a big red block.
					SHRDLU: OK<br>
					The system answers "OK" when it carries out a command. In order to pick up the red block,
					it had to clear it off by finding a space for the green one and moving the green one away. (Winograd)
				',
			],
			self::GOAL_HISTORY => [
				'name' => 'History of goals, plans and actions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => [self::TAG_GOAL_MODEL],
				'desc' => '
					In order to answer questions about its motives, the system needs to keep track of its goals and plans,
					and how they were connected.

					## Example from SHRDLU:
					User: Why did you do that?
					SHRDLU: To clear off the red cube
				',
			],
		];
	}
}
