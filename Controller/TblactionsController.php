<?php
class TblactionsController extends AppController
{
    var $name = 'Tblactions';
    var $layout = 'default';

    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function index()
    {
        $this->set('tblactions', $this->Tblaction->find('all'));
        $this->set('title_for_layout', 'Osmium');
    }

    function view($ActionRef = NULL)
    {
        $this->set('tblaction', $this->Tblaction->read(NULL, $ActionRef));
    }

    function add()
    {
        if (!empty($this->data)) {
            if ($this->Tblaction->save($this->data)) {
                $this->Session->setFlash('Action sucessfuly added');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Action unsucessfuly added');
            }
        }
    }

    function edit($ActionRef = NULL)
    {
        if (empty($this->data)) {
            $this->data = $this->Tblaction->read(NULL, $ActionRef);
        } else {
            if ($this->Tblaction->save($this->data)) {
                $this->Session->setFlash('Action updated');
                $this->redirect(array('action' => 'view', $ActionRef));
            }
        }
    }

    function delete($ActionRef = NULL)
    {
        $this->Tblaction->delete($ActionRef);
        $this->Session->setFlash('Action deleted');
        $this->redirect(array('action' => 'index'));
    }
}
