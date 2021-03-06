<?php

namespace MaxMilhas\DesignPatterns\Files;

use MaxMilhas\DesignPatterns\Specification\Specification;
use PHPUnit_Framework_TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-07-03 at 15:45:12.
 */
class SpecificationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var PriceSpecification
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new PriceSpecification();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers MaxMilhas\DesignPatterns\Specification\Specification::isSatisfiedBy
     */
    public function testNoMinNoMax()
    {
        $price = new Price(50);
        
        $this->assertTrue($this->object->isSatisfiedBy($price));
    }

    /**
     * @covers MaxMilhas\DesignPatterns\Specification\Specification::isSatisfiedBy
     */
    public function testNoMin()
    {
        $price = new Price(50);
        
        $this->object->setMaxPrice(100);
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMaxPrice(40);        
        $this->assertFalse($this->object->isSatisfiedBy($price));
        
        $this->object->setMaxPrice(50);        
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMaxPrice(0);        
        $price->setPrice(0);
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMaxPrice(0);        
        $price->setPrice(-50);
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMaxPrice(0);        
        $price->setPrice(10);
        $this->assertFalse($this->object->isSatisfiedBy($price));
    }

    /**
     * @covers MaxMilhas\DesignPatterns\Specification\Specification::isSatisfiedBy
     */
    public function testNoMax()
    {
        $price = new Price(50);
        
        $this->object->setMinPrice(100);
        $this->assertFalse($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(40);        
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(50);        
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(0);        
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(0);        
        $price->setPrice(-50);
        $this->assertFalse($this->object->isSatisfiedBy($price));
        
        $price->setPrice(0);
        $this->assertTrue($this->object->isSatisfiedBy($price));
    }
    
    /**
     * @covers MaxMilhas\DesignPatterns\Specification\Specification::isSatisfiedBy
     */
    public function testMinMax()
    {
        $price = new Price(50);
        
        $this->object->setMinPrice(30);
        $this->object->setMaxPrice(60);
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(50);
        $this->object->setMaxPrice(50);
        $this->assertTrue($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(60);
        $this->object->setMaxPrice(90);
        $this->assertFalse($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(20);
        $this->object->setMaxPrice(40);
        $this->assertFalse($this->object->isSatisfiedBy($price));
        
        $this->object->setMinPrice(60);
        $this->object->setMaxPrice(40);
        $this->assertFalse($this->object->isSatisfiedBy($price));
    }

}
