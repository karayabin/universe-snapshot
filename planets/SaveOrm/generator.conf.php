<?php


$conf = [
    /**
     * The base dir defines the directory where all generated objects will reside
     */
    'baseDir' => "/tmp/class/SaveOrm/Test",
    /**
     *
     */
    'baseNamespace' => "SaveOrm\Test",
    /**
     * Which database you want to launch the generator on.
     * - array of database names
     *
     * Note: if empty, nothing will be generated
     */
    'databases' => [
        'kamille',
    ],
    /**
     * Filter the tables that the generator visits.
     * If empty, the generator visits all tables of the given database.
     *
     * - array of database_name => tables
     *      With tables:
     *              - array of allowed tables (all other tables are excluded)
     *                      - the wildcard * can be used.
     *                              For instance, "ekev_*" yields all tables
     *                              starting with the ekev_ prefix.
     *
     *
     */
    'tables' => [
//        'kamille' => [
//            'ekev_*',
//            'ekev_course',
//        ],
    ],
    /**
     * The table prefixes be used for:
     * - creating clean class names (without prefix)
     * - creating clean class methods and properties to be used by the ObjectManager
     *
     */
    'tablePrefixes' => [
        'ecc_',
        'ekev_',
        'ekfs_',
        'ektra_',
        'ek_',
        'pei_',
    ],
    /**
     * used to broadly detect children relationships (see more about children relationship in the documentation)
     * It's an array of keywords that trigger the detection of the middle table in a children relationship.
     */
    'childrenDetectionKeywords' => [
        '_has_',
    ],
    /**
     * The algorithm for children tables detection will
     * sometimes detect non middle tables as middle tables.
     *
     * Put the tables that are not middle tables here to manually "fix/workaround" the algorithm.
     *
     * It's an array of $db.$table
     *
     */
    'childrenDetectionKeywordsExceptions' => [
        'kamille.ek_shop_has_product_card_lang',
        'kamille.ek_shop_has_product_lang',
    ],
    /**
     * array of db.table => ric
     */
    'ric' => [
        'kamille.ek_shop_has_product_card_lang' => ['id'],
    ],
];