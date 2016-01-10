<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\NewslettersTable $Newsletters
 */
class NewslettersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('newsletters', $this->paginate($this->Newsletters));
        $this->set('_serialize', ['newsletters']);
    }


    public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;

            $newsletter = $this->Newsletters->patchEntity($newsletter, [

                'nome' => $data['nome'],
                'email' => $data['email'],
                'token' => md5( uniqid( time() ) . $data['email'] ) 

            ]);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('Newsletter Salvo!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
        $this->render('form');
    }

    public function edit($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('Usuário salvo com sucesso!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
        $this->render('form');
    }


     public function addNew()
    {
        $newsletters = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {

            $newsletters = $this->Newsletters->patchEntity($newsletters, $this->request->data);

            if ($this->Newsletters->save($newsletters)) {
                $this->Flash->success(__('o conteúdo foi salvo!.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletters conteudo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsletters'));
        $this->set('_serialize', ['newsletters']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('Usuário Deletado com sucesso!.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
