<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conference Entity
 *
 * @property int $id
 * @property string $name
 * @property string $header_text
 * @property string $member_text
 * @property string $renewed_text
 * @property string $first_time
 * @property string $first_text
 * @property string $registration_text
 * @property string $lunch_text
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $footer_text
 * @property int $visible
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Fee[] $fees
 * @property \App\Model\Entity\Registration[] $registrations
 */
class Conference extends Entity
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
