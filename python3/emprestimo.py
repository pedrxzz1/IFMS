#!/usr/bin/env python3
"""Exercicios de condicionais
"""

__version__ = "x.x.x"
__author__ = "Pedro Henrique"
__license__ = "unlicense"

home = float(input("Diga o valor da casa?: "))

salario = float(input("Diga quanto voce recebe?: "))

financiamento =int(input("Quantos anos de financiamento? "))

prestacao = home / (financiamento * 12)

if prestacao > 1/3*salario:
    print("finaciamento negat")
else:
    print("Parabens, APROVED")
