<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CmsSampleData\Setup;

use Magento\Framework\Setup;

/**
 * Class Setup
 */
class InstallData implements Setup\InstallDataInterface
{
    /**
     * @var \Magento\CatalogSampleData\Model\Category
     */
    private $category;

    /**
     * Setup class for css
     *
     * @var \Magento\CmsSampleData\Model\Css
     */
    private $css;

    /**
     * @var \Magento\CmsSampleData\Model\Page
     */
    private $page;

    /**
     * @var \Magento\CmsSampleData\Model\Block
     */
    private $block;

    /**
     * @param \Magento\CatalogSampleData\Model\Category $category
     * @param \Magento\CmsSampleData\Model\Css $css
     * @param \Magento\CmsSampleData\Model\Page $page
     * @param \Magento\CmsSampleData\Model\Block $block
     */
    public function __construct(
        \Magento\CatalogSampleData\Model\Category $category,
        \Magento\CmsSampleData\Model\Css $css,
        \Magento\CmsSampleData\Model\Page $page,
        \Magento\CmsSampleData\Model\Block $block
    ) {
        $this->category = $category;
        $this->css = $css;
        $this->page = $page;
        $this->block = $block;
    }

    /**
     * {@inheritdoc}
     */
    public function install(Setup\ModuleDataSetupInterface $setup, Setup\ModuleContextInterface $context)
    {
        $this->category->install(['Magento_CmsSampleData::fixtures/categories.csv']);
        $this->css->install(['Magento_CmsSampleData::fixtures/styles.css' => 'styles.css']);
        $this->page->install(['Magento_CmsSampleData::fixtures/pages/pages.csv']);
        $this->block->install(
            [
                'Magento_CmsSampleData::fixtures/blocks/categories_static_blocks.csv',
                'Magento_CmsSampleData::fixtures/blocks/categories_static_blocks_giftcard.csv',
                'Magento_CmsSampleData::fixtures/blocks/pages_static_blocks.csv',
            ]
        );
    }
}
