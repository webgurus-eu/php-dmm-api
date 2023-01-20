<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\CustomFields;

class CustomFieldTest extends TestCase
{
    /** @test */
    public function shouldShowCustomFieldList(): void
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
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    /** @test */
    public function shouldShowCustomField(): void
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
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('cfld_63c7eae96b5ab'));
    }

    /** @test */
    public function shouldCreateCustomField(): void
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
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create([
            'name' => 'Custom field name',
            'type' => 'text',
            'merge_tag' => 'custom_field_name',
        ]));
    }

    /** @test */
    public function shouldUpdateCustomField(): void
    {
        $expectedArray = [
            'id' => 'cfld_63c7eae96b5ab',
            'name' => 'New Custom field name',
            'type' => 'text',
            'merge_tag' => 'new_custom_field_name',
            'default_value' => null,
            'object' => 'custom-field',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/custom-fields/cfld_63c7eae96b5ab')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('cfld_63c7eae96b5ab',['name' => 'New Custom field name']));
    }

    /** @test */
    public function shouldDestroyCustomField(): void
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
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('cfld_63c7eae96b5ab'));
    }

    protected function getApiClass(): string
    {
        return CustomFields::class;
    }
}
