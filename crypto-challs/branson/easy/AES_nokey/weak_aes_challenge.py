import os
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad

flag = b'RVCTF{REDACTED}'
key = os.urandom(1) * AES.block_size  # Weak key, 1-byte repeated

def encrypt(msg, key):
    iv = os.urandom(AES.block_size)
    cipher = AES.new(key, AES.MODE_CBC, iv)
    ciphertext = cipher.encrypt(pad(msg, AES.block_size))
    return (iv + ciphertext).hex()

print("Encrypted flag:", encrypt(flag, key))

#Encrypted flag: d3c103b11b7dfd4fbc3cecd1521b339a9f11dbfae96bd1165e3365982e208d8f94f9f5fa4cb0fc22ef6426cf6017c5c8