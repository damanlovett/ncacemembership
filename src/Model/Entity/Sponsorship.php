<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sponsorship Entity
 *
 * @property int $id
 * @property string $name
 * @property int $conference_id
 * @property int $user_id
 * @property string $description
 * @property bool $visible
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Conference $conference
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Level[] $levels
 * @property \App\Model\Entity\SponsoredItem[] $sponsored_items
 */
class Sponsorship extends Entity
{

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
        'id' => false
    ];
}
