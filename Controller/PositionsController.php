<?php
class PositionsController extends AppController
{
    var $name = 'Positions';
    var $layout = 'default';

    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function index()
    {
        //$this->set('positions', $this->Position->find('all'));
        //$this->set('title_for_layout', 'Positions');
        switch ($this->Session->read('Auth.User.role'))
        {
            case "intra":
                $this->redirect('index_intra');
                break;
            case "student":
                $this->redirect('index_student');
                break;
            case "employer":
                $this->redirect('index_employer');
                break;
            case "support":
                $this->redirect('index_support');
                break;
            default:
                echo "Your user role is not available ".$this->Session->read('Auth.User.role');
        }
    }

    function index_intra()
    {
        if($this->Session->read('Auth.User.role') != "intra")
        {
            die('You are not authorized ');
        }
        else
        {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');
        }
    }

    function index_student()
    {
        if($this->Session->read('Auth.User.role') != "student")
        {
            die('You are not authorized ');
        }
        else
        {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');        }
    }

    function index_employer()
    {
        if($this->Session->read('Auth.User.role') != "employer")
        {
            die('You are not authorized ');
        }
        else
        {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');        }
    }

    function index_support()
    {
        if($this->Session->read('Auth.User.role') != "support")
        {
            die('You are not authorized ');
        }
        else
        {
            $this->set('positions', $this->Position->find('all'));
            $this->set('title_for_layout', 'Positions');        }
    }

    function view($ID = NULL)
    {
        //$user = $this->Auth->user();
        //if(!$this->Acl->check($user['role'], 'Position', 'view'))
            //if(!$this->Access->check('User', 'view'))
        //{
        //    die('You are not authorized ');
       // }
       // else {
            $this->set('position', $this->Position->read(NULL, $ID));
       // }
    }

    function add()
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'create'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            if (!empty($this->data)) {
                if ($this->Position->save($this->data)) {
                    $this->Session->setFlash('Position sucessfuly added');
                    $this->redirect(array('position' => 'index'));
                } else {
                    $this->Session->setFlash('Position unsucessfuly added');
                }
            }
        }
    }

    function edit($ID = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'update'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            if (empty($this->data)) {
                $this->data = $this->Position->read(NULL, $ID);
            } else {
                if ($this->Position->save($this->data)) {
                    $this->Session->setFlash('Position updated');
                    $this->redirect(array('action' => 'view', $ID));
                }
            }
        }
    }

    function delete($ID = NULL)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], 'Position', 'delete'))
            //if(!$this->Access->check('User', 'view'))
        {
            die('You are not authorized ');
        }
        else {
            $this->Position->delete($ID);
            $this->Session->setFlash('Position deleted');
            $this->redirect(array('action' => 'index'));
        }
    }

    function apply($ID = NULL)
    {
        $data = new applicant();

        $data->create();

        $data->save(array(
            'position_id' => $this->Position->id,
            'user_id' => $this->User->id));

        $this->Session->setFlash('Position applied for');
    }
}
