<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dropdowns Model
 *
 * @method \App\Model\Entity\Dropdown get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dropdown newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dropdown[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dropdown patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dropdown findOrCreate($search, callable $callback = null, $options = [])
 */
class DropdownsTable extends Table
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

        $this->table('dropdowns');
        $this->displayField('title');
        $this->primaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('list_type', 'create')
            ->notEmpty('list_type');

        return $validator;
    }
	public function getDocumentCategories() {
		//return array(''=>'Select', '1'=>'Category 1', '2'=>'Category 2', '3'=>'Category 3', '4'=>'Category 4', '5'=>'Category 5');
		$query = $this->find('list', [
    'keyField' => 'id',
    'valueField' => 'title',
	'conditions' => ['Dropdowns.list_type' => 'documents'],
	'order' => ['Dropdowns.title'=>'ASC']
]);
		$results = $query->toArray();
		return $results;
	}
}
