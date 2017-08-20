<?php
namespace App\Entities;

use \App\Entity;
use \JsonSerializable;
use \DateTime;

/**
 * @Entity @Table(name="users")
 **/
class User extends Entity implements JsonSerializable
{
    /**
     * @Id @Column(name="id", type="bigint", nullable=false) @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(name="username", type="string", length=64, unique=true, nullable=false)
     * @var string
     */
    protected $username;

    /**
     * @Column(name="password", type="string", length=32, nullable=true, nullable=true)
     * @var string
     */
    protected $password;

    /**
     * @Column(name="first_name", type="string", length=64, nullable=true)
     * @var string
     */
    protected $firstName;

    /**
     * @Column(name="last_name", type="string", length=64, nullable=true)
     * @var string
     */
    protected $lastName;

    /**
     * @Column(name="phone", type="string", length=32, nullable=true)
     * @var string
     */
    protected $phone;

    /**
     * @Column(name="email", type="string", length=128, nullable=true)
     * @var string
     */
    protected $email;

    /**
     * @Column(name="addres", type="string", length=256, nullable=true)
     * @var string
     */
    protected $addres;

    /**
     * @Column(name="active", type="boolean", nullable=false, options={"default"=true})
     * @var string
     */
    protected $active;

    /**
     * @Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     * @var string
     */
    protected $createdAt;

    /**
     * @Column(name="updated_at", type="datetime", nullable=true)
     * @var string
     */
    protected $updatedAt;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set addres
     *
     * @param string $addres
     *
     * @return User
     */
    public function setAddres($addres)
    {
        $this->addres = $addres;

        return $this;
    }

    /**
     * Get addres
     *
     * @return string
     */
    public function getAddres()
    {
        return $this->addres;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        if (!is_null($createdAt) && !is_a($createdAt, 'DateTime')) {
            $createdAt = new DateTime($createdAt);
        }
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        if (!is_null($updatedAt) && !is_a($updatedAt, 'DateTime')) {
            $updatedAt = new DateTime($updatedAt);
        }
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
