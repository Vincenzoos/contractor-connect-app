<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organisation Entity
 *
 * @property int $id
 * @property string $name
 * @property string $contact_first_name
 * @property string $contact_last_name
 * @property string $contact_email
 * @property string $current_website
 * @property string $industry
 * @property string|null $description
 *
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Project[] $projects
 */
class Organisation extends Entity
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
        'name' => true,
        'contact_first_name' => true,
        'contact_last_name' => true,
        'contact_email' => true,
        'current_website' => true,
        'industry' => true,
        'description' => true,
        'contacts' => true,
        'projects' => true,
    ];

    /**
     * A virtual field for getting organisation details for dropdown list
     *
     * @return string
     */
    protected function _getDetails(): string
    {
        return $this->name.' - '. $this->contact_email;
    }
}
