PLM accepts both pictures and English statements as input and translates both into a common logical language. Then it determines whether the statement about the picture is true. It is composed of three subsystems: a parser, a formalizer and a predicate evaluator. The formalizer creates a first-order functional calculus expression like (∀X1)[ Cir(X1) → (∃X2)[ Cir(X2) & Bk(X2) & (X2 = X1) ] ]. The predicate evaluator tests the truth value of the expression against the predicate representation of the pictures in the input.

+ ! Uses first-order functional calculus to represent meaning
