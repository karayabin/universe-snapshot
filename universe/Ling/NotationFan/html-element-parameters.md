Html element parameters
==================
2019-09-18



This is an idea of how we can assign parameters to any html element, such as a span, a div, etc...


I know there's already an html spec on that (https://html.spec.whatwg.org/multipage/dom.html#dom-dataset), and it's used by jquery too with their data method (https://api.jquery.com/data/),
but I don't like it because it forces you to use camelCase, and I prefer a more flexible solution where you can use any case you like, such as the snake_case for instance.


So, here it is:

- the html element parameters (hep) is an associative array associated to an html element. 
- to add an entry with scalar value to the **hep**, we add the following attribute: data-param-XXX="YYY", with XXX being the key of the entry, and YYY being the value of the entry
- to add an entry with non-scalar values, we use the following attribute: data-paramjson-XXX="JJJ", with XXX being the key of the entry, and JJJ being the json string.
        Remember that json strings are escaped with double-quotes only (i.e. not single quotes, and double quotes are NOT optional).
        
        
        
So for instance, considering the following html element:

```html
<div
    data-param-one="1"
    data-param-one-two="2"
    data-param-oneTwo="3"
    data-paramjson-arr='{"fruit": "apple", "color": "red"}'
></div>
```        

It would have the following hep parameters (using [BabyYaml](https://github.com/lingtalfi/BabyYaml) notation):

```yaml
one: 1
one-two: 2
oneTwo: 3
arr: 
    fruit: apple
    color: red
```





A javascript function that can help is:


```js



function startsWith(haystack, needle) {
    return haystack.substring(0, needle.length) === needle;
}


/**
 *
 * Returns the hep associative array.
 * https://github.com/lingtalfi/NotationFan/blob/master/html-element-parameters.md
 *
 */
function getElementParameters(jElement) {
    var attr = {};
    $.each(jElement.get(0).attributes, function (v, name) {
        name = name.nodeName || name.name;
        v = jElement.attr(name);
        if (startsWith(name, "data-param-")) {
            name = name.substr(11);
            attr[name] = v;
        }
        else if (startsWith(name, "data-paramjson-")) {
            name = name.substr(15);
            attr[name] = JSON.parse(v);
        }
    });
    return attr;
}

```