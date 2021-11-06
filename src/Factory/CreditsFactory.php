<?php
namespace App\Factory;

use App\Entity\Cast;

class CreditsFactory
{
    public function createCast(array $response)
    {
        $cast = new Cast();
        
        if (array_key_exists('adult', $response)) {
            $cast->setAdult($response['adult']);
        }
        
        if (array_key_exists('gender', $response)) {
            $cast->setGender($response['gender']);
        }
        
        if (array_key_exists('id', $response)) {
            $cast->setId($response['id']);
        }
        
        if (array_key_exists('known_for_department', $response)) {
            $cast->setKnownForDepartment($response['known_for_department']);
        }
        
        if (array_key_exists('name', $response)) {
            $cast->setName($response['name']);
        }
        
        if (array_key_exists('original_name', $response)) {
            $cast->setOriginalName($response['original_name']);
        }
        
        if (array_key_exists('popularity', $response)) {
            $cast->setPopularity($response['popularity']);
        }
        
        if (array_key_exists('profile_path', $response)) {
            $cast->setProfilePath($response['profile_path']);
        }
        
        if (array_key_exists('cast_id', $response)) {
            $cast->setCastId($response['cast_id']);
        }
        
        if (array_key_exists('character', $response)) {
            $cast->setCharacter($response['character']);
        }
        
        if (array_key_exists('credit_id', $response)) {
            $cast->setCreditId($response['credit_id']);
        }
        
        if (array_key_exists('order', $response)) {
            $cast->setOrder($response['order']);
        }
        
        return $cast;
        
    }
    
}

