<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Filesystem\File;

/**
 * CategoriasFotos Controller
 *
 * @property \App\Model\Table\CategoriasFotosTable $CategoriasFotos
 */
class CategoriasFotosController extends AppController
{

 
    public function add()
    {
        $categoriasFoto = $this->CategoriasFotos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $fotos = $data['foto_file'];

            foreach($fotos as $f){
                        
                $catFotos = $this->CategoriasFotos->newEntity();
                $catFotos = $this->CategoriasFotos->patchEntity($catFotos, [
                    'url_file' => $f,
                    'categoria_id' => $data['categoria_id']
                ]);

                $this->CategoriasFotos->save($catFotos);

            }

            $this->Flash->success('Fotos salvas!');
            return $this->redirect(['controller' => 'Categorias', 'action' => 'edit', $data['categoria_id']]);
            
        }



        $this->set(compact('categoriasFoto', 'categorias'));
        $this->set('_serialize', ['categoriasFoto']);
    }


    public function del()
    {
       
        if($this->request->is('ajax')){

            $data = $this->request->data;

            $foto = $this->CategoriasFotos->findById($data['id'])->first();
            if($this->CategoriasFotos->delete($foto)){

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

            $foto = $this->CategoriasFotos->findById($ids[0])->first();
            
            $this->loadModel('Categorias');
            $cat = $this->Categorias->findById($ids[1])->first();
            $cat = $this->Categorias->patchEntity($cat, [
                'id' => $ids[1],
                'fotocapa' => $foto->url
            ]);

            $this->Categorias->save($cat);

        }

    }
}
