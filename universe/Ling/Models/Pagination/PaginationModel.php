<?php


namespace Ling\Models\Pagination;


use Ling\Models\Model\AbstractModel;


/**
 *
 * A pagination is the widget, generally located at the top or the bottom of a list,
 * which allows the user to browse the different pages of a list.
 *
 *
 * - currentPage: int, this number is provided so that templates can implement their own logic if necessary
 * - items:
 * ----- (item)
 * --------- number: string|int, the number of the page
 * --------- link: string, the uri to the link
 * --------- selected: bool, whether or not the current item is selected. There can be only one item selected at once
 *
 *
 *
 */
class PaginationModel extends AbstractModel
{

}