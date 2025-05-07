# STEP 1: Write a Vigenere cipher decryption function

def vigenere_decrypt(ciphertext, key):
    key = key.lower()
    decrypted_message = []

    key_index = 0
    for char in ciphertext:
        if char.isalpha():
            shift = ord(key[key_index % len(key)]) - ord('a')
            decrypted_char = chr((ord(char.lower()) - ord('a') - shift) % 26 + ord('a'))
            decrypted_message.append(decrypted_char)
            key_index += 1
        else:
            decrypted_message.append(char)  # Non-alphabet characters remain unchanged

    return ''.join(decrypted_message)

# STEP 2: Decrypt the code using the key

ciphertext = "vhots{oro3d_tj3_v1ts3p_f0i3r}"
key = "emmanuelmacron"

print(vigenere_decrypt(ciphertext, key))
