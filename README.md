crypto_post
===========

Encrypt your http post request's body to protect your form variables from hackers. 

HOW IT WORKS
===========
crypto_post is a jquery library which use RSA encryption algorithm to encrypt data. Main idea is that hook each HTTP Post request via jquery on() method than encrypt POST data and remove all plain-text parameters. So hackers can not decrypt POST request parameter with Burp, Tamper Data or etc. Because private_key stores in SESSION.


USAGE
===========
You have to generate RSA keys on backend system. So, you must send public key to clients for crypto_post. Sample PHP implementation can be found under the "demo" folder. 