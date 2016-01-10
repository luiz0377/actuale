<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ConteudosFoto Entity.
 *
 * @property int $id
 * @property string $url
 * @property int $conteudo_id
 * @property \App\Model\Entity\Conteudo $conteudo
 */
class ConteudosFoto extends Entity
{
     protected $_virtual = ['url_file'];
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'url_file' => true,
    ];
}
