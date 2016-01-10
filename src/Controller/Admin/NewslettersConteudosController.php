<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
/**
 * NewslettersConteudos Controller
 *
 * @property \App\Model\Table\NewslettersConteudosTable $NewslettersConteudos
 */
class NewslettersConteudosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('newslettersConteudos', $this->paginate($this->NewslettersConteudos));
        $this->set('_serialize', ['newslettersConteudos']);
    }

    /**
     * View method
     *
     * @param string|null $id Newsletters Conteudo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newslettersConteudo = $this->NewslettersConteudos->get($id, [
            'contain' => []
        ]);
        $this->set('newslettersConteudo', $newslettersConteudo);
        $this->set('_serialize', ['newslettersConteudo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newslettersConteudo = $this->NewslettersConteudos->newEntity();
        if ($this->request->is('post')) {

            $newslettersConteudo = $this->NewslettersConteudos->patchEntity($newslettersConteudo, $this->request->data);
            $data = $this->request->data;

            $fotos = $data['foto_file'];
    

            if ($cont = $this->NewslettersConteudos->save($newslettersConteudo)) {
                $this->Flash->success(__('Conteúdo salvo com sucesso!.'));
                return $this->redirect(['action'  => 'edit', $cont->id]);
            } else {
                $this->Flash->error(__('The newsletters conteudo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newslettersConteudo'));
        $this->set('_serialize', ['newslettersConteudo']);
        $this->render('form');
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsletters Conteudo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newslettersConteudo = $this->NewslettersConteudos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newslettersConteudo = $this->NewslettersConteudos->patchEntity($newslettersConteudo, $this->request->data);

             $fotos = $data['foto_file'];
             pr($fotos); exit;

            if ($this->NewslettersConteudos->save($newslettersConteudo)) {
                $this->Flash->success(__('The newsletters conteudo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletters conteudo could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('NewslettersConteudos');
        $fotos = $this->NewslettersConteudos->find('all')->where(['id' => $id]);
        $this->set('fotos', $fotos);
        $this->set(compact('newslettersConteudo'));
        $this->set('_serialize', ['newslettersConteudo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsletters Conteudo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newslettersConteudo = $this->NewslettersConteudos->get($id);
        if ($this->NewslettersConteudos->delete($newslettersConteudo)) {
            $this->Flash->success(__('The newsletters conteudo has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletters conteudo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
