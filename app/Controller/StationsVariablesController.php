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
            $variables ="";
            $var = $this->StationsVariable->findAllByStationId($id);
            foreach($var as &$value){
              //echo $value['StationsVariable']['variable_id'];
              //echo ", ";
              $variable = $this->Variable->findById($value['StationsVariable']['variable_id']);
              //$variables = array_merge($variables, $variable);
            }
            //print_r($results);
            $this->set(array(
                'data' => $results,
                '_serialize' => array('data')
            ));
        }



  }
?>