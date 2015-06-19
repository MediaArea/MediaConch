<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Entity\PolicyItem;
use AppBundle\Entity\User;

/**
 * @ORM\Entity
 */
class Policy
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="PolicyItem", mappedBy="policy", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    protected $items;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="policy", cascade={"persist"})
     */
    protected $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Policy
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\PolicyItem $item
     *
     * @return Policy
     */
    public function addItem(\AppBundle\Entity\PolicyItem $item)
    {
        $item->setPolicy($this);
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\PolicyItem $item
     */
    public function removeItem(\AppBundle\Entity\PolicyItem $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    function __toString() {
        return $this->getName();
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Policy
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
