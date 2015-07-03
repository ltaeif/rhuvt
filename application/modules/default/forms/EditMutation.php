<?php

/**
 * Form definition for table mutation.
 *
 * @package Default
 * @author Zodeken
 * @version $Id$
 *
 */
class Application_Form_EditMutation extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');

        $this->addElement(
            $this->createElement('hidden', 'codedem')
                
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_actuel')
                ->setLabel('Etablissement Actuel')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('text', 'section_actuelle')
                ->setLabel('Section Actuelle')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('radio', 'niveau_actuelle')
                ->setLabel('Niveau Actuelle')
                ->setMultiOptions(array('1ere ann�e' => '1ere ann�e','2eme ann�e' => '2eme ann�e','3eme ann�e' => '3eme ann�e'))
                ->setSeparator(" ")
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('1ere ann�e' => '1ere ann�e','2eme ann�e' => '2eme ann�e','3eme ann�e' => '3eme ann�e'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'resultat')
                ->setLabel('Resultat')
                ->setMultiOptions(array('admis' => 'admis','redoublant' => 'redoublant'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('admis' => 'admis','redoublant' => 'redoublant'))), true)
        );

        $this->addElement(
            $this->createElement('text', 'description_sanction')
                ->setLabel('Description Sanction')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $this->addElement(
            $this->createElement('text', 'autres')
                ->setLabel('Autres')
                ->setAttrib("maxlength", 255)
                ->setAttrib("class", "input-xlarge")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_StringLength(array("max" => 255)), true)
                ->addFilter(new Zend_Filter_StringTrim())
        );

        $tableParcours = new Application_Model_Parcours_DbTable();
        $this->addElement(
            $this->createElement('select', 'section_demande')
                ->setLabel('Section Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableParcours->fetchPairs())
                ->setRequired(true)
        );

        $tableEtablissement = new Application_Model_Etablissement_DbTable();
        $this->addElement(
            $this->createElement('select', 'etablissement_demande')
                ->setLabel('Etablissement Demande')
                ->setMultiOptions(array("" => "- - Select - -") + $tableEtablissement->fetchPairs())
                ->setRequired(true)
        );

        $this->addElement(
            $this->createElement('radio', 'cause')
                ->setLabel('Cause')
                ->setMultiOptions(array('Sant�' => 'Sant�','Social' => 'Social','Autres' => 'Autres'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Sant�' => 'Sant�','Social' => 'Social','Autres' => 'Autres'))), true)
        );

        $this->addElement(
            $this->createElement('radio', 'type_sanction')
                ->setLabel('Type Sanction')
                ->setMultiOptions(array('Non' => 'Non','Oui' => 'Oui'))
                ->setSeparator(" ")
                ->setRequired(true)
                ->addValidator(new Zend_Validate_InArray(array('haystack' => array('Non' => 'Non','Oui' => 'Oui'))), true)
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