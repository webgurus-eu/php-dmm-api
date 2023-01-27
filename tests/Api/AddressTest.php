<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\Addresses;

class AddressTest extends TestCase
{
    protected array $addressObject = [
        'id'              => 'adr_63c7eae96b5ab',
        'first_name'      => 'John',
        'last_name'       => 'Doe',
        'address_line1'   => '3198 Main St',
        'address_city'    => 'Tarpon Springs',
        'address_state'   => 'FL',
        'address_country' => 'US',
        'metadata'        => [],
        'object'          => 'address',
    ];

    public function testShouldShowAddressList(): void
    {
        $expectedArray = [
            'data' => [
                $this->addressObject,
            ],
            'links' => [],
            'meta'  => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldShowSuppressedAddressList(): void
    {
        $expectedArray = [
            'data' => [
                $this->addressObject,
            ],
            'links' => [],
            'meta'  => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/addresses/suppressed')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->suppressedList());
    }

    public function testShouldShowAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/addresses/adr_63c7eae96b5ab')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('adr_63c7eae96b5ab'));
    }

    public function testShouldCreateAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create([
            'first_name'      => 'John',
            'address_line1'   => '3198 Main St',
            'address_city'    => 'Tarpon Springs',
            'address_state'   => 'FL',
            'address_country' => 'US',
            'address_zip'     => '55555',
        ]));
    }

    public function testShouldUpdateAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/addresses/adr_63c7eae96b5ab')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('adr_63c7eae96b5ab', [
            'first_name'      => 'John',
            'address_line1'   => '3198 Main St',
            'address_city'    => 'Tarpon Springs',
            'address_state'   => 'FL',
            'address_country' => 'US',
            'address_zip'     => '55555',
        ]));
    }

    public function testShouldDestroyAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/addresses/adr_63c7eae96b5ab')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('adr_63c7eae96b5ab'));
    }

    public function testShouldAttachAddressFromMailingList(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/addresses/adr_63c7eae96b5ab/attach')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->attachToMailingList('adr_63c7eae96b5ab', [
            'mailing_list_ids' => ['mlg_lst_5f29371e6f922'],
        ]));
    }

    public function testShouldDetachAddressFromMailingList(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/addresses/adr_63c7eae96b5ab/detach')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->detachFromMailingList('adr_63c7eae96b5ab', [
            'mailing_list_ids' => ['mlg_lst_5f29371e6f922'],
        ]));
    }

    public function testShouldSuppressAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('patch')
            ->with('/addresses/adr_63c7eae96b5ab/suppress')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->suppress('adr_63c7eae96b5ab'));
    }

    public function testShouldUnSuppressAddress(): void
    {
        $expectedArray = $this->addressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('patch')
            ->with('/addresses/adr_63c7eae96b5ab/un-suppress')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->unSuppress('adr_63c7eae96b5ab'));
    }

    public function testShouldImportAddresses(): void
    {
        $expectedArray = [];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/addresses/import')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->import([
            'url'             => 'https://url-to-file',
            'mailing_list_id' => 'mlg_lst_5f29371e6f922',
            'with_header'     => true,
            'header_mapping'  => [
                'fields' => [
                    0  => 'address_line1',
                    1  => 'company',
                    3  => 'first_name',
                    4  => 'address_line2',
                    5  => 'address_city',
                    7  => 'last_name',
                    9  => 'address_state',
                    11 => 'address_zip',
                    14 => 'address_country',
                ],
                'custom_fields' => [
                    16 => 'birthday',
                    17 => 'voucher_code',
                ],
            ],
        ]));
    }

    public function testShouldRestoreAddress(): void
    {
        $expectedArray = [];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/addresses/adr_63c7eae96b5ab/restore')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->restore('adr_63c7eae96b5ab'));
    }

    protected function getApiClass(): string
    {
        return Addresses::class;
    }
}
