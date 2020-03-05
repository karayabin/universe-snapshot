Light CsrfSimple events
===============
2019-11-08



The Light_CsrfSimple plugin provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_CsrfSimple.on_csrf_token_regenerated: triggered by the LightCsrfSimpleService->generate method.
            The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md)
            with a **token** variable, which is an array containing:
                - new: the token value in the new slot
                - old: the token value in the old slot