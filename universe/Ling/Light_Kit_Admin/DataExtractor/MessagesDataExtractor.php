<?php


namespace Ling\Light_Kit_Admin\DataExtractor;


/**
 * The MessagesDataExtractor class.
 */
class MessagesDataExtractor
{


    /**
     * Extracts n new messages and format them for the header of the zeroadmin theme.
     * It returns an array with the following elements:
     *
     *
     * - nbMessages: int, the number of messages
     * - list: the list of elements, each of which being an array which looks like this:
     *
     *      - thumb_src: "/plugins/LightKitAdmin/zeroadmin/img/avatars/photo-1.jpg",
     *      - sender: "Shankar Madrid",
     *      - recipient: "Athena Morris",
     *      - datetime: "2019-05-31 07:55:00",
     *      - text: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, quo?",
     *      - route: "/pages/u-profile"
     *
     *
     * @param int $limit
     * @return mixed
     */
    public function extractNewest(int $limit = 5)
    {
        // note: I didn't implement the limit here, since this is all fake data for now
        $modelFile = __DIR__ . "/../model/zeroadmin-fake-data/new-messages.json";
        $arr = json_decode(file_get_contents($modelFile), true);
        $model = [
            "nbMessages" => count($arr),
            "list" => $arr,
        ];
        return $model;


    }
}