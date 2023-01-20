<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\Artworks;

class ArtworkTest extends TestCase
{
    protected array $artworkObject = [
        'id' => 'art_61712e005470c',
        'name' => 'My Artwork',
        'description' => 'My detailed description of the artwork',
        'size' => '4x6',
        'side' => 'front',
        'pdf_url' => null,
        'thumbnails' => null,
        'object' => 'artwork',
    ];

    public function testShouldShowAddressList(): void
    {
        $expectedArray = [
            'data' => [
                $this->artworkObject,
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/artworks')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list());
    }

    public function testShouldShowAddress(): void
    {
        $expectedArray = $this->artworkObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/artworks/art_61712e005470c')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('art_61712e005470c'));
    }

    public function testShouldCreateAddress(): void
    {
        $expectedArray = $this->artworkObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/artworks')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create([
            'first_name' => 'John',
            'address_line1' => '3198 Main St',
            'address_city' => 'Tarpon Springs',
            'address_state' => 'FL',
            'address_country' => 'US',
            'address_zip' => '55555',
        ]));
    }

    public function testShouldUpdateAddress(): void
    {
        $expectedArray = $this->artworkObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/artworks/art_61712e005470c')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('art_61712e005470c', [
            'first_name' => 'John',
            'address_line1' => '3198 Main St',
            'address_city' => 'Tarpon Springs',
            'address_state' => 'FL',
            'address_country' => 'US',
            'address_zip' => '55555',
        ]));
    }

    public function testShouldDestroyAddress(): void
    {
        $expectedArray = $this->artworkObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/artworks/art_61712e005470c')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('art_61712e005470c'));
    }

    public function testShouldRetrieveArtworkVariables(): void
    {
        $expectedArray = [
            'merge_variables' => [
                'first_name',
                'last_name',
                'voucher_code',
            ],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/artworks/art_61712e005470c/variables')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->variables('art_61712e005470c'));
    }

    public function testShouldGenerateArtworkPreview(): void
    {
        $expectedArray = [
            'url' => 'https://html2pdf-golang.s3.amazonaws.com/previews/ffb5c4c74f6a490d91d85c3b8f009578.pdf',
            'thumbnails' => [
                'small' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/ffb5c4c74f6a490d91d85c3b8f009578_front_small.jpeg',
                'medium' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/ffb5c4c74f6a490d91d85c3b8f009578_front_medium.jpeg',
                'large' => 'https://html2pdf-golang.s3.amazonaws.com/previews/thumbnails/ffb5c4c74f6a490d91d85c3b8f009578_front_large.jpeg',
            ],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/artworks/art_61712e005470c/generate-preview')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->generatePreview('art_61712e005470c', [
            'type' => 'postcard',
            'merge_variables' => [
                'first_name' => 'John',
                'discount' => '80%',
                'expires' => '31 July, 2020',
            ],
        ]));
    }

    protected function getApiClass(): string
    {
        return Artworks::class;
    }
}