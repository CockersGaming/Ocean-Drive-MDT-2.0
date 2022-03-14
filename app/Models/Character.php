<?php

namespace App\Models;

use Database\Factories\CharacterFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function Sodium\add;

class Character extends Model
{
    use HasFactory;

    protected $connection = 'ocean_drive';
    protected $table = 'players';

    protected $fillable = [
        'mugshot'
    ];

    public $timestamps = false;

    public function search($query)
    {
        $fName = Str::contains($this->firstname(), $query);
        $lName = Str::contains($this->lastname(), $query);
        $cid = Str::contains($this->citizenid, $query);

        if ($fName || $lName || $cid) {
            return $fName || $lName || $cid;
        } else {
            return null;
        }
    }

    public function getCharInfo() {
        return json_decode($this->charinfo);
    }

    public function citizenid(): string
    {
        return $this->getCharInfo()->citizenid;
    }

    public function fullname(): string
    {
        return $this->firstname() . " " . $this->lastname();
    }

    public function gender(): string
    {
        return $this->getCharInfo()->gender;
    }

    public function backstory(): string
    {
        return $this->getCharInfo()->backstory;
    }

    public function dob(): string
    {
        return $this->getCharInfo()->birthdate;
    }

    public function nationality(): string
    {
        return $this->getCharInfo()->nationality;
    }

    public function phone(): string
    {
        return $this->getCharInfo()->phone;
    }

    public function cid(): string
    {
        return $this->getCharInfo()->cid;
    }

    public function firstname(): string
    {
        return $this->getCharInfo()->firstname;
    }

    public function lastname(): string
    {
        return $this->getCharInfo()->lastname;
    }

    public function account(): string
    {
        return $this->getCharInfo()->account;
    }

    public function getJobInfo() {
        return json_decode($this->job);
    }

    public function jobName() {
        return $this->getJobInfo()->name;
    }

    public function jobLabel() {
        return $this->getJobInfo()->label;
    }

    public function getJobGrade() {
        return json_decode($this->getJobInfo()->grade);
    }

    public function jobGradeName() {
        return $this->getJobGrade()->name;
    }

    public function jobGradeLevel() {
        return $this->getJobGrade()->level;
    }

    public function jobGradeOnDuty() {
        return $this->getJobGrade()->onDuty;
    }

    public function getMetaData() {
        return json_decode($this->metadata);
    }

    public function getMetaDataLicences() {
        return $this->getMetaData()->licences;
    }

    public function metaDataDriverLicence() {
        return $this->getMetaDataLicences()->driver;
    }

    public function metaDataBusinessLicence() {
        return $this->getMetaDataLicences()->business;
    }

    public function metaDataWeaponLicence() {
        return $this->getMetaDataLicences()->weapon;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return CharacterFactory::new();
    }
}
