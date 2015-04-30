<?php
    class ContactController extends AppController 
    {
        public $helpers = array('Html', 'Form');
        public function index() 
        {
            $this->layout = 'home';
        }
        public function send()
        {
           if ($this->request->is('post'))
           {
               if (!$this->request->data['Contact']['emailAddress'] || !$this->request->data['Contact']['subject'] || !$this->request->data['Contact']['message'])
               {
                   $this->Session->setFlash(__('Message failed to send.'));
               }
               else
               {
                   if (mail("Aiden McClelland <aidenm@jabico.com>", $this->request->data['Contact']['subject'], $this->request->data['Contact']['message'], "From: ".$this->request->data['Contact']['emailAddress']))
                   {
                       $this->Session->setFlash('Message Sent', 'flash_success');
                   }
                   else
                   {
                       $this->Session->setFlash(__('Message failed to send.'));
                   }
               }
               return $this->redirect(array('action'=>'index'));
           } 
        }
    }
?>
