<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\Letters;

class LettersTest extends TestCase
{
    protected array $letterObject = [
        'id' => 'ltr_6177c49a2a8ce',
        'campaign_id' => null,
        'name' => 'My Letter',
        'description' => 'My first Letter description',
        'company_address_id' => null,
        'artwork' => [
            'id' => 'art_6177c499dd780',
            'name' => null,
            'description' => null,
            'size' => '11x8.5',
            'pdf_url' => null,
            'thumbnails' => [
                'large' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/98f2190c8e2d49a2bc925f02136cd34c_front_large.jpeg',
                'small' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/98f2190c8e2d49a2bc925f02136cd34c_front_small.jpeg',
                'medium' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/98f2190c8e2d49a2bc925f02136cd34c_front_medium.jpeg',
            ],
            'object' => 'artwork',
        ],
        'carrier' => 'USPS',
        'size' => '11x8.5',
        'mail_type' => 'first_class',
        'created_at' => '2021-10-26T09:04:26.000000Z',
        'updated_at' => '2021-10-26T09:04:26.000000Z',
        'send_date' => '2021-10-28T00:00:00.000000Z',
        'cancelled_at' => null,
        'targets' => 0,
        'merge_variables' => [
            'name' => 'John Doe',
        ],
        'metadata' => [
            0 => [
                'key' => 'internal_id',
                'value' => '1',
            ],
        ],
        'status' => 'scheduled',
        'color' => false,
        'double_sided' => false,
        'address_placement' => 'top_first_page',
        'return_envelope' => false,
        'cancellation_time' => 0,
        'created_by' => 'Test User',
        'object' => 'letter',
    ];

    public function testShouldShowLetterList(): void
    {
        $expectedArray = [
            'data' => [
                $this->letterObject,
            ],
            'links' => [],
            'meta' => [],
            'object' => 'list',
        ];


        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('/letters')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());

    }

    public function testShouldShowAnLetter(): void
    {
        $expectedArray = $this->letterObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with("/letters/psc_6177c49a2a8ce")
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('psc_6177c49a2a8ce'));
    }

    public function testShouldCreateLetter(): void
    {
        $expectedArray = $this->letterObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/letters')
            ->willReturn($expectedArray);

        $payload = [
            'name' => 'My Letter',
            'description' => 'My Letter description',
            'send_date' => '2020-03-18',
            'mail_type' => 'first_class',
            'color' => 1,
            'double_sided' => 1,
            'address_placement' => 'top_first_page',
            'return_envelope' => 1,
            'to_address' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'company' => 'My Company',
                'address_line1' => '11310 Old Seward Hwy',
                'address_line2' => '',
                'address_city' => 'Anchorage',
                'address_state' => 'AK',
                'address_zip' => '99515',
                'address_country' => 'US',
            ],
            'from_address' => [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'company' => 'My Company',
                'address_line1' => '11310 Old Seward Hwy',
                'address_line2' => '',
                'address_city' => 'Anchorage',
                'address_state' => 'AK',
                'address_zip' => '99515',
                'address_country' => 'US',
            ],
            'artwork' => 'https://html2pdf-golang.s3.amazonaws.com/PDFs/a85x11_letter_2_sided.pdf',
        ];

        $this->assertEquals($expectedArray, $api->create($payload));
    }

    public function testShouldDestroyLetter(): void
    {
        $expectedArray = [
            'id' => 'ltr_6177c49a2a8ce',
            'deleted' => true,
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/letters/ltr_6177c49a2a8ce')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('ltr_6177c49a2a8ce'));
    }

    public function testShouldCancelLetter(): void
    {
        $expectedArray = [];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/letters/ltr_6177c49a2a8ce/cancel')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->cancel('ltr_6177c49a2a8ce'));

    }

    protected function getApiClass(): string
    {
        return Letters::class;
    }
}
