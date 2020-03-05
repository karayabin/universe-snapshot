Light_Crud events
===============
2019-11-28



The Light_Crud plugin provides [events](https://github.com/lingtalfi/Light/blob/master/personal/mydoc/pages/events.md)
based on the table and action (see conception notes for more info), with the following format:



- Light_Crud.on_$table_$action: triggered by the LightCrudService->execute method.
            The data is a [LightEvent](https://github.com/lingtalfi/Light/blob/master/doc/api/Ling/Light/Events/LightEvent.md)
            with the following variables:
                - table: string, the target table
                - action: string, the action to use (see conception notes for more info)
                - params: array, the params array passed to execute the request