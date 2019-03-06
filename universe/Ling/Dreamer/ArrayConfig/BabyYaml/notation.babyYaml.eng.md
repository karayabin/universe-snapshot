BabyYaml 
==========================
2015-10-04



General features
-----------
    
    # Auto cast
    name: pierre
    job: developer          
    age: 36                 # This will be an int
    weight: 40.3            # This will be a float
    male: true              # This will be true
    female: false           # This will be false
    robot: null             # This will be null
    
    # Arrays as block
    sports:                 # numerical array
        0: football
        1: basket
        3: tennis           # defining a custom key
    fruits:                 # numerical array, dash notation
        - apple             # 0: apple
        - cherry            # 1: cherry
    translations:           # associative array
        fra: /path/to/fra
        eng: /path/to/eng
    a:                      # recursive nesting support
        b:
            c: value
            
    # Inline arrays
    friends: [Alfred, Robin, Catwoman]              # numerical (aka sequence)
    vehicles: {car: Batmobile, plane: Batplane}     # associative (aka mapping)
            
    # Multi line support
    mailSignature: <
        This is my mail signature.
        Cheers.                           
    >                    
    
    

Deeper inside features
------------------    

    quotes:
    
    # a not properly quoted string is considered hybrid.     
    # hybrid strings are displayed as is.
    # dquotes: double quotes (") regular protection     
    # squotes: single quotes (') regular protection         
        - Joker's worst enemies           # hybrid:       Joker's worst enemies 
        - "Joker's worst enemies"         # dquotes:      Joker's worst enemies
        - 'Joker's worst enemies'         # hybrid:       'Joker's worst enemies'
        - '"'                             # squotes:      "
        - "'"                             # dquotes:      '        
        - \'                              # hybrid:       \'        
        - '"e'                            # squotes:      "e
        - "'e"                            # dquotes:      'e 
        - e"                              # hybrid:       e"
        - e'e                             # hybrid:       e'e 
        - e"e                             # hybrid:       e"e
        - e'                              # hybrid:       e'
        - "e"                             # dquotes:      e
        - 'e'                             # squotes:      e  
        - "e"e                            # hybrid:       "e"e
        - 'e'e                            # hybrid:       'e'e
        - "doo\"doo"                      # dquotes:      doo"doo
        - 'doo\'doo'                      # squotes:      doo'doo
        - doo\edoo                        # hybrid:       doo\edoo
        - "doo\edoo"                      # dquotes:      doo\edoo
        - 'doo\edoo'                      # squotes:      doo\edoo
        
    specialValues:
        false:   false            # the special php false value
        true:   true              # the special php true value
        null:   null              # the special php null value
        string1: "null"           # the string null
        empty:                    # this is actually an empty string, and not the null value
        
    comments:
    # comments start with a hash (#) preceded by a space
    # comments do not exist in the scope of an inline block structure like inline mapping or inline sequence
        
        8: e'e #this IS a comment
        7: e'e#this is not a comment
        10: e"e#this is not a comment
        11: e"e #this IS a comment
        
    nestedCrazyinlineStructures:
        
        22: [one, two, [three, {oui: yes, non: no, 0: [ 1, 2, 3 ] }, five]]
        23: ["one, two", ['th"ree', {oui: 'yes, n'on: no, 0: [ 1, 2, 3 ] }, five]]
        
    keys:
    
    # a key is has a lot in common with a value: it can be protected, or hybrid.        
    # 
    # The difference are:
    # - in order to include a literal the colon char (:), we need to protect the key (with quotes) 
    # - the special values true, null, false are interpreted as regular strings 
    #  
    #  
     
    
    
    
    I can use space, can't I?: 66        
    "A key with a colon : inside": 33        
    ': 44             # single quote as a key     
    ": 55             # double quote as a key
    null: 455         # the key is the string null
    false: 355        # the key is the string false
    true: 255         # the key is the string true
    : 77              # the key is the empty string
                
                
    # the whole array below contains only one entry in the end: 
    #  0: judo
    # that's because when an entry is parsed, it overwrites any previous entry with that same key             
    key overwriting: 
        0: boxing
        0: kendo
        0: judo 
        
            
    just for fun:
        0: boxing   
        1: kendo
        : judo              # this is empty => judo, it does not overwrite the 0: boxing                 
                
    just for fun (2):
        - banana
        - apple # comment
        13: pear        
        - ananas                # an interesting thing here: dash system uses php natural key naming convention, so at this point, the key is 14. We have 14: ananas     
        -                       # and here we have 15: empty string                  
        -                       # another interesting thing about dashes: it handles nesting like a regular key, the key of this array is 16 by the way.
            - ho            
            - hi


    



More about quotes
------------------------

For quotes, BabyYaml embraces the nomenclature described in [QuotesEscaping modes](https://github.com/lingtalfi/ConventionGuy/blob/master/convention.quotesEscapingModes.eng.md). 

BabyYaml considers two types of string:

- protected         (as defined in the quotes escaping nomenclature)
- hybrid            (any string that is not protected, basically)


To escape inner quotes, BabyYaml use the [simple backslash escape](https://github.com/lingtalfi/ConventionGuy/blob/master/convention.quotesEscapingModes.eng.md) mechanism.





More about special keys 
-----------------------------

In php, here is how special keys are converted in a regular array:

```php
a(['' => 45] ); // '' => 45
a([null => 45] ); // '' => 45
a([false => 45] ); // 0 => 45
a([true => 45] ); // 1 => 45
```

As we can see, there is nothing very interesting here.
That's why special values in keys are treated like simple strings in BabyYaml. 

Note: the a function comes from the [bigbang.php](https://github.com/lingtalfi/TheScientist/blob/master/bigbang/bigbang.php) script.



More about multi-line 
----------------------

When you use multi-line, you can imagine a left margin
that is used to strip off the leading indentation spaces.
In the following example I drew the imaginary margin to help visualizing: 
 
        |
        |
    mailSignature: <
        This is my mail signature.
        Cheers.                           
    >                    
        |
        |        
        
The resulting text will not contain the indentation spaces.
The text will be:

```
This is my mail signature.\nCheers     
```     

    
    
    
    