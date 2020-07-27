<?php
namespace App\Models;
use Core\Model;
use Core\Validators\RequiredValidator;
use Core\Validators\MaxValidator;

class Contacts extends Model{

    public $id,$user_id,$fname,$lname,$email,$address,$address2,$city,$state,$zip;
    public $home_phone,$cell_phone,$work_phone, $deleted = 0;

    protected static $_table = 'contacts';
    // public function __construct(){
    //     $table = 'contacts';
    //     parent::__construct($table);
    //     $this->_softDelete = true;
    // }

    public function validator(){
        $this->runValidation(new requiredValidator($this,['field' => 'fname','msg'=>'First name is required.']));
        $this->runValidation(new requiredValidator($this,['field' => 'lname','msg'=>'Last name is required.']));
        $this->runValidation(new MaxValidator($this,['field' => 'fname','msg'=>'First name must be less than 156.','rule'=>155]));
        $this->runValidation(new MaxValidator($this,['field' => 'lname','msg'=>'Last name must be less than 156.','rule'=>155]));
    }

    public static function findById($id) {
        return self::findFirst(['conditions'=> "id = ?", 'bind'=>[$id]]);
      }

    public function findAllByUserId($user_id, $params=[]){
        $conditions = [
            'conditions' => 'user_id = ?',
            'bind' => [$user_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }
    public function findCol($user_id, $params=[]){
        $conditions = [
            'conditions' => 'cell_phone != 3 ',
            'bind' => [$user_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->find($conditions);
    }

    public function displayName(){
        return $this->fname . ' ' . $this->lname;
    }

    public function findIdAndUserId($contact_id,$user_id,$params=[]){
        $conditions = [
            'conditions' => 'id = ? AND user_id = ?',
            'bind' => [$contact_id, $user_id]
        ];
        $conditions = array_merge($conditions,$params);
        return $this->findFirst($conditions);
    }

    public function displayAddress(){
        $address = '';
        if(!empty($this->address)){
            $address .= $this->address . '<br>';
        }
        if(!empty($this->address2)){
            $address .= $this->address2 . '<br>';
        }
        if(!empty($this->city)){
            $address .= $this->city . ', ';
        }
        $address .= $this->state . ' ' .$this->zip . '<br>';
        return $address;
    }

    public function displayAddressLabel(){
        $html = $this->displayName() . '<br/>';
        $html .= $this->displayAddress();
        return $html;
    }
}