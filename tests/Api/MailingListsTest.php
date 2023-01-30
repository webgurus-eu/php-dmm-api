<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\MailingLists;

class MailingListsTest extends TestCase
{
    public function testShouldShowMailingListsList(): void
    {
        $expectedArray = [
            'data' => [
                [
                    'id' => 'mlg_lst_62449s3e5c7eb',
                    'name' => 'Mailing List name',
                    'addresses_count' => 2,
                    'object' => 'mailing-list',

                ],
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/mailing-lists')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldShowAddressesFromMailingList(): void
    {
        $expectedArray = [
            'data' => [
                [
                    'id' => 'adr_63759adf5bdab',
                    'mailing_lists' => [
                        'id' => 'mlg_lst_62449s3e5c7eb',
                        'name' => 'Mailing List name',
                        'addresses_count' => 2,
                        'object' => 'mailing-list',
                    ],
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'address_line1' => '3198 Main St',
                    'address_city' => 'Tarpon Springs',
                    'address_state' => 'FL',
                    'address_country' => 'US',
                    'metadata' => [],
                ],
                [
                    'id' => 'adr_63739adf5bdab',
                    'mailing_lists' => [
                        'id' => 'mlg_lst_62449s3e5c7eb',
                        'name' => 'Mailing List name',
                        'addresses_count' => 2,
                        'object' => 'mailing-list',
                    ],
                    'first_name' => 'Jane',
                    'last_name' => 'Doe',
                    'address_line1' => '3198 Main St',
                    'address_city' => 'Tarpon Springs',
                    'address_state' => 'FL',
                    'address_country' => 'US',
                    'metadata' => [],
                ],
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/mailing-lists/mlg_lst_62449s3e5c7eb/addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->listAddresses('mlg_lst_62449s3e5c7eb'));
    }

    public function testShouldShowMailingList(): void
    {
        $expectedArray = [
            'id' => 'mlg_lst_62449s3e5c7eb',
            'name' => 'Mailing List name',
            'addresses_count' => 2,
            'object' => 'mailing-list',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/mailing-lists/mlg_lst_62449s3e5c7eb')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('mlg_lst_62449s3e5c7eb'));
    }

    public function testShouldCreateMailingList(): void
    {
        $expectedArray = [
            'id' => 'mlg_lst_62449s3e5c7eb',
            'name' => 'Mailing List name',
            'addresses_count' => 2,
            'object' => 'mailing-list',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/mailing-lists')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create(['name' => 'Mailing List name']));
    }

    public function testShouldUpdateMailingList(): void
    {
        $expectedArray = [
            'id' => 'mlg_lst_62449s3e5c7eb',
            'name' => 'New Mailing List name',
            'addresses_count' => 2,
            'object' => 'mailing-list',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/mailing-lists/mlg_lst_62449s3e5c7eb')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('mlg_lst_62449s3e5c7eb', ['name' => 'New Mailing List name']));
    }

    public function testShouldDestroyMailingList(): void
    {
        $expectedArray = [
            'id' => 'mlg_lst_62449s3e5c7eb',
            'name' => 'Mailing List name',
            'addresses_count' => 2,
            'object' => 'mailing-list',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/mailing-lists/mlg_lst_62449s3e5c7eb')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('mlg_lst_62449s3e5c7eb'));
    }

    protected function getApiClass(): string
    {
        return MailingLists::class;
    }
}
