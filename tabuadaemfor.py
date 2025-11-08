#!/USR/bin/env python3
"""
"""

__version__ = "0.1.0"
__author__ = "Pedro Henrique"
__license__ = "unlicense"

num = int(input("Digite seu numero:"))

for c in range(1,11):
    print("{} x {:2} = {}".format(num, c, num*c))
