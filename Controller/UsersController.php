<?php
class UsersController extends AppController
{

    //Check User login
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add_student');
    }

    //Login function
    public function login() {
        if($this->Session->check('Auth.User')) {
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            }
            else {
                $this->Session->setFlash('Invalid username or password');
            }
        }
    }

    //Logout function
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    //INTRA overview redirect
    function index_intra() {
        if($this->Session->read('Auth.User.role') != "intra") {
            throw new NotFoundException();
        }
        else {
            $this->set('users', $this->User->Profile->find('all'));
            $this->set('title_for_layout', 'users');
        }
    }

    //Student overview redirect
    function index_student() {
        if($this->Session->read('Auth.User.role') != "student") {
            throw new NotFoundException();
        }
        else {
            $this->set('int', $this->User->Applicant->find('all', array('conditions'=>array(
                array('Applicant.user_id'=>$this->Session->read('Auth.User.id')),array('Applicant.stage'=>'interview')))));
        }
    }

    //Employer overview redirect
    function index_employer() {
        if($this->Session->read('Auth.User.role') != "employer") {
            throw new NotFoundException();
        }
        else {
            return $this->redirect(
                array('controller' => 'Positions', 'action' => 'index')
            );
        }
    }

    //Support overview redirect
    function index_support() {
        if($this->Session->read('Auth.User.role') != "support") {
            throw new NotFoundException();
        }
        else {
            $this->set('users', $this->User->find('all'));
            $this->set('title_for_layout', 'users');
        }
    }

    //Install ACL
    function install()
    {
        if($this->Acl->Aro->findByAlias("INTRA")){
            $this->redirect('/');
        }
        $aro = new aro();

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'intra'
        ));

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'student'
        ));

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'employer'
        ));

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'lecturer'
        ));

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'support'
        ));

        $aro->create();
        $aro->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'suspended'
        ));

        $aco = new Aco();
        $aco->create();
        $aco->save(array(
            'model' => 'User',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'User'
        ));

        $aco->create();
        $aco->save(array(
            'model' => 'Position',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'Position'
        ));

        $aco->create();
        $aco->save(array(
            'model' => 'Tblaction',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'Action'
        ));

        $aco->create();
        $aco->save(array(
            'model' => 'Applicant',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'Applicant'
        ));

        $aco->create();
        $aco->save(array(
            'model' => 'Profile',
            'foreign_key' => null,
            'parent_id' => null,
            'alias' => 'Profile'
        ));

        $this->Acl->allow('intra', 'User', '*');
        $this->Acl->allow('intra', 'Position', '*');
        $this->Acl->allow('intra', 'Action', '*');
        $this->Acl->allow('intra', 'Applicant', '*');
        $this->Acl->allow('intra', 'Profile', '*');

        $this->Acl->allow('student', 'User', array('read','update'));
        $this->Acl->allow('student', 'Position', array('read'));
        $this->Acl->allow('student', 'User', array('read'));
        $this->Acl->allow('student', 'Applicant', array('create','read'));
        $this->Acl->allow('student', 'Profile', array('create','read','update'));

        $this->Acl->allow('employer', 'User', array('read','update'));
        $this->Acl->allow('employer', 'Position', '*');
        $this->Acl->allow('employer', 'User', array('create','read'));
        $this->Acl->allow('employer', 'Applicant', array('create','read','update'));
        $this->Acl->allow('employer', 'Profile', array('create','read','update'));

        $this->Acl->allow('lecturer', 'User', array('create','read'));

        $this->Acl->allow('support', 'User', '*');
        $this->Acl->allow('support', 'Position', '*');
        $this->Acl->allow('support', 'Action', '*');
        $this->Acl->allow('support', 'Applicant', '*');
        $this->Acl->allow('support', 'Profile', '*');

    }

    //Create student user
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

                $this->Session->setFlash('The user has been created');
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }
        }
    }

    //Create employer user
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
                    'alias' => 'employer'
                ));

                $this->Session->setFlash('The user has been created');
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash('The user could not be created. Please, try again.');
            }
        }
    }

    //Edit  function
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
                    $this->Session->setFlash('The user has been updated');
                    $this->redirect(array('action' => 'edit', $id));
                }
                else {
                    $this->Session->setFlash('Unable to update your user.');
                }
            }
            if (!$this->request->data) {
                $this->request->data = $user;
            }
        }
    }


    //Set user activation to 1
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
                $this->Session->setFlash('User re-activated');
                $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('User was not re-activated');
            $this->redirect(array('action' => 'index'));
        }
    }
}