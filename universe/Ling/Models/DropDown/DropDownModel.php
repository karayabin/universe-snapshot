<?php

namespace Ling\Models\DropDown;


use Ling\Models\Model\AbstractModel;


/**
 * A drop down is a button, and when we click on it, a drop down menu appears.
 * See the bootstrap doc for a concrete example: http://getbootstrap.com/components/#btn-dropdowns
 *
 *
 * All suggestions below needs to be redefine further by concrete renderers.
 *
 *
 * - text: the text of the button
 * - ?icon: an icon suggestion (like mail, fa fa-envelope, glyphicon glyphicon-plus)
 * - ?flavour: a flavour suggestion (like success, info, warning, link, ...)
 * - ?size: a size suggestion (like xs, default, lg, normal ...)
 * - items: an array of items, each item being one of the following:
 *
 *              - (string=divider), creates a visual divider
 *              - (array: an action link, see the actionLink model in this repository)
 *
 *
 *
 * Note that this class is only abstract for now, so users of this model need to create the array manually
 * or by their own mean.
 *
 *
 */
abstract class DropDownModel extends AbstractModel
{

}