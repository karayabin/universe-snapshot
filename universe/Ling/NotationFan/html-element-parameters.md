Html element parameters
==================
2019-09-18



This is an idea of how we can assign parameters to any html element, such as a span, a div, etc...


I know there's already an html spec on that (https://html.spec.whatwg.org/multipage/dom.html#dom-dataset), and it's used by jquery too with their data method (https://api.jquery.com/data/),
but I don't like it because it forces you to use camelCase, and I prefer a more flexible solution where you can use any case you like, such as the snake_case for instance.


So, here it is:

- the html element parameters (hep) is an associative array associated to an html element. As for now, it's just a one dimensional array (this might change if I need more).
- to add an entry to the **hep**, we add the following attribute: data-param-XXX="YYY", with XXX being the key of the entry, and YYY being the value of the entry




A javascript function that can help is:


```js
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
    });
    return attr;
}

```