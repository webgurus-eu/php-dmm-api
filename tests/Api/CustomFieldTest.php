<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\CustomFields;

class CustomFieldTest extends TestCase
{
    /** @test */
    public function shouldShowCustomFieldList()
    {
        $expectedArray = [
            'data' => [
                [
                    'id' => 'cfld_63c7eae96b5ab',
                    'name' => 'Custom field name',
                    'type' => 'text',
                    'merge_tag' => 'custom_field_name',
                    'default_value' => null,
                    'object' => 'custom-field',
                ],
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/custom-fields')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->list());
    }

    /** @test */
    public function shouldShowCustomField()
    {
        $expectedArray = [
            'id' => 'cfld_63c7eae96b5ab',
            'name' => 'Custom field name',
            'type' => 'text',
            'merge_tag' => 'custom_field_name',
            'default_value' => null,
            'object' => 'custom-field',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/custom-fields/cfld_63c7eae96b5ab')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->retrieve('cfld_63c7eae96b5ab'));
    }

    /** @test */
    public function shouldCreateCustomField()
    {
        $expectedArray = [
            'id' => 'cfld_63c7eae96b5ab',
            'name' => 'Custom field name',
            'type' => 'text',
            'merge_tag' => 'custom_field_name',
            'default_value' => null,
            'object' => 'custom-field',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/custom-fields')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->create());
    }

    /** @test */
    public function shouldUpdateCustomField()
    {
        $expectedArray = [
            'id' => 'cfld_63c7eae96b5ab',
            'name' => 'Custom field name',
            'type' => 'text',
            'merge_tag' => 'custom_field_name',
            'default_value' => null,
            'object' => 'custom-field',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/custom-fields/cfld_63c7eae96b5ab')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->update('cfld_63c7eae96b5ab'));
    }

    /** @test */
    public function shouldDestroyCustomField()
    {
        $expectedArray = [
            'id' => 'cfld_63c7eae96b5ab',
            'name' => 'Custom field name',
            'type' => 'text',
            'merge_tag' => 'custom_field_name',
            'default_value' => null,
            'object' => 'custom-field',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/custom-fields/cfld_63c7eae96b5ab')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->destroy('cfld_63c7eae96b5ab'));
    }

    protected function getApiClass(): string
    {
        return CustomFields::class;
    }
}