<?php
class PositionsController extends AppController
{
    var $name = 'Positions';
    var $layout = 'default';

    //Check User login
    function beforeFilter(){
        parent::beforeFilter();
    }

    //INTRA view redirect
    function index_intra(){
        if($this->Session->read('Auth.User.role') != "intra") {
            throw new NotFoundException();
        }
        else {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');
        }
    }

    //Student view redirect
    function index_student(){
        if($this->Session->read('Auth.User.role') != "student") {
            throw new NotFoundException();
        }
        else {
            $this->set('positions', $this->Position->find('all', array('conditions'=>array('Position.Active'=>'1'))));
            $this->set('title_for_layout', 'Positions');
        }
    }

    //Employer view redirect
    function index_employer(){
        if($this->Session->read('Auth.User.role') != "employer") {
            throw new NotFoundException();
        }
        else {
            $this->set('positions', $this->Position->find('all',
                array('conditions'=>array('Position.Parent'=>$this->Session->read('Auth.User.id')))));
            $this->set('title_for_layout', 'Positions');
        }
    }

    //Support view redirect
    function index_support(){
        if($this->Session->read('Auth.User.role') != "support") {
            throw new NotFoundException();
        }
        else {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');
        }
    }

    //View function
    function view($ID = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'view')) {
            throw new NotFoundException();
        }
        else {
            $this->set('position', $this->Position->read(NULL, $ID));
        }
    }

    //View student function , used for PDF
    function view_student($ID = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'view')) {
            throw new NotFoundException();
        }
        else {
        $this->set('position', $this->Position->read(NULL, $ID));
        }
    }

    //Add function
    function add() {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'create')) {
            throw new NotFoundException();
        }
        else {
            if (!empty($this->data)) {
                if ($this->Position->save($this->data)) {
                    $this->Session->setFlash('Position sucessfuly added');
                    $this->redirect(array('position' => 'index'));
                }
                else {
                    $this->Session->setFlash('Position unsucessfuly added');
                }
            }
        }
    }

    //Edit function
    function edit($ID = NULL)
    {
        if (!$ID) {
            $this->Session->setFlash('Please provide a reference');
            $this->redirect(array('action'=>'index'));
        }

        $position = $this->Position->findById($ID);
        if (!$position) {
            $this->Session->setFlash('Invalid User ID Provided');
            $this->redirect(array('action'=>'index'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Position->ID = $ID;
            if ($this->Position->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'));
                $this->redirect(array('action' => 'edit', $ID));
            }else{
                $this->Session->setFlash(__('Unable to update your user.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $position;
        }
    }

    //Delete function
    function delete($ID = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'delete'))
        {
            throw new NotFoundException();
        }
        else {
            $this->Position->delete($ID);
            $this->Session->setFlash('Position deleted');
            $this->redirect(array('action' => 'index'));
        }
    }

    //Latest positions added
    public function latest() {
        if (empty($this->request->params['requested'])) {
            throw new ForbiddenException();
        }
        return $this->Position->find(
            'all',
            array('order' => 'Position.created DESC', 'limit' => 5)
        );
    }
}
