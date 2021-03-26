<?php
/**
 * Class User
 *
 * @author Kriukova Olha <olhkrk@gmail.com>
 * @copyright 2021 KO
 */

namespace Musicome\Model;

use Musicome\Core\Model as MusicomeModel;

/**
 * Class User
 *
 * @package Musicome\Model
 */
class User extends MusicomeModel
{
    const ID_FIELD_NAME = 'id';
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const PASSWORD = 'firstname';
    const EMAIL = 'email';
    const CREATED_AT = 'created_at';
    const PICTURE = 'picture';
    const SUBSCRIPTION_PLAN_ID = 'subscription_plan_id';

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->idFieldName = self::ID_FIELD_NAME;
    }

    /**
     * Get firstname
     *
     * @return array|mixed
     */
    public function getFirstname()
    {
        return $this->getData(self::FIRSTNAME);
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname)
    {
        $this->setData(self::FIRSTNAME, $firstname);

        return $this;
    }

    /**
     * Get lastname
     *
     * @return array|mixed
     */
    public function getLastname()
    {
        return $this->getData(self::LASTNAME);
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname)
    {
        $this->setData(self::LASTNAME, $lastname);

        return $this;
    }

    /**
     * Get password
     *
     * @return array|mixed
     */
    public function getPassword()
    {
        return $this->getData(self::PASSWORD);
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->setData(self::PASSWORD, $password);

        return $this;
    }

    /**
     * Get email
     *
     * @return array|mixed
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email)
    {
        $this->setData(self::EMAIL, $email);

        return $this;
    }

    /**
     * Get created at
     *
     * @return array|mixed
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param string $createdAt
     *
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->setData(self::CREATED_AT, $createdAt);

        return $this;
    }

    /**
     * Get picture
     *
     * @return array|mixed
     */
    public function getPicture()
    {
        return $this->getData(self::PICTURE);
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return $this
     */
    public function setPicture(string $picture)
    {
        $this->setData(self::PICTURE, $picture);

        return $this;
    }

    /**
     * Get sub plan id
     *
     * @return array|mixed
     */
    public function getSubPlanId()
    {
        return $this->getData(self::SUBSCRIPTION_PLAN_ID);
    }

    /**
     * Set sub plan od
     *
     * @param string $subPlanId
     *
     * @return $this
     */
    public function setSubPlanId($subPlanId)
    {
        $this->setData(self::SUBSCRIPTION_PLAN_ID, $subPlanId);

        return $this;
    }
}
