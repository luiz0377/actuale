<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;

class UsuariosController extends AppController
{


    public function index()
    {
        $this->set('usuarios', $this->paginate($this->Usuarios));
        $this->set('_serialize', ['usuarios']);
    }

    /* a action View foi REMOVIDA porque não estamos usando... 22/10/15 */

    public function add()
    {
        $usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Usuário Adicionado!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
        $this->set('usuarios', $usuario);
        $this->render('form');
    }


    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('Alterações Salvas!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
        $this->set('usuarios', $usuario);
        $this->render('form');
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('Usuário deletado!'));
        } else {
            $this->Flash->error(__('Ops... Algo de errado aconteceu, por favor, tente novamente!'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function login()
    {
            if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Dados inválidos!');
        }

        $this->render('login', false);
    }

    public function logout()
    {
        $this->Flash->success('Você saiu!');
        return $this->redirect($this->Auth->logout());
    }


}