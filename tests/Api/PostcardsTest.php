<?php

namespace Api;

use Dmm\HttpClient\Api\Postcards;
use Dmm\Tests\Api\TestCase;

class PostcardsTest extends TestCase
{
    public function testShouldShowPostcardList(): void
    {
        $expectedArray = [
            'data' => [
                [
                    'id'                 => 'psc_6177c49a2a8ce',
                    'campaign_id'        => null,
                    'name'               => 'My Postcard',
                    'description'        => 'My first Postcard description',
                    'company_address_id' => null,
                    'front_artwork'      => [
                        'id'          => 'art_6177c499dd780',
                        'name'        => null,
                        'description' => null,
                        'size'        => '4x6',
                        'pdf_url'     => null,
                        'thumbnails'  => [],
                        'object'      => 'artwork',
                    ],
                    'back_artwork' => [
                        'id'          => 'art_6177c499ebd06',
                        'name'        => null,
                        'description' => null,
                        'size'        => '4x6',
                        'pdf_url'     => null,
                        'thumbnails'  => [],
                        'object'      => 'artwork',
                    ],
                    'carrier'           => 'USPS',
                    'size'              => '4x6',
                    'mail_type'         => 'first_class',
                    'created_at'        => '2021-10-26T09:04:26.000000Z',
                    'updated_at'        => '2021-10-26T09:04:26.000000Z',
                    'send_date'         => '2021-10-28T00:00:00.000000Z',
                    'cancelled_at'      => null,
                    'targets'           => 0,
                    'total_spent'       => '0.00',
                    'merge_variables'   => [],
                    'metadata'          => [],
                    'status'            => 'scheduled',
                    'cancellation_time' => 140084,
                    'created_by'        => 'Test User',
                    'object'            => 'postcard',
                ],
                [
                    'id'                 => 'psc_6177c49a2a8ce',
                    'campaign_id'        => null,
                    'name'               => 'My Postcard',
                    'description'        => 'My first Postcard description',
                    'company_address_id' => null,
                    'front_artwork'      => [
                        'id'          => 'art_6177c499dd780',
                        'name'        => null,
                        'description' => null,
                        'size'        => '4x6',
                        'pdf_url'     => null,
                        'thumbnails'  => [],
                        'object'      => 'artwork',
                    ],
                    'back_artwork' => [
                        'id'          => 'art_6177c499ebd06',
                        'name'        => null,
                        'description' => null,
                        'size'        => '4x6',
                        'pdf_url'     => null,
                        'thumbnails'  => [],
                        'object'      => 'artwork',
                    ],
                    'carrier'           => 'USPS',
                    'size'              => '4x6',
                    'mail_type'         => 'first_class',
                    'created_at'        => '2021-10-26T09:04:26.000000Z',
                    'updated_at'        => '2021-10-26T09:04:26.000000Z',
                    'send_date'         => '2021-10-28T00:00:00.000000Z',
                    'cancelled_at'      => null,
                    'targets'           => 0,
                    'total_spent'       => '0.00',
                    'merge_variables'   => [],
                    'metadata'          => [],
                    'status'            => 'scheduled',
                    'cancellation_time' => 140084,
                    'created_by'        => 'Test User',
                    'object'            => 'postcard',
                ],
            ],
            'links'  => [],
            'meta'   => [],
            'object' => 'list',
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/postcards')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldShowAnPostcard(): void
    {
        $expectedArray = [
            [
                'id'                 => 'psc_6177c49a2a8ce',
                'campaign_id'        => null,
                'name'               => 'My Postcard',
                'description'        => 'My first Postcard description',
                'company_address_id' => null,
                'front_artwork'      => [
                    'id'          => 'art_6177c499dd780',
                    'name'        => null,
                    'description' => null,
                    'size'        => '4x6',
                    'pdf_url'     => null,
                    'thumbnails'  => [],
                    'object'      => 'artwork',
                ],
                'back_artwork' => [
                    'id'          => 'art_6177c499ebd06',
                    'name'        => null,
                    'description' => null,
                    'size'        => '4x6',
                    'pdf_url'     => null,
                    'thumbnails'  => [],
                    'object'      => 'artwork',
                ],
                'carrier'           => 'USPS',
                'size'              => '4x6',
                'mail_type'         => 'first_class',
                'created_at'        => '2021-10-26T09:04:26.000000Z',
                'updated_at'        => '2021-10-26T09:04:26.000000Z',
                'send_date'         => '2021-10-28T00:00:00.000000Z',
                'cancelled_at'      => null,
                'targets'           => null,
                'total_spent'       => '0.00',
                'merge_variables'   => [],
                'metadata'          => [],
                'status'            => 'scheduled',
                'cancellation_time' => 140130,
                'created_by'        => null,
                'object'            => 'postcard',
            ],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/postcards/psc_6177c49a2a8ce')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('psc_6177c49a2a8ce'));
    }

    public function testShouldCreatePostcard(): void
    {
        $expectedArray = [
            'id'                 => 'psc_6177c49a2a8ce',
            'campaign_id'        => null,
            'name'               => 'My Postcard',
            'description'        => 'My first Postcard description',
            'company_address_id' => null,
            'front_artwork'      => [
                'id'          => 'art_6177c499dd780',
                'name'        => null,
                'description' => null,
                'size'        => '4x6',
                'pdf_url'     => null,
                'thumbnails'  => [],
                'object'      => 'artwork',
            ],
            'back_artwork' => [
                'id'          => 'art_6177c499ebd06',
                'name'        => null,
                'description' => null,
                'size'        => '4x6',
                'pdf_url'     => null,
                'thumbnails'  => [],
                'object'      => 'artwork',
            ],
            'carrier'           => 'USPS',
            'size'              => '4x6',
            'mail_type'         => 'first_class',
            'created_at'        => '2021-10-26T09:04:26.000000Z',
            'updated_at'        => '2021-10-26T09:04:26.000000Z',
            'send_date'         => '2021-10-28T00:00:00.000000Z',
            'cancelled_at'      => null,
            'targets'           => null,
            'total_spent'       => '0.00',
            'merge_variables'   => [],
            'metadata'          => [],
            'status'            => 'scheduled',
            'cancellation_time' => 140130,
            'created_by'        => null,
            'object'            => 'postcard',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/postcards')
            ->willReturn($expectedArray);

        $payload = [
            'name'        => 'My Postcard',
            'description' => 'My Postcard description',
            'size'        => '4x6',
            'mail_type'   => 'first_class',
            'send_date'   => '2020-03-18',
            'to_address'  => [
                'first_name'      => 'John',
                'last_name'       => 'Doe',
                'company'         => 'My Company',
                'address_line1'   => '11310 Old Seward Hwy',
                'address_line2'   => '',
                'address_city'    => 'Anchorage',
                'address_state'   => 'AK',
                'address_zip'     => '99515',
                'address_country' => 'US',
            ],
            'from_address' => [
                'first_name'      => 'John',
                'last_name'       => 'Doe',
                'company'         => 'My Company',
                'address_line1'   => '11310 Old Seward Hwy',
                'address_line2'   => '',
                'address_city'    => 'Anchorage',
                'address_state'   => 'AK',
                'address_zip'     => '99515',
                'address_country' => 'US',
            ],
            'front_artwork' => '<html>HTML for {{user}}</html>',
            'back_artwork'  => 'art_5f2ba56aa6d8e',
        ];

        $this->assertEquals($expectedArray, $api->create($payload));
    }

    public function testShouldDestroyPostcard(): void
    {
        $expectedArray = [
            'id'      => 'psc_616e88e60235d',
            'deleted' => true,
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/postcards/psc_616e88e60235d')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('psc_616e88e60235d'));
    }

    public function testShouldCancelPostcard(): void
    {
        $expectedArray = [];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/postcards/psc_616e88e60235d/cancel')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->cancel('psc_616e88e60235d'));
    }

    protected function getApiClass(): string
    {
        return Postcards::class;
    }
}
