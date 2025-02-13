<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contractor Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone_number
 * @property string|null $profile_picture
 *
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Skill[] $skills
 */
class Contractor extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'phone_number' => true,
        'profile_picture' => true,
        'contacts' => true,
        'projects' => true,
        'skills' => true,
    ];

    /**
     * A virtual field for contractor's full name
     *
     * @return string
     */
    protected function _getFullName(): string
    {
        return $this->first_name .' '. $this->last_name;
    }

    /**
     * A virtual field for setting contractors upload image to their full name
     *
     * @return string
     */
    protected function _getPictureName(): string
    {
        return $this->first_name .'_'. $this->last_name;
    }

    /**
     * A virtual field for getting full path of profile picture
     *
     * @return string
     */
    protected function _getProfilePicturePath(): string
    {
        return '/files/Contractors/profile_picture/'.$this->profile_picture;
    }

    /**
     * A virtual field for getting contractor details for dropdown list
     *
     * @return string
     */
    protected function _getDetails(): string
    {
        return $this->_getFullName().' - '. $this->email;
    }
}
