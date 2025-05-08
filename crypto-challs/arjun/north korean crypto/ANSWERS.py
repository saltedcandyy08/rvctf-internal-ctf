# STEP 1: Obtain cipher list

with open("output.txt") as file:
    cipher = [int(x) for x in file.read().split("\n")]

# STEP 2: Use key and XOR decrypt

key = b"secrecy"

de_xor = ''.join(chr(c ^ key[i % len(key)]) for i, c in enumerate(cipher))

# STEP 3: Use subs table to do reverse substitution

subs_table = {
    'a': 'x', 'b': 'm', 'c': 'z', 'd': 'p', 'e': 'k',
    'f': 'l', 'g': 'a', 'h': 'r', 'i': 'n', 'j': 't',
    'k': 'w', 'l': 'e', 'm': 'o', 'n': 's', 'o': 'y',
    'p': 'h', 'q': 'u', 'r': 'g', 's': 'b', 't': 'q',
    'u': 'j', 'v': 'v', 'w': 'f', 'x': 'd', 'y': 'i',
    'z': 'c'
}

reverse_subs = {v: k for k, v in subs_table.items()}
flag = ''.join(reverse_subs.get(c, c) for c in de_xor.lower())

print(flag)
