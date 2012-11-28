<?php
  class VariablesController extends AppController {
    public $components = array('RequestHandler');

        public function index() {
                $variables = $this->Variable->find('all');
                $this->set(array(
                    'variables' => $variables,
                    '_serialize' => array('variables')
                ));
            }
        public function view($id) {
            $variable = $this->Variable->findById($id);
            $this->set(array(
                'variable' => $variable,
                '_serialize' => array('variable')
            ));
        }
        public function unique_characteristics(){
          $variables = $this->Variable->find('all',
            array(
              'fields' => array('DISTINCT Variable.term')
            )
          );
          $var_array = array();
          foreach($variables as &$var){
            array_push($var_array, $var['Variable']['term']);
          }
          $this->set(array(
              'characteristics' => $var_array,
              '_serialize' => array('characteristics')
          ));
        }
  }
?>