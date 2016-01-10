<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Filesystem\File;


class ConteudosController extends AppController
{

    public function index()
    {
        $this->paginate =[
            'contain' => ['Categorias']
        ];
        
        $this->set('conteudos', $this->paginate($this->Conteudos));
        $this->set('_serialize', ['conteudos']);
    }

    /* a action View foi REMOVIDA porque não estamos usando... 22/10/15 */

    public function add()
    {
        $conteudo = $this->Conteudos->newEntity();
        if ($this->request->is('post')) {
            $conteudo = $this->Conteudos->patchEntity($conteudo, $this->request->data);

            if ($cont = $this->Conteudos->save($conteudo)) {
                $this->Flash->success(__('O conteúdo foi salvo com sucesso!'));
                return $this->redirect(['action' => 'edit', $cont->id]);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('conteudo'));
        $this->set('_serialize', ['conteudo']);

        $this->loadModel('Categorias');
        $categorias = $this->Categorias->find('all');
        $this->set('categorias', $categorias);


      }


    public function edit($id = null)
    {
        $conteudo = $this->Conteudos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conteudo = $this->Conteudos->patchEntity($conteudo, $this->request->data);
            if ($this->Conteudos->save($conteudo)) {
                $this->Flash->success(__('Alterações Salvas!'));
                return $this->redirect(['action' => 'edit', $id]);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }


        $this->loadModel('ConteudosFotos');
        $fotos = $this->ConteudosFotos->find('all')->where(['conteudo_id' => $id]);
        $this->set('fotos', $fotos);


        $this->set(compact('conteudo'));
        $this->set('_serialize', ['conteudo']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conteudo = $this->Conteudos->get($id);

        $this->loadModel('ConteudosFotos');
        $fotos = $this->ConteudosFotos->findAllByConteudoId($id);

        foreach($fotos as $foto){
            $url = str_replace('../', '', $foto->url);
            $file = new File($url);
            if($file->delete()){
                $this->ConteudosFotos->delete($foto);
            }
        }

        if ($this->Conteudos->delete($conteudo)) {
            $this->Flash->success(__('Conteúdo deletado!'));
        } else {
            $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
