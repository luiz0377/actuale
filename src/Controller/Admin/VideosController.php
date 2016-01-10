<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class VideosController extends AppController
{

    public function index()
    {
        $this->set('videos', $this->paginate($this->Videos));
        $this->set('_serialize', ['videos']);
    }

    /* a action View foi REMOVIDA porque não estamos usando... 22/10/15 */

    public function add()
    {
        $video = $this->Videos->newEntity();
        if ($this->request->is('post')) {
            $video = $this->Videos->patchEntity($video, $this->request->data);
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('Vídeo salvo!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
        $this->render('form');
    }


    public function edit($id = null)
    {
        $video = $this->Videos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $video = $this->Videos->patchEntity($video, $this->request->data);
            if ($this->Videos->save($video)) {
                $this->Flash->success(__('Alterações Salvas!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('video'));
        $this->set('_serialize', ['video']);
        $this->render('form');
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $video = $this->Videos->get($id);
        if ($this->Videos->delete($video)) {
            $this->Flash->success(__('Vídeo deletado!'));
        } else {
            $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
