Light_Realform events
=============
2021-03-22



The Light_Realform plugin provides the following events:


- **Ling.Light_RealGenerator.on_realform_exception_caught**: this event is triggered from the service's handleFormSystemA method
    when a problem occurs with the rendering of the form.
    The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/Events/LightEvent.php) with an **exception** variable
    containing the caught exception instance.
        

