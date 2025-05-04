import os
from Crypto.Cipher import AES
from Crypto.Util.Padding import pad

flag = b'RVCTF{turns_out_you_can_brute_force_weak_AES_keys}'
key = os.urandom(1) * AES.block_size  # Weak key, 1-byte repeated

def encrypt(msg, key):
    iv = os.urandom(AES.block_size)
    cipher = AES.new(key, AES.MODE_CBC, iv)
    ciphertext = cipher.encrypt(pad(msg, AES.block_size))
    return (iv + ciphertext).hex()

print("Encrypted flag:", encrypt(flag, key))
