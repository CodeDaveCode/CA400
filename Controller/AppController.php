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

// only allow the login controllers only
    public function beforeFilter() {
        $this->Auth->allow('login', 'logout','add');
    }

   // public function isAuthorized($user) {
    //    return true;
   // }

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

        $this->Acl->allow('intra', 'User', '*');
        $this->Acl->allow('intra', 'Position', '*');
        $this->Acl->allow('intra', 'Action', '*');

        $this->Acl->allow('student', 'User', array('create','read'));
        $this->Acl->allow('student', 'Position', array('read'));

        $this->Acl->allow('employer', 'User', array('create','read'));
        $this->Acl->allow('employer', 'Position', array('create','read','update'));

        $this->Acl->allow('lecturer', 'User', array('create','read'));

        $this->Acl->allow('support', 'User', '*');
        $this->Acl->allow('support', 'Position', '*');
        $this->Acl->allow('support', 'Action', '*');

    }


}
