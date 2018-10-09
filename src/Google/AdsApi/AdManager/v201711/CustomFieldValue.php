<?php

namespace Google\AdsApi\AdManager\v201711;


/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class CustomFieldValue extends \Google\AdsApi\AdManager\v201711\BaseCustomFieldValue
{

    /**
     * @var \Google\AdsApi\AdManager\v201711\Value $value
     */
    protected $value = null;

    /**
     * @param int $customFieldId
     * @param \Google\AdsApi\AdManager\v201711\Value $value
     */
    public function __construct($customFieldId = null, $value = null)
    {
      parent::__construct($customFieldId);
      $this->value = $value;
    }

    /**
     * @return \Google\AdsApi\AdManager\v201711\Value
     */
    public function getValue()
    {
      return $this->value;
    }

    /**
     * @param \Google\AdsApi\AdManager\v201711\Value $value
     * @return \Google\AdsApi\AdManager\v201711\CustomFieldValue
     */
    public function setValue($value)
    {
      $this->value = $value;
      return $this;
    }

}
