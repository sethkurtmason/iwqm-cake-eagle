<?php
  class Variable extends AppModel {
    public $hasAndBelongsToMany = array(
        'Station' =>
            array(
                'className'              => 'Station',
                'joinTable'              => 'stations_variables',
                'foreignKey'             => 'variable_id',
                'associationForeignKey'  => 'station_id',
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