#!/usr/bin/env python3
"""Exercicios de condicionais
"""

__version__ = "x.x.x"
__author__ = "Pedro Henrique"
__license__ = "unlicense"

s = 0

for c in range(0,10):
    n = int(input("Digite um numero: "))
    s += n
print("O somatorio da {}.".format(s))
