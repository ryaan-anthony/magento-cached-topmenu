<?php

class Ryaan_Topmenu_Block_Html extends Mage_Page_Block_Html_Topmenu
{
    /**
     * Cache group tag
     */
    const CACHE_GROUP = 'full_page';

    /**
     * Cache entry tag
     */
    const CACHE_TAG = 'top_menu';

    /**
     * Retrieve current entity key
     *
     * @return int|string
     */
    public function getCurrentEntityKey()
    {
        return Mage::app()->getStore()->getRootCategoryId();
    }

    /**
     *
     *
     * @param mixed
     * @return $this
     */
    protected function _saveCache($data)
    {
        if (is_null($this->getCacheLifetime()) || !$this->_getApp()->useCache(self::CACHE_GROUP)) {
            return false;
        }

        $cacheKey = $this->getCacheKey();

        $this->_getApp()->saveCache($data, $cacheKey, [self::CACHE_TAG]);

        return $this;
    }

    /**
     * Load topmenu from cache storage
     *
     * @return string | false
     */
    protected function _loadCache()
    {
        if (is_null($this->getCacheLifetime()) || !$this->_getApp()->useCache(self::CACHE_GROUP)) {
            return false;
        }

        $cacheKey = $this->getCacheKey();

        $cacheData = $this->_getApp()->loadCache($cacheKey);

        return $cacheData;
    }

}
