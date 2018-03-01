Widgets
===============
2018-01-16



In an app, widgets are everywhere.
A widget is an element on a page.


Now to display a widget, we sometimes need to access data in a database, and process it.
So, it's not necessarily only a dumb thing.



In kamille, the conception of widgets led to three objects:


- Widget: this one is the original conception of the widget in kamille.
            It's object that can render itself.
            It contains the following methods:
            
```php
public function setVariables(array $variables);
public function setTemplate($templateName);
public function render();
```
            
            This object is deprecated and has been replaced by the ClawsWidget.
            
            
- ClawsWidget: this widget is the most currently used type of widget.
        The render method is decoupled.
        It requires a specific setup, but allows us to organize widget into template files.
        It's a good choice at an application level.
        
- ThemeWidget: this is the newest type of widget.
        This one also has a separate render method, and requires no setup.
        It's more adapted for the most volatile parts of your apps.
        Actually, you can totally use a ThemeWidget inside of a ClawsWidget's template.
        The ThemeWidgetRenderer renders a model, which is just a php array.
        The ThemeWidgetRenderer depends on the theme.
        The ThemeWidgetRendererInterface has the following methods:
                            
```php
public function setModel(array $model);
public function render();
```



