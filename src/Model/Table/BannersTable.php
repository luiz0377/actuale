<?php
namespace App\Model\Table;

use App\Model\Entity\Banner;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banners Model
 *
 */
class BannersTable extends Table
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

        $this->table('banners');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Upload', [
                'fields' => [
                    'imagem' => [
                        'path' => 'uploads/banners/:slug/:md5',
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');
        
        $validator
            ->allowEmpty('link');

        $validator
            ->notEmpty('imagem');

        $validator
            ->allowEmpty('subtexto');

        $validator
            ->allowEmpty('textop');

        $validator
            ->add('vis', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('vis');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nome']));
        return $rules;
    }
}
