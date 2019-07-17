<?php
namespace RobertRupa\CzaterPL\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class CzaterPL extends Template
{
    const CZATERPL_PATH = 'czaterpl/';

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * CzaterPL constructor.
     * @param Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getConfigValue('general/token');
    }
    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->getConfigValue('general/domain');
    }
    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->getConfigValue('general/login');
    }
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getConfigValue('general/email');
    }
    /**
     * @return string
     */
    public function getScript()
    {
        return $this->getConfigValue('general/script');
    }
    /**
     * @return string
     */
    public function getCSS()
    {
        return $this->getConfigValue('additional/css');
    }

    /**
     * @param string $field
     * @return string
     */
    private function getConfigValue($field)
    {
        $storeScope = ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::CZATERPL_PATH.$field, $storeScope);
    }
}
