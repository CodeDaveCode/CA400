<?php
class PositionsController extends AppController
{
    //var $scaffold;
    var $name = 'Positions';
    var $layout = 'default';

    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function index()
    {
        $this->set('positions', $this->Position->find('all'));
        $this->set('title_for_layout', 'Positions');
    }

    function view($ID = NULL)
    {
        $this->set('position', $this->Position->read(NULL, $ID));
    }

    function add()
    {
        if (!empty($this->data)) {
            if ($this->Position->save($this->data)) {
                $this->Session->setFlash('Position sucessfuly added');
                $this->redirect(array('position' => 'index'));
            } else {
                $this->Session->setFlash('Position unsucessfuly added');
            }
        }
    }

    function edit($ID = NULL)
    {
        if (empty($this->data)) {
            $this->data = $this->Position->read(NULL, $ID);
        } else {
            if ($this->Position->save($this->data)) {
                $this->Session->setFlash('Position updated');
                $this->redirect(array('action' => 'view', $ID));
            }
        }
    }

    function delete($ID = NULL)
    {
        $this->Position->delete($ID);
        $this->Session->setFlash('Position deleted');
        $this->redirect(array('action' => 'index'));
    }
}
