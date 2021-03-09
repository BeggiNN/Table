<?php
namespace Perspective\TutorialEntity\Block;
class EntityRepository extends \Magento\Framework\View\Element\Template
{
    protected $categoryFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    ) {
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function getCategoryProduct($categoryId)
    {
        $collection = $this->categoryFactory->create()->load($categoryId)
            ->getProductCollection()->addAttributeToSelect('*')
            ->addFieldToFilter('price', ['gt' => 50])
            ->addFieldToFilter('price', ['lt' => 60]);
        return $collection;
    }
}
?>
