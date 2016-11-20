<?php



$type = $_POST['type'];
$value = $_POST['value'];


switch ($type) {
    case 'country':

        $regions = [
            'france' => [
                'centre' => 'centre',
                'centre 2' => 'centre 2',
                'centre 3' => 'centre 3',
            ],
            'italy' => [
                'centro' => 'centro',
                'centro 2' => 'centro 2',
                'centro 3' => 'centro 3',
            ],
            'japan' => [
                'midolo' => 'midolo',
                'midolo 2' => 'midolo 2',
                'midolo 3' => 'midolo 3',
            ],
        ];
        echo json_encode($regions[$value], JSON_FORCE_OBJECT);
        break;
    case 'region':

        $cities = [
            'centre' => [
                'tours',
                'tours 2',
                'tours 3',
            ],
            'centre 2' => [
                'nantes',
                'nantes 2',
                'nantes 3',
            ],
            'centre 3' => [
                'lyon',
                'lyon 2',
                'lyon 3',
            ],
            'centro' => [
                'milan',
                'milan 2',
                'milan 3',
            ],
            'centro 2' => [
                'venise',
                'venise 2',
                'venise 3',
            ],
            'centro 3' => [
                'napoli',
                'napoli 2',
                'napoli 3',
            ],
            'midolo' => [
                'tokyo',
                'tokyo 2',
                'tokyo 3',
            ],
            'midolo 2' => [
                'osaka',
                'osaka 2',
                'osaka 3',
            ],
            'midolo 3' => [
                'nagoya',
                'nagoya 2',
                'nagoya 3',
            ],
        ];
        echo json_encode($cities[$value], JSON_FORCE_OBJECT);
        break;
    default:
        throw new \Exception("You suck");
        break;
}