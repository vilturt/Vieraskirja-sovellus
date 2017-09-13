<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="viesti")
 */
class YksiViesti
{
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
  /**
     * @ORM\Column(type="string", length=100)
     */   
    private $kirjoittajanNimi;
    
     /**
     * @ORM\Column(type="datetime")
     */
    private $ajankohta;
    
     /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $sahkopostiOsoite;
    
     /**
     * @ORM\Column(type="text")
     */
    private $kirjoitettuViesti;
    
    public function getId() {
        return $this->id;
    }

    public function getKirjoittajanNimi() {
        return $this->kirjoittajanNimi;
    }

    public function getAjankohta() {
        return $this->ajankohta;
    }

    public function getSahkopostiOsoite() {
        return $this->sahkopostiOsoite;
    }

    public function getKirjoitettuViesti() {
        return $this->kirjoitettuViesti;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setKirjoittajanNimi($kirjoittajanNimi) {
        $this->kirjoittajanNimi = $kirjoittajanNimi;
    }

    public function setAjankohta() {
        
        if(!$this->ajankohta){
            $this->ajankohta = new \DateTime();
        }

        return $this;
        
        
    }

    public function setSahkopostiOsoite($sahkopostiOsoite) {
        $this->sahkopostiOsoite = $sahkopostiOsoite;
    }

    public function setKirjoitettuViesti($kirjoitettuViesti) {
        $this->kirjoitettuViesti = $kirjoitettuViesti;
    }


    
    
    
    
}