<?php

/**
 * Form definition for table inscription.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditInscription extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codeins')
                
        );

        $this->addElement(
            $this->createElement('text', 'nom')
                ->setLabel('Nom')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'prenom')
                ->setLabel('Prenom')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'cin')
                ->setLabel('Cin')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'tel')
                ->setLabel('Tel')
                ->addValidator(new Zend_Validate_Int(), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'login')
                ->setLabel('Login')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'password')
                ->setLabel('Password')
                ->setAttrib("maxlength", 45)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 45)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('button', 'submit')
                ->setLabel('Save')
                ->setAttrib('class', 'btn btn-primary')
                ->setAttrib('type', 'submit')
        );

        parent::init();
    }
}