<?php
class TblactionsController extends AppController
{
    var $name = 'Tblactions';
    var $layout = 'default';

    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function index($ref = NULL)
    {
        $user = $this->Auth->user();
        if($user['role'] == 'intra') {
            $this->set('tblactions', $this->Tblaction->find('all', array('conditions' => array('Tblaction.user_id' => $ref))));

            $this->set('title_for_layout', 'Osmium');
        }

    }

    function add($ref = NULL)
    {
        $this->set('userRef', $ref);
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Action', 'create'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        if (!empty($this->data)) {
            if ($this->Tblaction->save($this->data)) {
                $this->Session->setFlash('Action sucessfuly added');
            } else {
                $this->Session->setFlash('Action unsucessfuly added');
            }
        }
    }

    function edit($ActionRef = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'User', 'update')) {
            throw new NotFoundException();
        }
        else {
            if (!$ActionRef) {
                $this->Session->setFlash('Please provide a reference');
                $this->redirect(array('action' => 'index'));
            }

            $tblaction = $this->Tblaction->findByref_id($ActionRef);
            if (!$tblaction) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action' => 'index'));
            }

            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Tblaction->ActionRef = $ActionRef;
                if ($this->Tblaction->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $ActionRef));
                } else {
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }

            if (!$this->request->data) {
                $this->request->data = $tblaction;
            }
        }
    }

}
