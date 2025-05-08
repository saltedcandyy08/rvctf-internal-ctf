def deobfuscate(s):
    return ''.join([chr(ord(c) ^ 42) for c in s])[::-1]

secret = "WYMY_YuYAFuD_uMD@uGAQl~i|x"

print(f"FLAG: {deobfuscate(secret)}")
