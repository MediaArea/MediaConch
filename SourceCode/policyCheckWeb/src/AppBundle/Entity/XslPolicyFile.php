<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use AppBundle\Entity\User;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */
class XslPolicyFile
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $policyName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $policyDescription;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="xsl_policy", fileNameProperty="policyFilename")
     * @Assert\File(maxSize="1000000")
     *
     * @var File
     */
    private $policyFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $policyFilename;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="xslPolicy", cascade={"persist"})
     */
    protected $user;

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
     * Set policyName
     *
     * @param string $policyName
     * @return XslPolicyFile
     */
    public function setPolicyName($policyName)
    {
        $this->policyName = $policyName;

        return $this;
    }

    /**
     * Get policyName
     *
     * @return string 
     */
    public function getPolicyName()
    {
        return $this->policyName;
    }

    /**
     * Set policyDescription
     *
     * @param string $policyDescription
     * @return XslPolicyFile
     */
    public function setPolicyDescription($policyDescription)
    {
        $this->policyDescription = $policyDescription;

        return $this;
    }

    /**
     * Get policyDescription
     *
     * @return string
     */
    public function getPolicyDescription()
    {
        return $this->policyDescription;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setPolicyFile(File $policyFile = null)
    {
        $this->policyFile = $policyFile;

        if ($policyFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getPolicyFile()
    {
        return $this->policyFile;
    }

    /**
     * Set policyFilename
     *
     * @param string $policyFilename
     * @return XslPolicyFile
     */
    public function setPolicyFilename($policyFilename)
    {
        $this->policyFilename = $policyFilename;

        return $this;
    }

    /**
     * Get policyFilename
     *
     * @return string 
     */
    public function getPolicyFilename()
    {
        return $this->policyFilename;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return XslPolicyFile
     */
    public function setUpdatedAt($updatedAt)
    {
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

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return XslPolicyFile
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

    function __toString() {
        return $this->getPolicyName();
    }
}
