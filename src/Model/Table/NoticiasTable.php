<?php
namespace App\Model\Table;

use App\Model\Entity\Noticia;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Noticias Model
 *
 */
class NoticiasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('noticias');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('Sluggable',[
            'field' => 'titulo'
        ]);

         $this->addBehavior('Upload', [
                'fields' => [
                    'foto' => [
                        'path' => 'uploads/noticias/:md5',
                        'prefix' => '../',
                    ]
                ]
            ]
        );

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->allowEmpty('slug');

        $validator
            ->requirePresence('conteudo', 'create')
            ->notEmpty('conteudo');

        $validator
          
            ->notEmpty('foto');

        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
           
            ->notEmpty('status');

        return $validator;
    }
}
