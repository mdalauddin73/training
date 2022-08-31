<!DOCTYPE html>
<html>
<head>
<title>Security</title>
</head>
<body>

<h3><span class='list'> Encryption and Hash functions </span></h3></br></br>

The MD5 and SHA are both what we call hash functions. Their purpose is to compute a fixed-size checksum, or a fingerprint of the input message. 
Cryptographic hashes must meet a number of requirements:

    <br>Must be reasonably fast
    <br>Must not allow to easily construct two different messages with the same hash value
    <br>Must not allow to easily modify an original message in a way that the hash value stays the same
    <br>Must not allow to deduce on the contents of the original message by looking at the hash value
<br><br>
However, note that the hash function always computes only a checksum but is not involved in encrypting the message itself. 
It is not possible to derive back the original message from the hash value - recall that MD5 produces a 128-bit result, 
regardless of how large the input is. There is no reverse process to transform the hash value back to the original message 
(nor should there be - see the requirements above).
<br><br>
So why do we use the hash functions in cryptography? The reason is that they allow us to verify very quickly and with high probability whether 
the message has been changed. If we compute a hash value and send it along with the message, the recipient can compute his own hash value and compare 
it to the received hash. If they don't match, the message must have been tampered with - in any case, it is not the original message anymore.
<br><br>
The 3DES and AES algorithms are ciphers, meaning that they transform the input plaintext into an encrypted data, or the ciphertext, 
using a parameter called the encryption key. Using the same key, these algorithms also allow you to derive the original plaintext back. 
So these are what we really call ciphers, and because they use the same key for both encryption and decryption, they are also called symmetric ciphers 
(the asymmetric cipher is, for example, RSA).
<br><br>
Encrypting: encryption transforms the plaintext into something that cannot be understood - something that doesn't have any meaning. 
Something unintelligible. You encrypt the message/plaintext by using an algorithm and a key. The output (the ciphertext) always depends on the key. 
The essential thing about encryption is that you can always recover the plaintext (if you know the key/password), and given a key/password you have 
only one plaintext. So you can think of encryption/decryption as a way to move back and forward between you plaintext and your cipher text (using a key).
Uses: Encryption is good if you say have a message to send to someone. You encrypt the message with a key and the recipient decrypts with the same 
(or maybe even a different) key to get back the original message.
<br><br>
Hashing: hashing turns something (usually a key or a password) into a (usually fixed length) string of characters. For example your hashing algorithm might 
always produce a string that is 8 bytes long. As with encryption you transform something intelligible into something unintelligible. One might call the product of the hashing the hash codes of the hash sums. One difference is that hashing two different messages might produce the same hash values. So you cannot decrypt something that you have hashed. But even though you can't decrypt a hashed value, it is (or it should) in general hard to make two messages that have the same hash value. Another difference is that hashing doesn't require a key.
Uses: One use of hashing is if you want to send someone a file. But you are afraid that someone else might intercept the file and change it. 
So a way that the recipient can make sure that it is the right file is if you post the hash value publicly. That way the recipient can compute 
the hash value of the file received and check that it matches the hash value.
<br><br>
Hashing is a one way function (well, a mapping). It's irreversible, you apply the secure hash algorithm and you cannot get the original string back. 
The most you can do is to generate what's called "a collision", that is, finding a different string that provides the same hash. Cryptographically secure 
hash algorithms are designed to prevent the occurrence of collisions. You can attack a secure hash by the use of a rainbow table, 
which you can counteract by applying a salt to the hash before storing it.
<br><br>
Encrypting is a proper (two way) function. It's reversible, you can decrypt the mangled string to get original string if you have the key.

The unsafe functionality it's referring to is that if you encrypt the passwords, your application has the key stored somewhere and an attacker who gets access 
to your database (and/or code) can get the original passwords by getting both the key and the encrypted text, whereas with a hash it's impossible.

People usually say that if a cracker owns your database or your code he doesn't need a password, thus the difference is moot. This is naïve, because you 
still have the duty to protect your users' passwords, mainly because most of them do use the same password over and over again, exposing them to a 
greater risk by leaking their passwords.


Hashing

sha512

Hashing serves the purpose of ensuring integrity, i.e. making it so that if something is changed you can know that it’s changed. Technically, hashing takes arbitrary input and produce a fixed-length string that has the following attributes:

    The same input will always produce the same output.
    Multiple disparate inputs should not produce the same output.
    It should not be possible to go from the output to the input.
    Any modification of a given input should result in drastic change to the hash.

Hashing is used in conjunction with authentication to produce strong evidence that a given message has not been modified. This is accomplished by taking a given input, hashing it, and then signing the hash with the sender’s private key.

When the recipient opens the message, they can then validate the signature of the hash with the sender’s public key and then hash the message themselves and compare it to the hash that was signed by the sender. If they match it is an unmodified message, sent by the correct person.

Examples: SHA-3, MD5 (Now obsolete), etc.


</body>
</html>