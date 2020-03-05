Light_Kit events
==============
2019-11-07



The light kit plugin provides the following [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md):


- Light_Kit.on_page_conf_ready: triggered from the LightKitPageRenderer->renderPage method once the kit page 
        configuration has been processed (i.e. transformed), and before it's actually used by the widgets.
        Its data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) containing
        the **pageConf** variable.
        