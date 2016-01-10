<?php
namespace App\Model\Table;

use App\Model\Entity\ConteudosFoto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConteudosFotos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Conteudos
 */
class ConteudosFotosTable extends Table
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

        $this->table('conteudos_fotos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Conteudos', [
            'foreignKey' => 'conteudo_id',
            'joinType' => 'INNER'
        ]);
    
        $this->addBehavior('Upload', [
        'fields' => [
            'url' => [
                'path' => 'uploads/conteudos/:catId/:md5',
                'prefix' => '../'
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
            ->notEmpty('url');

        $validator
            ->allowEmpty('legenda');

        $validator
            ->allowEmpty('link');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['conteudo_id'], 'Conteudos'));
        return $rules;
    }
}
