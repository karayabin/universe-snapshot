Trimail template notation
==============================
2015-12-16




This is a notation to write an email template.
The email template contains at most the following elements:

- subject
- plain text
- html text


The first line is the subject, then there should be a blank line after
the subject to create a clear visual separation between the subject and the other elements.
 
What follows the subject is the plain text.
If you need an html text, use the following separator on its own line, then write your html contents:

---html---




Examples
-------------

### Example using only the subject and the plain text

(the use of {tags} has nothing to do with the trimail notation.)



```txt
Your password again...

Hi, you've requested your password for {website}.
If that's not you, just ignore this email.
If that's you, then your password is: {pass}



```

### Example using the subject, and both the plain and html texts


(the use of {tags} has nothing to do with the trimail notation.)



```txt
Your password again...


Hi, you've requested your password for {website}.
If that's not you, just ignore this email.
If that's you, then your password is: {pass}


---html---

Hi, you've requested your <b>password</b> for {website}.
If that's not you, just ignore this email.
If that's you, then your password is: {pass}



```


### Example using only the subject and the html text

(the use of {tags} has nothing to do with the trimail notation.)



```txt
Your password again...

---html---

Hi, you've requested your <b>password</b> for {website}.
If that's not you, just ignore this email.
If that's you, then your password is: {pass}



```

