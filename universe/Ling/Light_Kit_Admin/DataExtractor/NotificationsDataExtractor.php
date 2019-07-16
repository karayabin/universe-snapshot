<?php


namespace Ling\Light_Kit_Admin\DataExtractor;


/**
 * The NotificationsDataExtractor class.
 */
class NotificationsDataExtractor
{


    /**
     * Extracts n new messages and format them for the header of the zeroadmin theme.
     * It returns an array with the following elements:
     *
     *
     * - nbMessages: int, the number of messages
     * - list: the list of elements, each of which being an array which looks like this:
     *
     *          - route: "/pages/u-issue-tracker",
     *          - icon: "fas fa-envelope fa-fw",
     *          - text: "You have 10 messages",
     *          - datetime: "2019-07-11 10:43:00"
     *
     *
     * @param int $limit
     * @return mixed
     */
    public function extractNewest(int $limit = 5)
    {
        // note: I didn't implement the limit here, since this is all fake data for now
        $modelFile = __DIR__ . "/../model/zeroadmin-fake-data/new-notifications.json";
        $arr = json_decode(file_get_contents($modelFile), true);


        $today = date('Y-m-d');
        array_walk($arr, function (&$v) use ($today) {
            $v = str_replace('2019-07-11', $today, $v);
        });


        $model = [
            "nbMessages" => count($arr),
            "list" => $arr,
        ];
        return $model;


    }
}