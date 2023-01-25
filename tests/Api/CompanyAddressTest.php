<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\CompanyAddresses;

class CompanyAddressTest extends TestCase
{
    protected array $companyAddressObject = [
        'id' => 'cmpny_adr_5f2ba56aa6d8e',
        'first_name' => 'Jeff',
        'last_name' => 'Kingsford',
        'company' => 'One Brand Marketing',
        'address_line1' => '425 East Spruce Street',
        'address_line2' => NULL,
        'address_city' => 'Tarpon Springs',
        'address_state' => 'FL',
        'address_zip' => 34689,
        'object' => 'company-address',
    ];

    public function testShouldShowCompanyAddressList(): void
    {
        $expectedArray = [
            'data' => [
                $this->companyAddressObject,
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/company-addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldCreateCompanyAddress(): void
    {
        $expectedArray = $this->companyAddressObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/company-addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create([
            'first_name' => 'Jeff',
            'last_name' => 'Kingsford',
            'company' => 'One Brand Marketing',
            'address_line1' => '425 East Spruce Street',
            'address_line2' => NULL,
            'address_city' => 'Tarpon Springs',
            'address_state' => 'FL',
            'address_zip' => 34689,
        ]));
    }

    protected function getApiClass(): string
    {
        return CompanyAddresses::class;
    }
}