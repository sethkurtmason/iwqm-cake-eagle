<?php
  class StationsVariablesController extends AppController {
    public $components = array('RequestHandler');

    //public $scaffold;    
    public function index() {
            $vars = $this->StationsVariable->find('all');
            $this->set(array(
                'vars' => $vars,
                '_serialize' => array('vars')
            ));
        }
    public function view($id) {   
      $this->loadModel('Station');
      $this->loadModel('Variable');
        $results = $this->Station->findById($id);
        $variables =array();
        $var = $this->StationsVariable->findAllByStationId($id);
        foreach($var as &$value){
          //echo $value['StationsVariable']['variable_id'];
          //echo ", ";
          $variable = $this->Variable->findById($value['StationsVariable']['variable_id']);
          array_push($variables, $variable['Variable']);
        }
        //print_r($variables);
        $results['Variable'] =$variables;
        $this->set(array(
            'data' => $results,
            '_serialize' => array('data')
        ));
    }
    
   public function by_name($id) {   
      $this->loadModel('Station');
      $this->loadModel('Variable');
        $results = $this->Station->findByName($id);
        $variables =array();
        $var = $this->StationsVariable->findAllByStationId($results['Station']['id']);
        foreach($var as &$value){
          //echo $value['StationsVariable']['variable_id'];
          //echo ", ";
          $variable = $this->Variable->findById($value['StationsVariable']['variable_id']);
          array_push($variables, $variable['Variable']);
        }
        //print_r($variables);
        $results['Variable'] =$variables;
        $this->set(array(
            'data' => $results,
            '_serialize' => array('data')
        ));
    }
    public function characteristics_by_station_name() {   
        $this->loadModel('Variable');
        $this->loadModel('Station');
        $variable_array =array();
        $variables =array();
        $stations_array = $this->params['url']['stations'];
        $station_ids=array();
        foreach ($stations_array as &$station_name) {
            $station = $this->Station->findByName($station_name);
            array_push($station_ids, $station['Station']['id']);
        }
        $vars = $this->StationsVariable->findAllByStationId($station_ids);
        foreach($vars as &$var){
          array_push($variable_array,$var['StationsVariable']['variable_id']);
        }
        // $variable = $this->Variable->findAllById($variable_array,
        //     array(
        //       'fields'=>('Variable.term')
        //     )
        //   );
        $ids = implode(",",$variable_array);
        $q = "select DISTINCT term from variables where id in ($ids)";
        $db = ConnectionManager::getDataSource('default');
        //$results = $db->rawQuery($q);
        $results = $this->Variable->query($q);
        //print_r($results);
        foreach($results as &$var){
          array_push($variables,$var[0]["term"]);
        }
        //$variables= array_unique($variable_array);
        // foreach($variable_array as $var){
        //   array_push($variables, $var);
        // }
        $this->set(array(
            'characteristics' => $variables,
            '_serialize' => array('characteristics')
        ));
      }

      public function characteristics() {   
          $this->loadModel('Variable');
          $variables =array();
          $variable_array = array();
          $stations_array = $this->params['url']['stations'];
          foreach ($stations_array as &$station_id) {
              $vars = $this->StationsVariable->findAllByStationId($station_id);
              foreach($vars as &$var){
                $variable = $this->Variable->findById($var['StationsVariable']['variable_id'],
                  array(
                    'fields'=>('Variable.term')
                  )
                );
                array_push($variable_array, $variable['Variable']['term']);
              }
          }
          $variable_array = array_unique($variable_array);
          $variable_array = array_unique($variable_array);
          foreach($variable_array as $var){
            array_push($variables, $var);
          }
          $this->set(array(
              'characteristics' => $variables,
              '_serialize' => array('characteristics')
          ));
        }

  }
?>