<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\Segments;

class SegmentsTest extends TestCase
{
    public function testShouldShowSegmentList(): void
    {
        $expectedArray = [
            'data' => [
                [
                    'id'         => 'sgm_52dg4bd4922fe',
                    'name'       => 'Segment Name',
                    'total'      => 2,
                    'conditions' => [
                        'column'   => 'address_city',
                        'value'    => 'Tampa',
                        'operator' => 'contains',
                        'boolean'  => 'or',
                    ],
                    'object' => 'segment',
                ],
            ],
            'links' => [],
            'meta'  => [],
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/segments')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldShowAddressesFromSegments(): void
    {
        $expectedArray = [
            'data' => [
                [
                    'id'            => 'adr_63759adf5bdab',
                    'mailing_lists' => [
                        'id'              => 'mlg_lst_62449s3e5c7eb',
                        'name'            => 'Mailing List name',
                        'addresses_count' => 2,
                        'object'          => 'mailing-list',
                    ],
                    'first_name'      => 'John',
                    'last_name'       => 'Doe',
                    'address_line1'   => '3198 Main St',
                    'address_city'    => 'Tarpon Springs',
                    'address_state'   => 'FL',
                    'address_country' => 'US',
                    'metadata'        => [],
                ],
                [
                    'id'            => 'adr_63739adf5bdab',
                    'mailing_lists' => [
                        'id'              => 'mlg_lst_62449s3e5c7eb',
                        'name'            => 'Mailing List name',
                        'addresses_count' => 2,
                        'object'          => 'mailing-list',
                    ],
                    'first_name'      => 'Jane',
                    'last_name'       => 'Doe',
                    'address_line1'   => '3198 Main St',
                    'address_city'    => 'Tarpon Springs',
                    'address_state'   => 'FL',
                    'address_country' => 'US',
                    'metadata'        => [],
                ],
            ],
            'links' => [],
            'meta'  => [],
        ];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/segments/sgm_52dg4bd4922fe/addresses')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->listAddresses('sgm_52dg4bd4922fe'));
    }

    public function testShouldShowSegment(): void
    {
        $expectedArray = [
            'id'         => 'sgm_52dg4bd4922fe',
            'name'       => 'Segment Name',
            'total'      => 2,
            'conditions' => [
                'column'   => 'address_city',
                'value'    => 'Tampa',
                'operator' => 'contains',
                'boolean'  => 'or',
            ],
            'object' => 'segment',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/segments/sgm_52dg4bd4922fe')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('sgm_52dg4bd4922fe'));
    }

    public function testShouldCreateSegment(): void
    {
        $expectedArray = [
            'id'         => 'sgm_52dg4bd4922fe',
            'name'       => 'Segment Name',
            'total'      => 2,
            'conditions' => [
                'column'   => 'address_city',
                'value'    => 'Tampa',
                'operator' => 'contains',
                'boolean'  => 'or',
            ],
            'object' => 'segment',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/segments')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create([
            'name'       => 'Segment Name',
            'conditions' => [
                'column'   => 'address_city',
                'value'    => 'Tampa',
                'operator' => 'contains',
                'boolean'  => 'or',
            ],
        ]));
    }

    public function testShouldUpdateSegment(): void
    {
        $expectedArray = [
            'id'         => 'sgm_52dg4bd4922fe',
            'name'       => 'New Segment Name',
            'total'      => 2,
            'conditions' => [
                'column'   => 'address_city',
                'value'    => 'Tampa',
                'operator' => 'contains',
                'boolean'  => 'or',
            ],
            'object' => 'segment',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/segments/sgm_52dg4bd4922fe')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('sgm_52dg4bd4922fe', ['name' => 'New Segment Name']));
    }

    public function testShouldDestroySegment(): void
    {
        $expectedArray = [
            'id'         => 'sgm_52dg4bd4922fe',
            'name'       => 'New Segment Name',
            'total'      => 2,
            'conditions' => [
                'column'   => 'address_city',
                'value'    => 'Tampa',
                'operator' => 'contains',
                'boolean'  => 'or',
            ],
            'object' => 'segment',
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/segments/sgm_52dg4bd4922fe')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('sgm_52dg4bd4922fe'));
    }

    protected function getApiClass(): string
    {
        return Segments::class;
    }
}
