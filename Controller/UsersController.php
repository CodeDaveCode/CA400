<?php
class UsersController extends AppController
{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add');
    }

    public function login() {
        if($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            }
            else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    function index_intra() {
        if($this->Session->read('Auth.User.role') != "intra") {
            throw new NotFoundException();
        }
        else {
            $this->set('users', $this->User->find('all'));
            $this->set('title_for_layout', 'users');
        }
    }

    function index_student() {
        if($this->Session->read('Auth.User.role') != "student") {
            throw new NotFoundException();
        }
        else {
            //$this->set('users', $this->User->find('all', array('conditions'=>array('User.id'=>$this->Session->read('Auth.User.id')))));
            //$this->set('title_for_layout', 'users');
            //$this->set('pros', $this->User->Profile->find('all', array('conditions'=>array('Profile.user_id'=>$this->Session->read('Auth.User.id')))));
            $this->set('int', $this->User->Applicant->find('all', array('conditions'=>array(
                                                                array('Applicant.user_id'=>$this->Session->read('Auth.User.id')),array('Applicant.stage'=>'interview')))));
        }
    }

    function index_employer() {
        if($this->Session->read('Auth.User.role') != "employer") {
            throw new NotFoundException();
        }
        else {
            $this->set('users', $this->User->find('all'));
            $this->set('title_for_layout', 'users');
        }
    }

    function index_support() {
        if($this->Session->read('Auth.User.role') != "support") {
            throw new NotFoundException();
        }
        else {
            $this->set('users', $this->User->find('all'));
            $this->set('title_for_layout', 'users');
        }
    }

    function view($ID = NULL) {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'User', 'read')) {
            throw new NotFoundException();
        }
        else {
            $this->set('user', $this->User->read(NULL, $ID));
        }
    }

    public function add_student()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                // Set the user role for student
                $aro = new Aro();
                $aro->create();
                $aro->save(array(
                    'model' => 'User',
                    'foreign_key' => $this->User->id,
                    'parent_id' => '2',
                    'alias' => 'student'
                ));

                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }
        }
    }

    public function add_employer() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                // Set the user role for employer
                $aro = new Aro();
                $aro->create();
                $aro->save(array(
                    'model' => 'User',
                    'foreign_key' => $this->User->id,
                    'parent_id' => '3',
                    'alias' => 'student'
                ));

                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'User', 'edit')) {
            throw new NotFoundException();
        }
        else {
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action' => 'index'));
            }
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action' => 'index'));
            }
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }
                else {
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }
            if (!$this->request->data) {
                $this->request->data = $user;
            }
        }
    }

    public function delete($id = null) {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'User', 'delete')) {
            throw new NotFoundException();
        }
        else {
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action' => 'index'));
            }
            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash('Invalid user id provided');
                $this->redirect(array('action' => 'index'));
            }
            if ($this->User->saveField('status', 0)) {
                $this->Session->setFlash(__('User deleted'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('User was not deleted'));
            $this->redirect(array('action' => 'index'));
        }
    }

    public function activate($id = null) {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'User', 'create')) {
            throw new NotFoundException();
        }
        else {
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action' => 'index'));
            }
            $this->User->id = $id;
            if (!$this->User->exists()) {
                $this->Session->setFlash('Invalid user id provided');
                $this->redirect(array('action' => 'index'));
            }
            if ($this->User->saveField('status', 1)) {
                $this->Session->setFlash(__('User re-activated'));
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('User was not re-activated'));
            $this->redirect(array('action' => 'index'));
        }
    }
}