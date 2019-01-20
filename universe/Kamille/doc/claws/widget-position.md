Claws widget position
=========================
2017-10-16



Claws provides a way to re-arrange the widgets positions.


Note: do not confound widget position with layout position.


This is done by assigning a widget position to a widget when you bind it to the claws object.


Here is the minimal syntax to bind a widget to the claws object, without position:


```php
$claws->setWidget ( $widgetId, ClawsWidget $clawsWidget )
```


Now to specify a position, you can use the third argument like so:

```php
$claws->setWidget ( $widgetId, ClawsWidget $clawsWidget, $widgetPosition )
```



Now the $widgetPosition uses a special notation, explained below:



widgetPosition syntax
=========================


- widgetPositionNotation: first|last|<afterWidget>|<beforeWidget>
- afterWidget: "after:" <widgetId>
- beforeWidget: "before:" <widgetId>
- widgetId: the widget identifier, as defined in [LAWS](https://github.com/lingtalfi/laws).
                
