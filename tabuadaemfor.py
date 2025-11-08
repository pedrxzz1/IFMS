#!/USR/bin/env python3
"""
"""

__version__ = "0.1.0"
__author__ = "Pedro Henrique"
__license__ = "unlicense"

soma = 0
cont = 0

for c in range(1,7):
    num = int(input("Digite o {} valor:".format(c)))
    if num % 2 == 0:
        soma += num
        cont += 1
print("A soma foi {}, quantidade {}".format(soma, cont))
