<?php

namespace Meredith\FormRenderer\ControlsRenderer\Control;

/**
 * LingTalfi 2016-01-20
 */
class AuthorAnyTimePickerControl extends AnyTimePickerControl implements AnyTimePickerControlInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->setOptions([
            'format' => '%Z-%m-%d %H:%i',
            'labelDayOfMonth' => "Jour du mois",
            'labelHour' => "Heure",
            'labelMinute' => "Minute",
            'labelMonth' => "Mois",
            'labelYear' => "Année",
            'labelTitle' => "Choisissez une date",
            'dayAbbreviations' => ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
            'monthAbbreviations' => ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"],
        ]);
    }


}