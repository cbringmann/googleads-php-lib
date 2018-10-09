<?php

namespace Google\AdsApi\AdManager\v201711;


/**
 * This file was generated from WSDL. DO NOT EDIT.
 */
class getContactsByStatementResponse
{

    /**
     * @var \Google\AdsApi\AdManager\v201711\ContactPage $rval
     */
    protected $rval = null;

    /**
     * @param \Google\AdsApi\AdManager\v201711\ContactPage $rval
     */
    public function __construct($rval = null)
    {
      $this->rval = $rval;
    }

    /**
     * @return \Google\AdsApi\AdManager\v201711\ContactPage
     */
    public function getRval()
    {
      return $this->rval;
    }

    /**
     * @param \Google\AdsApi\AdManager\v201711\ContactPage $rval
     * @return \Google\AdsApi\AdManager\v201711\getContactsByStatementResponse
     */
    public function setRval($rval)
    {
      $this->rval = $rval;
      return $this;
    }

}
