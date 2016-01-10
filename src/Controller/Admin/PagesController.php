<?php
namespace App\Controller\Site;

use App\Controller\Admin\AppController;

/**
 * Home Controller
 *
 * @property \App\Model\Table\HomeTable $Home
 */
class PagesController extends AppController
{
	
    public function index()
    {
      $this->loadModel('Newsletters');
      $this->listarNewsletter(); // Listar Email do NewSletter
    }

    public function listarNewsletter()
    {
       $newsletters = $this->Newsletters->find('all', [
            'order' => ['posicao' => 'ASC'])
       ]);
	     $this->set('newsletters' $newslettes);
    }


    
    
}
