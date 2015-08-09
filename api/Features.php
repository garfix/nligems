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
	const IDIOMS = 'IDIOMS';
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
	const GRAMMATICAL_RELATIONS = 'GRAMMATICAL_RELATIONS';
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
	const SEMANTIC_USE_LEXICON = 'USE_LEXICON';
	const SEMANTIC_COMPOSITION = 'DO_SEMANTIC_COMP';
	const SEMANTIC_COMPOSITION_TYPE = 'SEMANTIC_COMP_TYPE';
	const SEMANTIC_CONFLICT_DETECTION = 'DO_SEMANTIC_CONFLICT';
	const QUANTIFIER_SCOPING = 'DO_QUANTIFIER_SCOPE';
	const ANAPHORA_RESOLUTION = 'DO_ANAPHORA_RESOL';
	const PLAUSIBILITY_RESOLUTION = 'DO_PLAUSIB_JUDGE';
	const INTERPRET_SPEECH_ACT = 'INTERPRET_SPEECH_ACT';
	const COMMONSENSE_TYPES = 'COMMON_SENSE_TYPES';
	const UNIFORMIZATION_REWRITES = 'DO_UNIFORM_REWRITES';
	const COOPERATIVE_RESPONSES = 'COOPERATIVE_RESPONSES'; // Androutsopoulos, p. 24

	const SEMANTIC_FORM_TYPE = 'SEMANTIC_FORM_TYPE';
	const SEMANTIC_FORM_DESC = 'SEMANTIC_FORM_DESC';
	const EVENT_BASED = 'EVENT_BASED';
	const TEMPORAL = 'TEMPORAL';
	const PROPER_NOUN_CONSTANTS = 'PROPER_NOUN_CNST';
	const ONTOLOGY_USED = 'ONTOLOGY_USED';
	const STANDARD_ONTOLOGY = 'STD_ONTOLOGY';
	const GRADABLE_ADJECTIVES = 'GRADABLE_ADJECTIVES';
	const DEDUCTION_RULES = 'DEDUCTION_RULES';
	const PLANS = 'PLANS';
	const PROCEDURES_FOR_SHOW_MANIPULATE = 'PROCEDURES_FOR_SHOW_MANIPULATE';
	const GOAL_CREATION_RULES = 'GOAL_CREATION_RULES';

	const CONVERT_HEADER = 'CONVERT_HEADER';
	const SYNTACTIC_REWRITE = 'DO_SYNTACTIC_REWRITE';
	const OPTIMIZE_QUERY = 'DO_OPTIMIZE_QUERY';
	const RESTRUCTURE_INFORMATION = 'DO_INFORMATION_RESTRUCT';

	const KNOWLEDGE_BASE_LANGUAGES  = 'KB_LANGS';
	const KNOWLEDGE_BASE_AGGREGATION = 'KB_AGGREGATIONS';

	const EXECUTE_HEADER = 'EXECUTE_HEADER';
	const LOGICAL_REASONING = 'DO_LOGICAL_REASON';

	const GOAL_CREATION = 'GOAL_CREATION';
	const PLAN_EXECUTION = 'PLAN_EXECUTION';
	const PROCESS_FEEDBACK = 'PROCESS_FEEDBACK';

	const GENERATE_HEADER = 'GENERATE_HEADER';
	const PARAPHRASE_QUERY = 'PARAPHRASE_QUERY';
	const GENERATE_FULL_RESPONSE = 'GENERATE_FULL_RESPONSE';
	const CANNED_RESPONSES = 'CANNED_RESPONSES';
	const PATTERNED_RESPONSES = 'PATTERNED_RESPONSES';

	const SYNTACTIC_FEATURES = 'SYNTACTIC_FEATURES';
	const SEMANTIC_DEFINITION = 'SEMANTIC_DEFINITION';
	const ONLY_IRREGULAR_FORMS = 'ONLY_IRREGULAR_FORMS';
	const SEMANTIC_SELECTIONAL_RESTRICTIONS = 'SEMANTIC_SELECTIONAL_RESTRICTIONS';
	const CATEGORY_SELECTIONAL_RESTRICTIONS = 'CATEGORY_SELECTIONAL_RESTRICTIONS';
	const LEXICON_IDIOMS = 'LEXICON_IDIOMS';
	const PHRASAL_VERBS = 'PHRASAL_VERBS';
	const LEXICON_ROLES = 'LEXICON_ROLES';
	const SEMANTIC_FORM_PROPERTIES = 'SEMANTIC_FORM_PROPERTIES';

	const DEICTIC_CENTER = 'DEICTIC_CENTER';
	const TRACK_SUBJECT = 'TRACK_SUBJECT';
	const TRACK_TIME = 'TRACK_TIME';
	const TRACK_PLANS = 'TRACK_PLANS';

	const LEARN_NAMES = 'LEARN_NAMES';
	const LEARN_WORDS = 'LEARN_WORDS';
	const LEARN_WORDS_BY_DEDUCTION = 'LEARN_WORDS_BY_DEDUCTION';
	const LEARN_FACTS = 'LEARN_FACTS';
	const LEARN_RULES = 'LEARN_THEOREMS';
	const REFUSE_TO_ACCEPT = 'REFUSE_TO_ACCEPT';

	const USE_TRANSFORMATION_RULES = 'USE_TRANSFORMATION_RULES';
	const GENERATE_PRONOUNS = 'GENERATE_PRONOUNS';
	const GENERATE_ARTICLES = 'GENERATE_ARTICLES';
	const GENERATE_ASPECT = 'GENERATE_ASPECT';

	const DEDUCTION = 'DEDUCTION';
	const PROOF_BY_EXAMPLE = 'PROOF_BY_EXAMPLE';
	const PROOF_BY_CUSTOM_PROCEDURE = 'PROOF_BY_CUSTOM_PROCEDURE';

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
	const TAG_COMMONSENSE = 'commonsense';
	const TAG_CONVERSION_TO_KB = 'conversion to kb';
	const TAG_EXECUTION = 'execution';
	const TAG_ANSWER = 'answer';
	const TAG_DIALOG = 'dialog';
	const TAG_GENERATION = 'generation';
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
	const TAG_PLANNING = 'planning';

	// options

	const OPTION_PATTERN_MATCHING = 'Pattern-matching';
	const OPTION_SYNTAX_BASED = 'Syntax-based';
	const OPTION_SEMANTICS_BASED = 'Semantics-based';

	public static function getFeatures()
	{
		return array(
			self::NAME => array(
				'name' => 'Name',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => ',
				',
			),
			self::FIRST_YEAR => array(
				'name' => 'First year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::LAST_YEAR => array(
				'name' => 'Last year',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::CONTRIBUTORS => array(
				'name' => 'Contributor(s)',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::INSTITUTIONS => array(
				'name' => 'Institution',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::INFLUENCED_BY => array(
				'name' => 'Influenced by',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::PROGRAMMING_LANGUAGES => array(
				'name' => 'Programming language',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'APL' => 'APL',
					'C' => 'C',
					'Fortran' => 'Fortran',
					'Lisp' => 'Lisp',
					'Prolog' => 'Prolog',
				),
				'tags' => array(self::TAG_CODE),
				'desc' => '
					Which programming language is used to implement the natural language processing core components of the system?
					This excludes the languages that are only used to interact with the system.
				',
			),
			self::KNOWLEDGE_BASE_TYPE => array(
				'name' => 'Knowledge base type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'relational' => 'Relational',
					'tree-based' => 'Tree based',
					'list-based' => 'List based',
				),
				'tags' => array(self::TAG_KNOWLEDGE_BASE),
				'desc' => '
					The way data is stored in the knowledge base:

					Relational
					: A relational database with tables
					Tree based
					: A hierarchical database with trees
					List based
					: Data is stored as a set of (nested) lists. The outermost list contains a predicate.
				',
			),
			self::STATE_HISTORY => array(
				'name' => 'History of states and events',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_KNOWLEDGE_BASE),
				'desc' => '
					In order to answer questions about previous states, the system needs to keep track of its states and events,
					and how they were connected.

					## Example from SHRDLU
					User: What did the red cube support before you started to clear it off?
					SHRDLU: The green pyramid
				',
			),
			self::KNOWLEDGE_BASE_DESCRIPTION => array(
				'name' => 'Knowledge base description',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_KB_FORM),
				'desc' => '
				',
			),
			self::SOURCE_CODE_URL => array(
				'name' => 'Source code url',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::NAME_DESCRIPTION => array(
				'name' => 'Name description',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::LONG_DESCRIPTION => array(
				'name' => 'This is a gem because',
				'type' => self::FEATURETYPE_TEXT_SINGLE_LONG,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::ARTICLES => array(
				'name' => 'Articles',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::BOOKS => array(
				'name' => 'Books',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_GENERAL),
				'desc' => '
				',
			),
			self::ANALYSIS => array(
				'name' => 'Type of analysis',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					self::OPTION_PATTERN_MATCHING => 'Pattern matching',
					self::OPTION_SYNTAX_BASED => 'Syntax based (maps parse tree to DB query)',
					self::OPTION_SEMANTICS_BASED => 'Semantics based (via semantic intermediate)',
				),
				'tags' => array(self::TAG_STRUCTURE),
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
			),
			self::SEMANTIC_GRAMMAR => array(
				'name' => 'Semantic grammar',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_STRUCTURE),
				'desc' => '
					Domain specific grammar.

					The grammar used to parse the sentence contains non-leaf structures that are specially designed for some domain.
					Each new application requires a different grammar.

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction
				',
			),
			self::AMBIGUITY => array(
				'name' => 'Ambiguity',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'Early-convergence' => 'Early convergence',
					'Late-convergence' => 'Late convergence',
				),
				'tags' => array(self::TAG_STRUCTURE),
				'desc' => '
					How does the system deal with the ambiguity in the input sentence?

					Ambiguity occurs at the tokenization phase (the word \'de\' may be part of a last name, or it may be an article),
					at the parsing phase (causing multiple parse trees), and at the semantic analysis phase (quantifier scoping problems, for example).

					Early convergence
					: Apply as much restrictions as available, early in the process. At all stages, pick only a single interpretation.
					Late convergence
					: Keep all interpretations open. Pick the interpretation that gives the \'best\' result in the end. Score results.

				',
			),
			self::INTEGRATED_KNOWLEDGE_BASE => array(
				'name' => 'Integrated knowledge base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_STRUCTURE),
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
			),
			self::META_SELF => array(
				'name' => 'Answers questions about the Knowledge Base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					This is the basic function of a Natural Language Interface: to answer questions about a knowledge base.
				',
			),
			self::META_GOAL_MODEL => array(
				'name' => 'Answers questions about the Goal Model',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					The user may ask the system about the means and motives of the system (how and why).

					## Example from SHRDLU:
					User: When did you pick it up?
					SHRDLU: While I was stacking up the red cube, a large red block and a large green cube.
					User: Why?
					SHRDLU: To get rid of it.
				',
			),
			self::META_KB => array(
				'name' => 'Answers questions about the Domain Model',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					The user may ask the system about the structure of the knowledge base, which is stored in the Domain Model.
				',
			),
			self::NEW_WORDS => array(
				'name' => 'The user may teach the system',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					The user may teach the system about new words or concepts from within the dialog.

					An example user sentence: Call the biggest block "superblock" (SHRDLU)
				',
			),
			self::IMPERATIVE => array(
				'name' => 'Act on user input',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					The user may tell the system to actually do things, other than answer questions.

					## Example from SHRDLU:
					User: Pick up a big red block.
				',
			),
			self::IDIOMS => array(
				'name' => 'Handle idioms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DIALOG),
				'desc' => '
					The user may use expressions whose meaning cannot be analyzed, and need to be taken as-is.

					## Example from SHRDLU:
					User: Thank you.
					SHRDLU: You\'re welcome

					## Classic idiom example from ThoughtTreasure:
					User: Peter kicked the bucket.
					ThoughtTreasure structure: [died Peter]
				',
			),
			self::QUESTION_TYPES => array(
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
				'tags' => array(self::TAG_DIALOG),
				'desc' => '',
			),
			self::TOKENIZATION_HEADER => array(
				'name' => 'Tokenization header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '',
			),
			self::DICTIONARY_LOOKUP => array(
				'name' => 'Lexicon lookup',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					Uses (among others) a lexicon to recognize tokens in a sentence.

					Especially useful for compound nouns, like \'distance learning\' that cannot be recognized by using space as a delimiter alone.

					The lexicon may also provide the part-of-speech of the word, i.e. noun, verb, preposition, to be used in the parsing process.
				',
			),
			self::MORPHOLOGICAL_ANALYSIS => array(
				'name' => 'Morphological analysis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					Removes the prefixes and suffixes of a word to find the root form (present in the lexicon)

					For example: larger => large; finding => find; unable => able
				',
			),
			self::SPELLING_CORRECTION => array(
				'name' => 'Spelling correction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
					## Example from RENDEZVOUS:
					User: Give me their locatio also
					RENDEZVOUS: Is the word \'locatio\' intended to be: location? (yes or no)
					User: yes
				',
			),
			self::OPEN_ENDED_TOKEN_RECOGNITION => array(
				'name' => 'Open-ended token recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
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
			),
			self::PROPER_NAMES_FROM_KB => array(
				'name' => 'Proper names lookup in knowledge base',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					When a word is not present in the lexicon, the Knowlege Base is queried to find if the word is present as a proper name.
				',
			),
			self::PROPER_NAMES_BY_MATCHING => array(
				'name' => 'Proper names by matching',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					Proper names are recognized by fitting them into a pattern.

					For example: [A-Z][a-z]* van der [A-Z][a-z]*
				',
			),
			self::QUOTED_STRING_RECOGNITION => array(
				'name' => 'Quoted string recognition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					Recognizes quoted sentences as part of a sentence.

					For example: Who said "Gravitation is not responsible for people falling in love"?

					# Examples from ThoughtTreasure
					* le film "Horizons lointains"
					* une chanson, "I will always love you"
					* the "Dangerous" album
					* What does (the word) "stupid" mean?
				',
			),
			self::POS_TAGGER => array(
				'name' => 'Uses a part-of-speech tagger',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_TOKENIZATION),
				'desc' => '
					An off-the-shelf part-of-speech tagger is used to determine the parts-of-speech of the words in a sentence.
				',
			),
			self::GRAMMAR_TYPE => array(
				'name' => 'Grammar type',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_GRAMMAR),
				'desc' => '
				',
			),
			self::NATURAL_LANGUAGES => array(
				'name' => 'Natural language',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'English' => 'English',
					'French' => 'French',
				),
				'tags' => array(self::TAG_GRAMMAR),
				'desc' => '
					Which natural languages are supported by this system? The majority of systems just supports English.
				',
			),
			self::SENTENCE_TYPES => array(
				'name' => 'Sentence types',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'question' => 'Question',
				    'declarative' => 'Declarative',
				    'imperative' => 'Imperative',
				),
				'tags' => array(self::TAG_GRAMMAR),
				'desc' => '
				',
			),
			self::PHRASE_TYPES => array(
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
				'tags' => array(self::TAG_GRAMMAR),
				'desc' => '
					## Clauses as objects; example from SHRDLU:
					User: Find a block which is taller than the one I told you to pick up.<br>
					"you to pick up" is a clause that is treated as an object (Winograd)
				',
			),
			self::ELLIPSIS => array(
				'name' => 'Ellipsis',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GRAMMAR),
				'desc' => '
				',
			),
			self::PARSE_HEADER => array(
				'name' => 'Parse header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_PARSING),
			),
			self::ACCEPT_UNGRAMMATICAL_SENTENCES => array(
				'name' => 'Accept ungrammatical sentences',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_PARSING),
				'desc' => '
					Sentences that do not follow the system\'s grammar are not discarded off hand.
					The system will make an effort to understand them and / or to make the user change them.
				',
			),
			self::PARSER_TYPE => array(
				'name' => 'Parser type',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_PARSING),
				'desc' => '
				',
			),
			self::SYNTACTIC_FORM_TYPE => array(
				'name' => 'Syntactic form type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'parse trees' => 'Parse trees',
				),
				'tags' => array(self::TAG_PARSING),
				'desc' => '
				',
			),
			self::APPLY_SELECTIONAL_RESTRICTIONS => array(
				'name' => 'Apply selectional restrictions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_PARSING),
				'desc' => '
					The parser excludes sentences that violate (semantic) selectional restrictions that the verb (predicate)
					imposes on its arguments.

					For example, this the sentence "Sam drank a car" will not parse if the verb "drink" imposes the class "liquid"
					on its object.
				',
			),
			self::INTERPRET_HEADER => array(
				'name' => 'Interpreter header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
			),
			self::SEMANTIC_ANALYSIS_PARSING => array(
				'name' => 'Analyse while parsing',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					Semantic analysis takes place as part of the parsing process.

					The alternative would be that semantic analysis only takes places after parsing is complete.

					The semantic structures created for different parts of the parse tree may conflict, and when they do,
						this path is abandoned. This helps to cut down the number of possible parse trees.
				',
			),
			self::SEMANTIC_ATTACHMENT => array(
				'name' => 'Semantic attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					Meaning structures are taken from the lexicon entries of the matched words and attached to them in the parse tree.
				',
			),
			self::SEMANTIC_COMPOSITION => array(
				'name' => 'Semantic composition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					The meaning structure of a phrase, and the sentence as a whole is derived by composing the meaning of the words.
				',
			),
			self::MORPHOLOGICAL_SEMANTIC_COMPOSITION => array(
				'name' => 'Morphological semantic composition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					Compose the meaning of morphologically compound words by combining the meaning of the morphemes.

					# Example from SHRDLU:
					Words like \'littlest\' are not in the dictionary but are interpreted from the root forms
					like \'little\'. (Winograd)
				',
			),
			self::SEMANTIC_USE_LEXICON => array(
				'name' => 'Use lexicon',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					The system may use these attributes from a word in the lexicon for semantic analysis:

					* Semantic definition: a semantic form representation of the meaning of a word.
					* Grammatical relations: for verbs, the presence and position of the object and indirect object in the semantic form.
					* Semantic selectional restrictions: interpretations may be discarded if these restrictions don\'t match.
					* Phrasal verbs: in a word group like "Abe looks after Bob" "looks after" is turned into a single predicate with Bob as the object
					* Idioms: "X kicks the bucket" may be interpreted as "die(X)" in this phase
				',
			),
			self::MODIFIER_ATTACHMENT => array(
				'name' => 'Modifier attachment',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					The problem is to identify the constituent to which each modifier has to be attached.

					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction

					# An example from SHRDLU:
					Put the blue pyramid on the block in the box.
				',
			),
			self::CONJUNCTION_DISJUNCTION => array(
				'name' => 'Proper interpretation of conjunction and disjunction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
				',
			),
			self::NOMINAL_COMPOUNDS => array(
				'name' => 'Nominal compounds',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					An attempt is made to derive the meaning of compounds that are not in de lexicon.
				',
			),
			self::SEMANTIC_COMPOSITION_TYPE => array(
				'name' => 'Semantic composition type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'unification' => 'Unification',
					'production rules' => 'Production rules',
					'lambda calculus' => 'Lambda calculus',
					'custom' => 'Custom procedures',
				),
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					Semantic composition is the process of building the meaning of a sentence from the meanings of
					the phrases and eventually, the words.

					Unification
					: .
					Production rules
					: A pattern -> action rule that maps a syntax tree sub-structure to its semantic form.
					Lambda calculus
					: /.
					Custom procedures
					: Custom pieces of code act on the contents of parse tree nodes and attach semantic structures to them. Very flexible but can only be extended by a programmer with detailed knowledge of the system.

					# An example production rule from LUNAR:
					~~~
					[ S:CONTAIN
						(S.NP (MEM I SAMPLE))
						(S.V (OR (EQU 1 HAVE)
							     (EQU 1 CONTAIN))
							 (S.OBJ (MEM 1 (ELEMENT OXIDE ISOTOPE)))
						->(QUOTE (CONTAIN (# 1 1) ( # 3 1))) ]
					~~~
					S:CONTAIN is the name of the rule. The action follows the -> mark.
				',
			),
			self::SEMANTIC_CONFLICT_DETECTION => array(
				'name' => 'Semantic conflict detection',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
					The system detects conflicts in semantic structure information.
					For example: How many corners has a ball?
				',
			),
			self::QUANTIFIER_SCOPING => array(
				'name' => 'Quantifier scoping',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
				',
			),
			self::ANAPHORA_RESOLUTION => array(
				'name' => 'Anaphora resolution',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_ANALYSIS),
				'desc' => '
				',
			),
			self::PLAUSIBILITY_RESOLUTION => array(
				'name' => 'Plausibility resolution',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_COMMONSENSE),
				'desc' => '
					Determine if the semantic interpretation thus far is plausible with respect to the context.
				',
			),
			self::INTERPRET_SPEECH_ACT => array(
				'name' => 'Interpret speech act',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_COMMONSENSE),
				'desc' => '
					In general:<br>
					A sentence that starts with a question word is a question.
					A sentence without a subject is an imperative.

					But this system is also capable of correctly interpreting some of the sentences like this:
					Can you tell me where I can find Chinese food? (not a yes/no question)
				',
			),
			self::COMMONSENSE_TYPES => array(
				'name' => 'Commonsense types',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'q&a' => 'Question answering',
					'emotions' => 'Emotions',
					'personal relations' => 'Personal relations',
					'space' => 'Space',
					'time' => 'Time',
				),
				'tags' => array(self::TAG_COMMONSENSE),
				'desc' => '
					This system uses knowledge that people find "commonsense".

					Question Answering
					: Rules and procedures designed to answer different types of questions in a cooperative manner.
					Emotions
					: "A set of emotions is maintained for each actor in the context, and the weights of those emotions are decayed over time." (ThoughtTreasure)
					Personal relations
					: Inference rules that update the attitudes between two persons (friendship, animosity)
					Space, Time
					: Update the deictic center of the discourse model

					ThoughtTreasure has many more of these commonsense collections, aptly called "understanding agents": for sleep, weather, showering, appointments, trade, occupation, analogy.
					The user can provide an ASCII representation (called a grid) of the contents of a space (i.e. a room) to inform the system of the location of things.

					## Example of space based commonsense from ThoughtTreasure:
					User: Jeanne Püchle was where?
					ThoughtTreasure: She was in the corner grocery.
					User: She was near what electronic devices?
					ThoughtTreasure: She was near the cash register.
				',
			),
			self::SEMANTIC_FORM_TYPE => array(
				'name' => 'Semantic form type',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'relational' => 'Relational',
					'list-based' => 'List based',
					'goal-based' => 'Goal based',
					'fopl-based' => 'First order Predicate Logic',
				),
				'tags' => array(self::TAG_SEMANTIC_FORM),
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
			),
			self::SEMANTIC_FORM_DESC => array(
				'name' => 'Semantic form description',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_SEMANTIC_FORM),
				'desc' => '
				',
			),
			self::EVENT_BASED => array(
				'name' => 'Event based',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_FORM),
				'desc' => '
				',
			),
			self::TEMPORAL => array(
				'name' => 'Temporal',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_FORM),
				'desc' => '
				',
			),
			self::PROPER_NOUN_CONSTANTS => array(
				'name' => 'Uses constants for proper nouns',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_SEMANTIC_FORM),
				'desc' => '
				',
			),
			self::ONTOLOGY_USED => array(
				'name' => 'Uses an ontology',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					An ontology is an explicit description of the types, attributes, and relations of a domain.

					See [Wikipedia](https://en.wikipedia.org/wiki/Ontology_%28information_science%29)
				',
			),
			self::STANDARD_ONTOLOGY => array(
				'name' => 'Standard ontology',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
				',
			),
			self::GRADABLE_ADJECTIVES => array(
				'name' => 'Gradable adjectives',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					The ontology uses weights to express the measure of adjectives.

					# From ThoughtTreasure
					A weight is a value from -1.0 to +1.0. If a weight is not provided, it is assumed to be 0.55.

					## Examples
					[hot A]: A is hot
					[hot A 1.0]: A is extremely hot
					[hot A 0.2]: A is slightly hot
					[hot A -0.55]: A is cold
					[hot A -0.7]: A is very cold
				',
			),
			self::DEDUCTION_RULES => array(
				'name' => 'Deduction rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					IF/THEN inference rules to deduce facts from other facts.
				',
			),
			self::PLANS => array(
				'name' => 'A plan library',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					A set of plans needed to reach certain goals.
					A plan consists of a goal and a set of actions, or lower level plans.
				',
			),
			self::PROCEDURES_FOR_SHOW_MANIPULATE => array(
				'name' => 'Procedures for representing and manipulation',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					A set of custom procedures to represent the state of the knowledge base other than through language.

					Also, a set of procedures to manipulate data or physical objects.

					These procedures are accessible through natural language interaction.
				',
			),
			self::GOAL_CREATION_RULES => array(
				'name' => 'Goal creation rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DOMAIN_MODEL),
				'desc' => '
					A set of IF/THEN rules that specify under which Knowledge Base conditions a goal is created and added to the Goal Model.
				',
			),
			self::CONVERT_HEADER => array(
				'name' => 'Convert header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_CONVERSION_TO_KB),
			),
			self::SYNTACTIC_REWRITE => array(
				'name' => 'Syntactic rewrites',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_CONVERSION_TO_KB),
				'desc' => '
					Rewrite the generic semantic form to a domain specific semantic form used in a specific domain.
				',
			),
			self::OPTIMIZE_QUERY => array(
				'name' => 'Optimize query',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_CONVERSION_TO_KB),
				'desc' => '
					The raw knowledge base query is rewritten for reasons of processing speed.
				',
			),
			self::RESTRUCTURE_INFORMATION => array(
				'name' => 'Restructure information',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_CONVERSION_TO_KB),
				'desc' => '
				',
			),
			self::KNOWLEDGE_BASE_LANGUAGES => array(
				'name' => 'Knowledge base languages',
				'type' => self::FEATURETYPE_TEXT_MULTIPLE,
				'tags' => array(self::TAG_KB_FORM),
				'desc' => '
				',
			),
			self::KNOWLEDGE_BASE_AGGREGATION => array(
				'name' => 'Handle aggregations',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_KB_FORM),
				'desc' => '
				',
			),
			self::EXECUTE_HEADER => array(
				'name' => 'Execute header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_EXECUTION),
			),
			self::MULTI_DB => array(
				'name' => 'Queries multiple knowledge bases for single request',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_EXECUTION),
				'desc' => '
					The system queries multiple knowledge bases for the same sentence, and integrates the results.
				',
			),
			self::LOGICAL_REASONING => array(
				'name' => 'Logical reasoning',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_EXECUTION),
				'desc' => '
					The knowledge base itself contains inference rules that allow facts to be deduced from other facts.
				',
			),
			self::GOAL_CREATION => array(
				'name' => 'Goal creation',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_PLANNING),
				'desc' => '
					When a certain state in the Knowledge Base triggers a goal creation rule from the domain model,
					a goal is created and placed in the Goal Model.
				',
			),
			self::PLAN_EXECUTION => array(
				'name' => 'Plan execution',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_PLANNING),
				'desc' => '
					When a goal is active in the Goal Model, the system will find plans and actions that are geared towards fulfillment of the goal.

					An action may be implemented by a custom procedure, or it may be a question asking the user for more information.
				',
			),
			self::PROCESS_FEEDBACK => array(
				'name' => 'Process feedback',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_PLANNING),
				'desc' => '
					Interpret the response of the user in the context of an active plan.

					For instance, when the user says "Yes" this may answer an active question by the system.
				',
			),
			self::GENERATE_HEADER => array(
				'name' => 'Generate header',
				'type' => self::FEATURETYPE_TEXT_SINGLE,
				'tags' => array(self::TAG_ANSWER),
			),
			self::COOPERATIVE_RESPONSES => array(
				'name' => 'Cooperative responses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
					The system goes beyond literally answering the question,
					it answers in a way that actually helps the user.

					## Example from SHRDLU:
					User: Is it supported?
					SHRDLU: Yes, by the table
				',
			),
			self::PARAPHRASE_QUERY => array(
				'name' => 'Paraphrase knowledge base query',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
				',
			),
			self::CANNED_RESPONSES => array(
				'name' => 'Canned responses',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
					The system shows a fixed piece of text as a response to a question.

					## Example from SHRDLU:
					User: Stack up two pyramids
					SHRDLU: I can\'t.

					## Example from ThoughtTreasure:
					User: How are you?
					ThoughtTreasure: Very well, thank you.
				',
			),
			self::PATTERNED_RESPONSES => array(
				'name' => 'Simple responses with variables',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
					The system shows simple pieces of text, with some variables, as a response.

					## Example from SHRDLU:
					User: How many blocks are not in the box?
					SHRDLU: Four of them
				',
			),
			self::GENERATE_FULL_RESPONSE => array(
				'name' => 'Generate full response',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
				'desc' => '
					## Example from ThoughtTreasure:
					User: List my appointments.
					ThoughtTreasure: You have an appointment with Ruth Northville at the Four Seasons in one hour. You have an appointment with Amy Newton on Thursday March 21, 1996 at eight pm.
				',
			),
			self::DIALOG => array(
				'name' => 'Clarification dialog to improve input sentence',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_ANSWER),
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
			),
			self::SYNTACTIC_FEATURES => array(
				'name' => 'Syntactic features',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					A lexical entry has information syntactic features.

					part-of-speech
					: the syntactic category (e.g. work: part-of-speech = verb)
					number
					: singular or plural (e.g. birds: number = plural)
				',
			),
			self::SEMANTIC_DEFINITION => array(
				'name' => 'Semantic definition',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					A lexical entry has a definition of the meaning of the word.

					This usually includes a predicate.
				',
			),
			self::SEMANTIC_FORM_PROPERTIES => array(
				'name' => 'Semantic form properties',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					The semantic form of a lexical entry has specific properties, other than just a predicate.

					Examples from ThoughtTreasure:

					Type of relation
					: Is the relation one-to-one, one-to-many, or many-to-many? This property is used in generation to determine if an expression is "the president of the US" or "a president of the US".
					Fuzzy value
					: For the predicate "like-human", the word "like" has a fuzzy value in the range of 0.5 - 0.8, while "love" has a value of 0.8 to infinite.

				',
			),
			self::ONLY_IRREGULAR_FORMS => array(
				'name' => 'Only irregular forms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					The lexicon stores only irregular forms of verbs, like \'geese\' and \'slept\'.
					The regular morphological compound forms are derived by applying rules.
				',
			),
			self::GRAMMATICAL_RELATIONS => array(
				'name' => 'Grammatical relations',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					The lexicon codes which grammatical relations (like subject, object, and indirect object) a verb has.

					intransitive
					: A verb with only a subject
					mono-transitive
					: A verb with a subject and an object
					ditransitive
					: A verb with a subject, an object and an indirect object

					Coded grammatical relations help restrict the number of possible parse trees.

					Note that verbs may have multiple "frames". For example: "That man eats" (intransitive) and "He eats apples" (mono-transitive).

					[Grammatical relation - Wikipedia](https://en.wikipedia.org/wiki/Grammatical_relation)
				',
			),
			self::SEMANTIC_SELECTIONAL_RESTRICTIONS => array(
				'name' => 'Semantic selectional restrictions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					Also called "S-selection". The lexicon stores semantic constraints for each argument of a verb.

					For example, the verb may contain these restrictions:
					* subject: instance of living organism
					* object: instance of a liquid

					[Selection (linguistics) - Wikipedia](https://en.wikipedia.org/wiki/Selection_%28linguistics%29)
				',
			),
			self::CATEGORY_SELECTIONAL_RESTRICTIONS => array(
				'name' => 'Category selectional restrictions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					Also called "C-selection". The lexicon stores syntactical constraints for each argument of a verb.

					For instance the lexicon may specify that an argument may not be just a noun phrase ("John talks to Peter"),
					but also a subordinate clause ("John tells Peter to go").

					[Selection (linguistics) - Wikipedia](https://en.wikipedia.org/wiki/Selection_%28linguistics%29)
				',
			),
			self::LEXICON_IDIOMS => array(
				'name' => 'Idioms',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					The prototypical example of an idiom is "kick the bucket". It means: to die.

					Such an idiom may be stored in the lexicon. Note that its structure must be stored, not just the surface form,
					since variants are also possible. E.g. "Our dog kicked the bucket."

					[Idiom - Wikipedia](http://en.wikipedia.org/wiki/Idiom)
				',
			),
			self::PHRASAL_VERBS => array(
				'name' => 'Phrasal verbs',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					The lexicon stores the structure of phrasal verbs.

					There are three types of phrasal verbs:
					prepositional phrasal verbs
					: verb + preposition. Ex: "Who is looking after the kids?"
					particle phrasal verbs
					: verb + particle. Ex: "They brought that up twice."
					particle-prepositional phrasal verbs
					: Verb + particle + preposition. Ex: "Who can put up with that?"

					Explicit use of phrasal verbs helps restrict the number of possible parse trees.
					Also, it distinguishes between syntactically similar but semantically different verbs like "look" and "look after",
					and produces different semantic concepts ("look", "look-after").

					[Phrasal verb - Wikipedia](http://en.wikipedia.org/wiki/Phrasal_verb)
				',
			),
			self::LEXICON_ROLES => array(
				'name' => 'Roles',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEXICON),
				'desc' => '
					Examples of roles are "president-of", "mother-of", "nationality-of", "friend-of".

					ThoughtTreasure stores these relations in the lexicon as surface form / semantic form.
				',
			),
			self::DEICTIC_CENTER => array(
				'name' => 'Deictic center',
				'type' => self::FEATURETYPE_MULTIPLE_CHOICE,
				'options' => array(
					'person' => 'Person',
					'time' => 'Time',
					'space' => 'Space',
				),
				'tags' => array(self::TAG_DISCOURSE_MODEL),
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
			),
			self::TRACK_PLANS => array(
				'name' => 'Keep track of active plans',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_DISCOURSE_MODEL),
				'desc' => '
					The system needs to remember what plans it is currently working on.
				',
			),
			self::LEARN_NAMES => array(
				'name' => 'Learn new names',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					The user may teach the system new names for things.

					## Example from SHRDLU:
					User: Call the biggest block "superblock"
					User: Have you picked up superblock since we began?
					SHRDLU: YES.

					# ThoughtTreasure
					If the name text agent encounters an unknown word in a context where it is likely to be a name,
					such as after a first name, if it has a prefix or suffix  commonly used in names, it learns the new name.
				',
			),
			self::LEARN_WORDS => array(
				'name' => 'Learn new words by telling',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					The user may explain to the system what a words means.

					## Example from SHRDLU:
					User: A "steeple" is a stack which contains two green cubes and a pyramid
					User: Are there any steeples now?
					SHRDLU: NO.
				',
			),
			self::LEARN_WORDS_BY_DEDUCTION => array(
				'name' => 'Learn new words by deduction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					The system may deduce the meaning of new words using derivation rules.

					## Example from ThoughtTreasure:
					User: What is a xylophonephile?
					ThoughtTreasure: A xylophonephile is a type of human. Xylophonephiles like xylophones.
				',
			),
			self::LEARN_FACTS => array(
				'name' => 'Learn new facts',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					The user may tell the system about a new fact for the knowledge base.

					## Example from SHRDLU:
					User: The blue block is mine.
					User: Do I own anything in the box?
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.

					## Example from ThoughtTreasure:
					User: In 1994, Kimba became chair of Sony.
					ThoughtTreasure: (learns @1994:na|[chair-of Sony Kimba])
				',
			),
			self::LEARN_RULES => array(
				'name' => 'Learn new rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					The user may tell the system about rules that apply to the knowledge base.

					## Example from SHRDLU:
					User: I own blocks which are not red, but I don\'t own anything which supports a pyramid.
					User: Do I own anything in the box?
					SHRDLU: YES. TWO THINGS: THE BLUE BLOCK AND THE BLUE PYRAMID.
				',
			),
			self::REFUSE_TO_ACCEPT => array(
				'name' => 'Refuse to accept',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_LEARNING),
				'desc' => '
					Based on a contradiction with a known fact, the system refuses to accept what the user tells him.

					## Example from SHRDLU:
					User: There were five blocks to the left of the box then.
					SHRDLU: No, only four of them: the red cube, two large green cubes and a large red block
				',
			),
			self::USE_TRANSFORMATION_RULES => array(
				'name' => 'Using transformation rules',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GENERATION),
				'desc' => '
					When generating a linguistic response (a sentence) based on a found answer (a semantic representation), transformation rules are used to create responses that do not sound rigid.

					# Examples from ThoughtTreasure
					* a friend of you => your friend
					* is not => isn\'t
					* le arbre => l\'arbre
				',
			),
			self::GENERATE_PRONOUNS => array(
				'name' => 'Generate pronouns',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GENERATION),
				'desc' => '
					In the linguistic response, nouns that are part of the active context are replaced by pronouns (I, he, it).
				',
			),
			self::GENERATE_ARTICLES => array(
				'name' => 'Generate articles',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GENERATION),
				'desc' => '
					In the linguistic response, nouns will need a proper article.

					# Examples from ThoughtTreasure
					* Elephants are smart (empty article)
					* An elephant is a mammal (indefinite article)
					* The elephant (definite article)
				',
			),
			self::GENERATE_ASPECT => array(
				'name' => 'Generate aspects',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GENERATION),
				'desc' => '
					In the linguistic response, verbs will need to be expressed according to the correct aspect.

					[Aspect - Wikipedia](https://en.wikipedia.org/wiki/Grammatical_aspect)
				',
			),
			self::DEDUCTION => array(
				'name' => 'Deduction',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_INFERENCE),
				'desc' => '
					Deductive reasoning: reason from premises to conclusions.

					Apply the deduction rules from the Domain Model to reach factual statements that are not stored literally in the Knowledge Base.
				',
			),
			self::PROOF_BY_EXAMPLE => array(
				'name' => 'Proof by example',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_INFERENCE),
				'desc' => '
					Conclude that something is possible from the existence of at least a single instance.

					## Example from SHRDLU:
					User: can a pyramid be supported by a block?
					SHRDLU: YES.<br>
					The deductive system finds an actual example, so it knows this is possible. (Winograd)
				',
			),
			self::PROOF_BY_CUSTOM_PROCEDURE => array(
				'name' => 'Proof by custom procedure',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_INFERENCE),
				'desc' => '
					A custom procedure implemented in code decides whether a statement is true or false.

					# Example from ThoughtTreasure
					near(X, Y) is determined by invoking a space routine.
				',
			),
			self::INSTANTIATED_GOALS => array(
				'name' => 'Instantiated goals',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GOAL_MODEL),
				'desc' => '
					Goals, plans and actions. Goals are taken from the Domain Model and instantiated with data from the user query.

					The plans are also taken from the Domain Model, and bound to variables from the goal.

					## From SHRDLU:
					User: Pick up a big red block.
					SHRDLU: OK<br>
					The system answers "OK" when it carries out a command. In order to pick up the red block,
					it had to clear it off by finding a space for the green one and moving the green one away. (Winograd)
				',
			),
			self::GOAL_HISTORY => array(
				'name' => 'History of goals, plans and actions',
				'type' => self::FEATURETYPE_BOOL,
				'tags' => array(self::TAG_GOAL_MODEL),
				'desc' => '
					In order to answer questions about its motives, the system needs to keep track of its goals and plans,
					and how they were connected.

					## Example from SHRDLU:
					User: Why did you do that?
					SHRDLU: To clear off the red cube
				',
			),
		);
	}
}
