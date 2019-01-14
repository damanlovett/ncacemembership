<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SponsoredItem Entity
 *
 * @property int $id
 * @property string $name
 * @property int $amount
 * @property string $description
 * @property int $sponsorship_id
 * @property int $sponsored_level_id
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Sponsorship $sponsorship
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\User $user
 */
class SponsoredItem extends Entity
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
