<?php

/**
 * Controller for table detailconsultproc
 *
 * @package Admin
 * @author Zodeken
 * @version $Id$
 *
 */
class Admin_DetailconsultprocController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->getFrontController()->getRequest()->setParams($_GET);
        
        // zsf = zodeken sort field, zso = zodeken sort order
        $sortField = $this->_getParam('_sf', '');
        $sortOrder = $this->_getParam('_so', '');
        $pageNumber = $this->_getParam('page', 1);
        
        $tableDetailconsultproc = new Application_Model_Detailconsultproc_DbTable();
        $gridSelect = $tableDetailconsultproc->getDbSelectByParams($this->_getAllParams(), $sortField, $sortOrder);
        $paginator = Zend_Paginator::factory($gridSelect);
        $paginator->setItemCountPerPage(20)
            ->setCurrentPageNumber($pageNumber);
            
        $this->view->assign(array(
            'paginator' => $paginator,
            'sortField' => $sortField,
            'sortOrder' => $sortOrder,
            'pageNumber' => $pageNumber,
        ));
        
        foreach ($this->_getAllParams() as $paramName => $paramValue)
        {
            // prepend 'param' to avoid error of setting private/protected members
            $this->view->assign('param' . $paramName, $paramValue);
        }
    }
    
    public function createAction()
    {
        $form = new Application_Form_EditDetailconsultproc();
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
                    
                $tableDetailconsultproc = new Application_Model_Detailconsultproc_DbTable();
                $tableDetailconsultproc->insert($values);
                    
                $this->_helper->redirector('index');
                exit;
            }
        }
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
        $tableDetailconsultproc = new Application_Model_Detailconsultproc_DbTable();
        $form = new Application_Form_EditDetailconsultproc();
        $id = (int) $this->_getParam('id', 0);
        
        $row = $tableDetailconsultproc->find($id)->current();

        if (!$row) {
            $this->_helper->redirector('index');
            exit;
        }
            
        if ($this->_request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $values = $form->getValues();
        
                $where = array('cin = ?' => $id);
        
                $tableDetailconsultproc->update($values, $where);
                    
                $this->_helper->redirector('index');
                exit;
            }
        } else {
            
            $form->populate($row->toArray());
        }
        
        $this->view->form = $form;
        $this->view->row = $row;
    }
    
    public function deleteAction()
    {
        $ids = $this->_getParam('del_id', array());
        
        if (!is_array($ids)) {
            $ids = array($ids);
        }
        
        if (!empty($ids)) {
            $tableDetailconsultproc = new Application_Model_Detailconsultproc_DbTable();
            $tableDetailconsultproc->deleteMultipleIds($ids);
        }
        
        $this->_helper->redirector('index');
        exit;
    }
}