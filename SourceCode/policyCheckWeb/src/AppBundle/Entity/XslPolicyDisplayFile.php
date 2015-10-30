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
class XslPolicyDisplayFile
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
    protected $policyDisplayName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="xsl_policy_display", fileNameProperty="policyDisplayFilename")
     * @Assert\File(maxSize="1000000")
     *
     * @var File
     */
    private $policyDisplayFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $policyDisplayFilename;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="xslPolicyDisplay", cascade={"persist"})
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
     * Set policyDisplayName
     *
     * @param string $policyDisplayName
     * @return XslPolicyDisplayFile
     */
    public function setPolicyDisplayName($policyDisplayName)
    {
        $this->policyDisplayName = $policyDisplayName;

        return $this;
    }

    /**
     * Get policyDisplayName
     *
     * @return string
     */
    public function getPolicyDisplayName()
    {
        return $this->policyDisplayName;
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
    public function setPolicyDisplayFile(File $policyDisplayFile = null)
    {
        $this->policyDisplayFile = $policyDisplayFile;

        if ($policyDisplayFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getPolicyDisplayFile()
    {
        return $this->policyDisplayFile;
    }

    /**
     * Set policyDisplayFilename
     *
     * @param string $policyDisplayFilename
     * @return XslPolicyDisplayFile
     */
    public function setPolicyDisplayFilename($policyDisplayFilename)
    {
        $this->policyDisplayFilename = $policyDisplayFilename;

        return $this;
    }

    /**
     * Get policyDisplayFilename
     *
     * @return string
     */
    public function getPolicyDisplayFilename()
    {
        return $this->policyDisplayFilename;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return XslPolicyDisplayFile
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
     * @return XslPolicyDisplayFile
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
        return $this->getPolicyDisplayName();
    }
}
