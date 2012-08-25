<?php

namespace Demo;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min = 3, minMessage = "Be descriptive, dude!",
     *     max = 20, maxMessage = "Don't get carried away..."
     * )
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @Assert\Type(type = "numeric")
     * @Assert\Range(min = 0, minMessage = "Do we give a bonus for buying?")
     */
    private $price;

    public function setPrice($email)
    {
        $this->price = $email;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}
