<?php
namespace App\Model\Behavior;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\Utility\Inflector;
/**
 * Sluggable behavior
 */
class SluggableBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'field' => 'title',
    	'slug' => 'slug',
    	'replacement' => '-'
    ];
    public function initialize(array $config)
    {
    	$this->_defaultConfig = array_merge($this->_defaultConfig, $config);
    }
    private function slug(Entity $entity)
    {
    	$config = $this->config();
    	$value = mb_strtolower($entity->get($config['field']));
    	$entity->set($config['slug'], Inflector::slug($value, $config['replacement']));
    }
    public function beforeSave(Event $event, Entity $entity)
    {
    	$this->slug($entity);
    }
}