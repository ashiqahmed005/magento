<?php
/**
 * Created by PhpStorm.
 * User: ashiq
 * Date: 4/15/2019
 * Time: 7:50 AM
 */


class VAIMO_ProductList_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     *
     */
    protected $_data;
    public function indexAction()
    {
        $_data = 0;
        $this->loadLayout(array('default'));
        if ($this->getRequest()->isPost()) {
            $request = Mage::app()->getRequest()->getPost();
            $_data =  $request['reverse'] == 1 ? 0 : 1;
            $this->initReverse($_data);
        }
        $this->getLayout()->getBlock('product')->assign('reverseButton_value',  $_data);
        $this->renderLayout();
    }
    public function initReverse($reverseData)
    {
        $reverse = Mage::register('reverseOrder', $reverseData);
        return $reverse;
    }

}