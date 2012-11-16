<?php
  class Station extends AppModel {
public $hasAndBelongsToMany = array(
        'Variable' =>
            array(
                'className'              => 'Variable',
                'joinTable'              => 'stations_variables',
                'foreignKey'             => 'station_id',
                'associationForeignKey'  => 'variable_id',
                'unique'                 => true,
                'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
            )
    );
  }
?>