#!/usr/bin/env python3
"""Exercicios de condicionais
"""

__version__ = "x.x.x"
__author__ = "Pedro Henrique"
__license__ = "unlicense"

name = input("Qual e o seu nome? ")

if name == "Pedro":
    print("Seu nome e INCRIVEL!!!")
elif name == "Gustavo" or name == "Maria":
    print("Seu nome e bem popular no Brasil. ")
else:
    print("Que bosta. ")

