Realist tag transfer js - implementation notes
=======================
2019-08-19


Ok, time to implement this little baby.
The reference protocol for this tool is obviously 
the [realist tag transfer protocol](https://github.com/lingtalfi/Light_Realist/blob/master/doc/pages/realist-tag-transfer-protocol.md) (rtt),
and I'll assume we already know about this.




My little thoughts about this tool:


here are the concepts I use:


- emitter: an emitter is basically a unit which provides the necessary information for ONE tag item.
    It's called an emitter because of the metaphor where a man is standing in front of the sea,
    waiting for a signal, the man is the main js object, and the emitters emit signals so that main js object
    can collect them. 




The module
--------------

From the rtt protocol, we know that a module must provide those data:


```yaml
tags:
    - 0: 
        tag_id: the identifier of the tag that we want to activate 
        variables:
            - 0:
                name: the name of the variable
                value: (the value of the variable, can be either a scalar or a non scalar)
                control_id: an identifier representing the control who provided this variable
            - ...
        - ...(other properties if necessary)
    - ...
- ...(other properties, if we need them later)
```


The value of a variables can be scalar or array.

If it's an array, the composite values might be brought by multiple controls (as opposed to just one).

Therefore, the emitter is an html element which either is the holder of the variable data (in the
case of a scalar variable), or CONTAINS the controls that provide the variable data (in the case 
of a non-scalar variable).


The emitter has the following html attributes:

- class: rtt-emitter
- data-rtt-tag: the name of the tag ($tagId)
- ?data-rtt-extra-*: additional key/value pairs can be added with this tag.
                For instance if you want to add the my_key=my_value key/value pair,
                you set this attribute like this:
                
                - data-rtt-extra-my_key="my_value"
                
                The key/value pair(s) will be added next to the tag_id and variables properties
                in the "tags" array.
- ?data-rtt-active: string(true|false). The default implicit value is true.
            We can use this attribute to deactivate a tag, which information will then NOT be collected in
            the resulting "tags" array.
            This is generally used by other js tools who use the "realist tag transfer js" tool as a sub-service,
            so that they can write the rtt markup of tags in advance, and activate only the one that they
            want to use dynamically (for instance, the head columns sort or neck filters 
            with the open admin table helper tool).                 
                
                


A control holds the variable data, or part of it. It's either:

- an html control element 
- any html element, in which case the data-rtt-value is expected.


A control has the following html attributes:

- data-rtt-variable: the name of the variable 
- ?data-rtt-control: the id of the control. This is optional.
        If not passed, the main js tool will create one on the fly, by combining the 
        tag name with the variable name in a way that it decides (i.e. it might change).

- ?data-rtt-value: The value of the variable.
        This is generally used only with non html control elements. 
        
        Sometimes you want to set the variable value manually, instead of using
        the html control natural value.
        For instance this happened to me while creating an advanced form widget; each
        row is composed of a column, an operator and an operator value, and I knew the columns
        in advance: I didn't need to rely to an html control for that.
        So in that case I used this data-rtt-value attribute to set the column name manually.
        
        

The value of the variable is the value of the "data-rtt-value" attribute if set.
If your element is an html control element, the fallback value will be the 
natural value of the html control element.

Important note: for html control elements, the name is set automatically by this tool to the
value of the data-rtt-variable. So don't set the name, it's useless.









To create the variable, array, the module collector tool uses the following algorithm:

- if the emitter element IS ALSO the control element, then take the variable data from it, and it's a scalar value
- if the emitter element CONTAINS ONLY ONE control element, then take the variable data and it's a scalar value
- if the emitter element CONTAINS MORE THAN ONE control element, then take the variable data from all the control elements, and the data is non-scalar



 