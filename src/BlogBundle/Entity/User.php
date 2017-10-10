<?php
/**
 * Created by PhpStorm.
 * User: bruno
 * Date: 10/10/2017
 * Time: 15:29
 */

namespace BlogBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
//
//    public function __construct()
//    {
//        parent::__construct();
//        // your own logic
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->setUsername($email);

        return parent::setEmail($email);
    }
}
