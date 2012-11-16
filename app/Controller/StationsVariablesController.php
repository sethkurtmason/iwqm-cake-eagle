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


  }
?>