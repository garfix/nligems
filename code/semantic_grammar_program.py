"""
incmplete code
"""

def process_relations(relations):
    for relation in relations:
        process_relation(relation)

def process_relation(relation):
    handlers = {
        'quant': quant,
        'red': red,
        'blue': blue,
        'block': block,
        'put_on': put_on
    }
    handler = handlers.get(relation.predicate, handler_not_found)
    handler(relation.arguments)

def quant(arguments):
    quantifier_var = arguments[0]
    quantifier_set = arguments[1]
    range_var = arguments[2]
    range_set = arguments[3]
    scope_set = arguments[4]

    range_ids = process_relations(range_set)
    for range_id in range_id:
        bound_scope_set = scope_set.bind(range_var.name, str(range_id))
        results = process_relations(scope_set)



def red(arguments):
    print arguments[0]

def blue(arguments):
    print arguments[0]

def block(arguments):
    print arguments[0]

def put_on(arguments):
    print arguments[0]


def handler_not_found(arguments):
     raise Exception('predicate could not be handled')
