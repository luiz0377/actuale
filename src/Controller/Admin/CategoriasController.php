<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;


class CategoriasController extends AppController
{

    public function index()
    {
        $this->set('categorias', $this->paginate($this->Categorias));
        $this->set('_serialize', ['categorias']);
    }


    /* a action View foi REMOVIDA porque não estamos usando... 22/10/15 */


    public function add()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);

            $data = $this->request->data;
            if ($cat = $this->Categorias->save($categoria)) {


                $fotos = $data['url_file'];
                if(count($fotos) != 0){

                    $this->loadModel('CategoriasFotos'); // carrega o modulo de categorias_fotos
                    foreach($fotos as $f){
                        
                        $catFotos = $this->CategoriasFotos->newEntity();
                        $catFotos = $this->CategoriasFotos->patchEntity($catFotos, [
                            'url_file' => $f,
                            'categoria_id' => $cat->id
                        ]);

                        $this->CategoriasFotos->save($catFotos);

                    }
            
                }
                
                $this->Flash->success(__('The categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }

        $this->loadModel('CategoriasFotos');
        $fotos = $this->CategoriasFotos->findAllByCategoriaId($id);

        $this->set('fotos', $fotos);
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }


    /*
    
    A view delete está desativada porque não podemos apagar uma categoria já que dentro dela tem vários conteúdos!

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('Categoria Deletada!'));
        } else {
            $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
        }
        return $this->redirect(['action' => 'index']);
    }*/
}
