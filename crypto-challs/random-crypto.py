from Crypto.Cipher import AES, PKCS1_OAEP
from Crypto.PublicKey import RSA
from Crypto.Util.Padding import pad
from Crypto.Random import get_random_bytes
import base64

def v8n_9q7m(_9o2g7w1e):
    g4a8z2l1 = get_random_bytes(16)
    b9j4z3f7 = AES.new(g4a8z2l1, AES.MODE_CBC)
    e7u8v9l5z5k = b9j4z3f7.encrypt(pad(_9o2g7w1e.encode(), AES.block_size))
    return g4a8z2l1, b9j4z3f7.iv + e7u8v9l5z5k

def j2v5n2m7(_5r8t9a2i7):
    i7w3z6a1 = RSA.generate(2048)
    p4r7h9t2 = i7w3z6a1.export_key()
    m2q9b6y = i7w3z6a1.publickey().export_key()
    a7e2i3n5 = PKCS1_OAEP.new(i7w3z6a1.publickey())
    return p4r7h9t2, base64.b64encode(a7e2i3n5.encrypt(_5r8t9a2i7))

def encrypt_flag(_9o2g7w1e):
    aes_key, aes_ciphertext = v8n_9q7m(_9o2g7w1e)
    rsa_private_key, encrypted_aes_key_iv = j2v5n2m7(aes_key + aes_ciphertext[:AES.block_size])
    return encrypted_aes_key_iv

## test and understand
x1w3q7b = "flag" # test flag
encrypted_flag = encrypt_flag(x1w3q7b)
print(encrypted_flag.decode())

## actual challenge with actual flag:
encrypted_flag = b'oaN0hMMmLl4j4BdyhEvzlgI32SiVISuyq3yUGSXacFuY8M3lcu7VC9+m7Zwk86+DjLyj9ApOocCJUsgeT3edIy7AfBJB3aKGS0LnE5I5v9OFTRr3pghmeT6ml1VlbPF3N4HMHwfK4jq3Iy5vkj0DKyKyu3n1HoZy5JzjcymhxdPiGKD2DTDXdYkqp8vQb9xAZKHB6rodLHt91N7w4YxVvYoJjdniWOWd/+jpF4Tle61DCpisOntStw6+St+JXLggKIjVff04qxx2ffNnQmTFYEFZku6dYujZGzdVISSrZ8CRHhhPkA1dVOusoyzYbpPX4kG0VdpYlfme+J6I5ipbxg=='
print(encrypted_flag.decode())
