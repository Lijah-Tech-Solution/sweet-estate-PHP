<?php
namespace App\Controllers;
use Core\Controller;
use Core\Session;
use Core\Router;
use Core\H;
use App\Models\Contacts;
use App\Models\Users;

class ContactsController extends Controller{

    public function onConstruct()
    {
        $this->view->setLayout('default');
    }

    public function indexAction(){
        $ContactsModel = new Contacts();
        $contacts = $ContactsModel->find();
        // H::dnd($ContactsModel->find());
        $this->view->contacts = $contacts;
        $this->view->render('contacts/index');
    }

    public function addAction(){
        $contact = new Contacts();
        if($this->request->isPost()){
            $this->request->csrfCheck();
            $contact->assign($this->request->get());
            $contact->user_id = Users::currentUser()->id;
            if($contact->save()){
               Router::redirect('contacts');
            }
        }
        $this->view->contact = $contact;
        $this->view->displayErrors = $contact->getErrorMessages();
        $this->view->postAction = PROOT . 'contacts' . DS . 'add';
        $this->view->render('contacts/add');
    }

    public function updateAction($id){
        $contact = new Contacts();
        $selected_contact = Contacts::findById((int)$id);
        $initial = $selected_contact->home_phone;
        if ($this->request->isPost())
        {
                // $this->request->csrfCheck();
                $current = (int)$_POST['home_phone'];
                $sum = $initial - $current;
                // H::dnd($sum);
                $selected_contact->home_phone = $sum;
                if($selected_contact->save()){
                    Session::addMsg('success', ' ₦'.$current.' Deducted Successfully from existing balance of ₦'.$initial.' ');
                    Router::redirect('contacts');
    
                }
                
            }
        
            $this->view->displayErrors = $contact->getErrorMessages();
            $this->view->contact = $selected_contact;
            $this->view->postAction = PROOT . 'contacts' . DS . 'update' . DS . $selected_contact->id;
            $this->view->render('contacts/edit');
    }
}