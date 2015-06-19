<?php

namespace MediaConchOnline\Bundle\UserBundle\Controller;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Controller\ProfileController as BaseController;

use AppBundle\Entity\User;

class ProfileController extends BaseController
{
    /**
     * Show the user
     */
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof User) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $quotas = $this->container->get('mediaconch_user.quotas')->getQuotasWithExpireDate();

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'), array('user' => $user, 'quotas' => $quotas));
    }
}
