<?php
namespace App\Controller\Admin;

use App\Controller\AppController\Admin;


class BannersController extends AppController
{

    public function index()
    {

        $banners = $this->Banners->find('all', [
            'order' => ['posicao' => 'ASC']
        ]);

        $this->set('banners', $banners);
        $this->set('_serialize', ['banners']);
    }


    public function add()
    {
        $banner = $this->Banners->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $pos = $this->Banners->find('all');

            $banner = $this->Banners->patchEntity($banner, [
                'nome' => $data['nome'],
                'link' => $data['link'],
                'imagem_file' => $data['imagem_file'],
                'subtexto' => $data['subtexto'],
                'textop' => $data['textop'],
                'posicao' => $pos->count() + 1
            ]);
            
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('Banner Salvo'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops.. erro ao salvar banner.'));
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
        $this->render('form');
    }


    public function edit($id = null)
    {
        $banner = $this->Banners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $banner = $this->Banners->patchEntity($banner, $this->request->data);
            if ($this->Banners->save($banner)) {
                $this->Flash->success(__('Alterações salvas!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops.. erro ao salvar banner.'));
            }
        }
        $this->set(compact('banner'));
        $this->set('_serialize', ['banner']);
        $this->render('form');
    }


    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $banner = $this->Banners->get($id);
        if ($this->Banners->delete($banner)) {
            $this->Flash->success(__('Banner deletado!'));
        } else {
            $this->Flash->error(__('Ops.. erro ao deletar banner.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function posicao()
    {
        if($this->request->is('ajax')){
            $data = $this->request->data;

            for($i = 0; $i < count($data['sortable']); $i++){

                $id = $data['sortable'][$i];

                $banner = $this->Banners->findById($id)->first();

                $banner = $this->Banners->patchEntity($banner, [
                    'id' => $id,
                    'posicao' => $i
                ]);
                $this->Banners->save($banner);
            }
            //$a = pr($data['sortable']);
            $this->response->body(json_encode(['status' => true]));
            return $this->response;
        }
    }
}
