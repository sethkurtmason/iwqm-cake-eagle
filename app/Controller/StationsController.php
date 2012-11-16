<?php
  class StationsController extends AppController {
    public $components = array('RequestHandler');

        
    public function index() {
            $stations = $this->Station->find('all');
            $this->set(array(
                'stations' => $stations,
                '_serialize' => array('stations')
            ));
        }
        public function view($id) {
            $station = $this->Station->findById($id);
            $this->set(array(
                'station' => $station,
                '_serialize' => array('station')
            ));
        }



  }
?>