URCTS
===========
2018-06-07





This is the MVC version, revisited with kamilleClaws.



URCTS actually represents the synopsis used to display a page with the kamille Claws system.
 
Each letter of this acronym represents a step.

The steps are the following:



- U: user, the user chooses the route 
- R: route, the route is provided by the modules, and it defines the controller 
- C: controller,
        The controller is also provided by a module.

        in standard Kamille, the controller's role is to return the appropriate response, which is a bit vague.
        In KamilleClaws, we are a little bit more precise about this definition:
            - it creates the variables to display (fetching the model)
            - it chooses the symbolic name of the template that will be used to display those variables
- T: theme, the chosen theme displays the content from the symbolic template.

        Technically, the theme doesn't have to be a module,
        but in practice, it will be a module to benefit from the powerful hooks provided by the kamille ecosystem.

        The theme has is responsible for:
            - choosing the assets of the page (js, css, including the choice of the front framework...)
        The theme can be thought as an extension (in the view side) of the controller.
        It has full powers, with the goal of rendering the html page (or portion of the page)
        using the variables passed to it.
- S: services, service is a layer accessible via ajax to the theme.

        Services are provided by modules as well.

        Themes use services to enhance the user experience.
        There are different types of services that we could categorize, although for now it doesn't have much importance:

            - services that fetch pure model data
                    for instance an autocomplete zipCode2CityList service that returns a json array
            - services that fetch html portion
                    for instance a bionic service that provides content to inject into the current html page
            - services that updates the model
                    for instance a toggle-active-inactive button that would allow to enable/disable
                    a comment awaiting for moderation in the backoffice
            - a mix of all above, and probably more types...




About symbolic template/layout naming
============================
In kamille the theme files reside in:

- /theme/$nameOfTheTheme/layouts (for the layouts)
- /theme/$nameOfTheTheme/widgets (for the widgets)


The path to the widget is up to the theme developer.
Personally, I started to explore this organization where my template names start with the name of the module
they come from.
So for instance I know that all my templates related to the Ekom module are in the Ekom directory.
Note: it doesn't mean they belong to Ekom, they still belong to the theme, but
they are classified under a directory labelled Ekom.

What about NullosAdmin? Ekom has a NullosAdmin counterpart, so would you do rather Ekom/NullosAdmin or NullosAdmin/Ekom.
I opted for NullosAdmin/Ekom, since NullosAdmin is a container for Ekom.










