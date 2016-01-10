<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;


class ConteudosFotosController extends AppController
{


    public function index()
    {
        $this->set('conteudosFotos', $this->paginate($this->ConteudosFotos));
        $this->set('_serialize', ['conteudosFotos']);
    }
    

    public function view($id = null)
    {
        $conteudosFoto = $this->ConteudosFotos->get($id, [
            'contain' => []
        ]);
        $this->set('conteudosFoto', $conteudosFoto);
        $this->set('_serialize', ['conteudosFoto']);
    }


    public function add()
    {
        $conteudosFoto = $this->ConteudosFotos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $fotos = $data['foto_file'];
           // pr($fotos); exit;
            if(count($fotos) != 0){

                    $this->loadModel('ConteudosFotos'); // carrega o modulo de categorias_fotos
                    foreach($fotos as $f){
                        
                        $catFotos = $this->ConteudosFotos->newEntity();
                        $catFotos = $this->ConteudosFotos->patchEntity($catFotos, [
                            'url_file' => $f,
                            'conteudo_id' => $data['conteudo_id']
                        ]);

                       // pr($catFotos); exit;

                        $this->ConteudosFotos->save($catFotos);
                
                    }
            }   

            $this->Flash->success('Fotos salvas!');
            return $this->redirect(['controller' => 'Conteudos', 'action' => 'edit', $data['conteudo_id']]);
            
        }

    }


    public function edit($id = null)
    {
        $conteudosFoto = $this->ConteudosFotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conteudosFoto = $this->ConteudosFotos->patchEntity($conteudosFoto, $this->request->data);
            if ($this->ConteudosFotos->save($conteudosFoto)) {
                $this->Flash->success(__('The conteudos foto has been saved.'));
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('The conteudos foto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('conteudosFoto'));
        $this->set('_serialize', ['conteudosFoto']);
    }


    public function del()
    {
       
        if($this->request->is('ajax')){

            $data = $this->request->data;

            $foto = $this->ConteudosFotos->findById($data['id'])->first();
            if($this->ConteudosFotos->delete($foto)){

                $url = str_replace('../', '', $foto->url);
                $ft = new File($url);
                $ft->delete();

            }

        }

    }


     public function setCapa()
        {
        if($this->request->is('ajax')){

            $data = $this->request->data;


            $ids = explode('-', $data['id']);

            $foto = $this->ConteudosFotos->findById($ids[0])->first();
            
            $this->loadModel('Conteudos');
            $cat = $this->Conteudos->findById($ids[1])->first();
            $cat = $this->Conteudos->patchEntity($cat, [
                'id' => $ids[1],
                'fotocapa' => $foto->url
            ]);

            $this->Conteudos->save($cat);

        }

    }


    public function legLink()
    {
        
        if($this->request->is('ajax')){
            $data = $this->request->data;

            $cf = $this->ConteudosFotos->findById($data['id'])->first();
            $cf = $this->ConteudosFotos->patchEntity($cf, [
                'id' => $data['id'],
                'legenda' => $data['legenda'],
                'link' => $data['link']
            ]);
            $this->ConteudosFotos->save($cf);
        }
        exit;

    }


   
}
