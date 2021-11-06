<?php
namespace App\Entity;

class Cast
{
    private $imageUri = 'https://www.themoviedb.org/t/p/w138_and_h175_face';
    private $adult;
    private $gender;
    private $id;
    private $known_for_department;
    private $name;
    private $original_name;
    private $popularity;
    private $profile_path;
    private $cast_id;
    private $character;
    private $credit_id;
    private $order;
    
    public function getAdult()
    {
        return $this->adult;
    }
    
    public function setAdult($adult)
    {
        $this->adult = $adult;
        
        return $this;
    }
    
    public function getGender()
    {
        return $this->gender;
    }
    
    public function setGender($gender)
    {
        $this->gender = $gender;
        
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getKnownForDepartment()
    {
        return $this->known_for_department;
    }
    
    public function setKnownForDepartment($knowFor)
    {
        $this->known_for_department = $knowFor;
        
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getOriginalName()
    {
        return $this->original_name;
    }
    
    public function setOriginalName($originalName)
    {
        $this->original_name = $originalName;
        
        return $this;
    }
    
    public function getPopularity()
    {
        return $this->popularity;
    }
    
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;
        
        return $this;
    }
    
    public function getProfilePath()
    {
        return $this->profile_path;
    }
    
    public function setProfilePath($profilePath)
    {
        $this->profile_path = $this->imageUri . $profilePath;
        
        return $this;
    }
    
    public function getCastId()
    {
        return $this->cast_id;
    }
    
    public function setCastId($castId)
    {
        $this->cast_id = $castId;
        
        return $this;
    }
    
    public function getCharacter()
    {
        return $this->character;
    }
    
    public function setCharacter($character)
    {
        $this->character = $character;
        
        return $this;
    }
    
    public function getCreditId()
    {
        return $this->credit_id;
    }
    
    public function setCreditId($creditId)
    {
        $this->credit_id = $creditId;
        
        return $this;
    }
    
    public function getOrder()
    {
        return $this->order;
    }
    
    public function setOrder($order)
    {
        $this->order = $order;
        
        return $this;
    }
}

