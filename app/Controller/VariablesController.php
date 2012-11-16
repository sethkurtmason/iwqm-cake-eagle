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
  }
?>