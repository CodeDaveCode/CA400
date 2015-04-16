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
        $user = $this->Auth->user();
        if($user['role'] == 'intra')
        {
            $this->set('tblactions', $this->Tblaction->find('all'));
            $this->set('title_for_layout', 'Osmium');
        }
        else
        {
            $this->set('tblactions', $this->Tblaction->find('all'));
            $this->set('title_for_layout', 'Osmium');
        }
    }

    function view($ActionRef = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Action', 'view'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            $this->set('tblaction', $this->Tblaction->read(NULL, $ActionRef));
        }
    }

    function add()
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Action', 'create'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
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
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Action', 'update'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            if (empty($this->data)) {
                $this->data = $this->Tblaction->read(NULL, $ActionRef);
            } else {
                if ($this->Tblaction->save($this->data)) {
                    $this->Session->setFlash('Action updated');
                    $this->redirect(array('action' => 'view', $ActionRef));
                }
            }
        }
    }

    function delete($ActionRef = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Action', 'delete'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            $this->Tblaction->delete($ActionRef);
            $this->Session->setFlash('Action deleted');
            $this->redirect(array('action' => 'index'));
        }
    }
}
