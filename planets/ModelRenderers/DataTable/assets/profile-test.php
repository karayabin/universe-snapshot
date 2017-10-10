<?php


/**
 * This is a datatable profile.
 * It contains the information necessary to display a datatable aware
 * of user parameters.
 *
 *
 *
 */

$profile = [
    'rowsGenerator' => [
        'type' => 'array',
        'path' => '/myphp/kaminos/app/www/twitter.rows.php',
    ],
    'transformers' => [
        'action' => function ($oldValue, $columnId, array $row) {
            return [
                'type' => "link",
                'data' => [
                    'type' => 'modal',
                    'uri' => '/datatable-handler?type=special&id=test',
                    'confirm' => false,
                    'confirmText' => "Are you sure you want to execute this action?",
                    'icon' => "mail",
                    'label' => "Send a mail",
                ],
            ];
        }
    ],
    'model' => [
        'headers' => [
            "firstName" => "first Name",
            "lastName" => "last Name",
            "userName" => "user Name",
            "action" => "Action",
        ],
        'hidden' => ['lastName'],
        'ric' => ['firstName'],
        'checkboxes' => true,
        'isSearchable' => true,
        'unsearchable' => ['action'],
        'isSortable' => true,
        'unsortable' => ['action'],
        'showCountInfo' => true,
        'showNipp' => true,
        'nippItems' => [1, 2, 5, 10, 20, 50, 100, 'all'],
        'showQuickPage' => true,
        'showPagination' => true,
        'paginationNavigators' => ['first', 'prev', 'next', 'last'],
        'paginationLength' => 5,
        'showBulkActions' => true,
        'showEmptyBulkWarning' => true,
        'bulkActions' => [
            'deleteAll' => [
                'confirm' => false,
                'confirmText' => "Are you sure you want to execute this action?",
                'label' => "Delete items",
                'uri' => "/datatable-handler?type=bulk",
                'type' => "modal",
            ],
        ],
        'showActionButtons' => true,
        'actionButtons' => [
            'sendMail' => [
                'confirm' => false,
                'confirmText' => "Are you sure you want to execute this action?",
                'label' => "Send Mail",
                'useSelectedRows' => true,
                'uri' => "/datatable-handler?type=action",
                'type' => "refreshOnSuccess",
                'icon' => "mail",
            ],
        ],


        //--------------------------------------------
        // INITIAL SETTINGS
        // the user can override them
        //--------------------------------------------
        'page' => 1,
        'nipp' => 2,

        //--------------------------------------------
        // TEXT
        //--------------------------------------------
        'textNoResult' => 'No results found',
        'textSearch' => 'Search',
        'textSearchClear' => 'Clear',
        'textCountInfo' => 'Showing {offsetStart} to {offsetEnd} of {nbItems} entries',
        'textNipp' => 'Show {select} entries',
        'textNippAll' => 'all',
        'textQuickPage' => 'Page',
        'textQuickPageButton' => 'Go',
        'textBulkActionsTeaser' => 'For selected entries',
        'textEmptyBulkWarning' => 'Please select at least one row',
        'textUseSelectedRowsEmptyWarning' => 'Please select at least one row',
        'textPaginationFirst' => 'First',
        'textPaginationPrev' => 'Prev',
        'textPaginationNext' => 'Next',
        'textPaginationLast' => 'Last',
    ],
];