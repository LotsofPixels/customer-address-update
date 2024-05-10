<?php
namespace Lotsofpixels\CustomerUpdate\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class CustomerAddressSaveAfterObserver
 * @package Lotsofpixels\CustomerUpdate\Observer
 */
class CustomerAddressSaveAfterObserver implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @return $this|void
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        /** @var \Magento\Customer\Model\Address $customerAddress */
        $customerAddress = $observer->getCustomerAddress();
        $customer = $customerAddress->getCustomer();

        $customer->setUpdatedAt(date('Y-m-d H:i:s'));
        $customer->save();

        return $this;
    }

}
