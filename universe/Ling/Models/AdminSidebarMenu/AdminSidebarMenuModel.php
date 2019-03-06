<?php

namespace Ling\Models\AdminSidebarMenu;


use Ling\Models\Model\AbstractModel;


/**
 * The AdminSidebarMenu model is an array which contains the following:
 *
 * - sections:
 * ----- -
 * --------- label: string, the label of the section
 * --------- ?name: string, the name (identifier) of the section
 * --------- ?active: bool, whether or not this section contains an active item
 * --------- items: array, contains the section items
 * ------------- -
 * ----------------- label: string, the label of the item
 * ----------------- icon: string|null, a string representing the item icon, or null if there is no icon
 * ----------------- items: array|null, an array of children items, or null if there is no children
 * ----------------- ?link: string, a string used to generate the uri of the link
 * ----------------- ?badge: array representing a badge to put next to the label
 * --------------------- type: string(error|warning|info|success), the badge type
 * --------------------- text: string, the text of the badge
 * ----------------- ?name: string, the name (identifier) of the item
 * ----------------- ?active: bool, whether or not this item is active (matches the url)
 *
 *
 *
 *
 * Note: this class is just used to hold the comment above, there is actually no implementation as for now,
 * since it's a very simple array.
 *
 *
 *
 */
abstract class AdminSidebarMenuModel extends AbstractModel
{

}