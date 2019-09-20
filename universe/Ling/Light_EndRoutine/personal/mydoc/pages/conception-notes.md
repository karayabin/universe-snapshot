Light End Routine, conception notes
==========================
2019-09-19


Sometimes we need to clean things at the end of the page.


This plugin can be used to register endRoutine handlers.

An endRoutine handler can be seen as an php exit handler, but for the [Light](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Core/Light.md) object.


As for now, it will be called after the light response has been sent, and only for non-ajax calls (maybe later we will
need this functionality for ajax calls, but for now I don't see it coming).









