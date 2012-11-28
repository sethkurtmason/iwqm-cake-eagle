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
        public function characteristics() {   
            $this->loadModel('Variable');
            $variables =array();
            $stations_array = $this->params['url']['stations'];
            foreach ($stations_array as &$station_id) {
                $vars = $this->StationsVariable->findAllByStationId($station_id);
                foreach($vars as &$var){
                  $variable = $this->Variable->findById($var['StationsVariable']['variable_id'],
                    array(
                      'fields'=>('Variable.term')
                    )
                  );
                  array_push($variables, $variable['Variable']['term']);
                }
            }
            $variables = array_unique($variables);
            $this->set(array(
                'characteristics' => $variables,
                '_serialize' => array('characteristics')
            ));
            // $this->loadModel('Variable');
            //   $variables =array();
            //   $var = $this->StationsVariable->findAllByStationId($results['Station']['id']);
            //   $this->params['stations']
            //   foreach($results as &$res){
            //   $var = $this->StationsVariable->find('all',
            //     $va = $this->Variable->findById($res['StationsVariable']['variable_id'],
            //       array(
            //         'fields'=>('Variable.term')
            //       )
            //     );
            //     foreach($var as &$value){
            //     array_push($variables, $variable['Variable']);
            //   }
            //   //print_r($variables);
            //   $results['Variable'] =$variables;

          }


  }
?>