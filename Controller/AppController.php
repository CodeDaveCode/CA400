<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array(
        //'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'You must be logged in to view this page.',
            'loginError' => 'Invalid Username or Password entered, please try again.'),
        'Acl');

    public $helpers = array('Form' => array('className' => 'Bs3Helpers.Bs3Form'));

    // Only allow the login, logout and register
    public function beforeFilter() {
        $this->Auth->allow('login', 'logout','add_student');
    }

    function index(){
        switch ($this->Session->read('Auth.User.role')) {
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

    function view($ID = NULL, $CON){
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], $CON, 'read')){
           throw new NotFoundException();
        }
        else {
            $this->set('view', $this->$CON->read(NULL, $ID));
        }
    }

    function delete($ID = NULL, $CON)
    {
        $user = $this->Auth->user();
        if(!$this->Acl->check($user['role'], $CON, 'delete'))
        {
            throw new NotFoundException();
        }
        else {
            $this->$CON->delete($ID);
            $this->Session->setFlash($CON. ' deleted');
            $this->redirect(array('action' => 'index'));
        }
    }


}