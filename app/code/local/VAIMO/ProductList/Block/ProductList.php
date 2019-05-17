<?php
class VAIMO_ProductList_Block_ProductList extends Mage_Core_Block_Template
{
    /**
     * @return array
     */
    public function getProducts() {

        $products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('position_code', array('notnull' => true))
            ->setOrder('position_code',$this->getReverseOrder())
            ->setPageSize(10);
        return $products;
    }
    public function getReverseOrder()
    {
        $sort = ( !empty(Mage::registry('reverseOrder')) == 1 )?'DESC': 'ASC';
        return $sort;
    }
}