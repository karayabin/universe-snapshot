<?php


namespace Models\ListSortBar;


use Models\Model\AbstractModel;


/**
 * List sort bar
 * ==============
 * 2017-08-03
 *
 *
 *
 * A list sort bar is generally on top of a list,
 * allowing the user to sort the list by different criterion.
 *
 * The different criterion are presented as a list called sortItems control (price, alphabetical, ...).
 * There is also a sortDir control allowing the user to change the sort direction (asc or desc).
 *
 *
 * This is a form.
 * How it's posted depends on the template implementation.
 *
 *
 *
 *
 * - nbItems: the number of items of the list
 * - nameSortItems: the html name of the sortItems control
 * - sortItems: array
 * ----- value: the html value of the item
 * ----- label: the label to display for the user
 * ----- selected: bool, whether or not this sort item should be selected (only one can be selected at a time)
 *
 * - nameSortDir: the html name of the sortDir control
 * - valueSortDirAsc: the html value for the sortDir control
 * - valueSortDirDesc: the html value for the sortDir control
 * - formTrail: a string to inject, which potentially contains hidden input helping
 * the controller trigger the appropriate response.
 * - selectedSortDirAsc: bool, whether or not this option should be selected (only one option should be selected at a time)
 * - selectedSortDirDesc: bool, whether or not this option should be selected (only one option should be selected at a time)
 * - formMethod: string, get|post
 *
 *
 *
 *
 */
class ListSortBarModel extends AbstractModel
{

}