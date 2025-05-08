# FOR KIM JONG UN'S EYES ONLY
# HAHA KIM IS SO SMART NO ONE CAN OUTSMART KIM
# KIM IS SO GOOD KIM SHOULD GET A BURGER

subs_table = {
    'a': 'x', 'b': 'm', 'c': 'z', 'd': 'p', 'e': 'k',
    'f': 'l', 'g': 'a', 'h': 'r', 'i': 'n', 'j': 't',
    'k': 'w', 'l': 'e', 'm': 'o', 'n': 's', 'o': 'y',
    'p': 'h', 'q': 'u', 'r': 'g', 's': 'b', 't': 'q',
    'u': 'j', 'v': 'v', 'w': 'f', 'x': 'd', 'y': 'i',
    'z': 'c'
}

key = b"secrecy"

def encrypt(msg):
    subbed = ''.join(subs_table.get(c, c) for c in msg.lower())

    return [ord(c) ^ key[i % len(key)] for i, c in enumerate(subbed)]
