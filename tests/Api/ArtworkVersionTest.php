<?php

namespace Dmm\Tests\Api;

use Dmm\HttpClient\Api\ArtworkVersions;

class ArtworkVersionTest extends TestCase
{
    protected array $artworkVersionObject = [
        'id' => 'art_vrsn_61712e005e018',
        'name' => 'My Artwork Version',
        'description' => 'My Artwork Version description',
        'html' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"><html><body>My HTML</body></html>',
        'object' => 'version',
    ];

    public function testShouldShowAddressVersionList(): void
    {
        $expectedArray = [
            'data' => [
                $this->artworkVersionObject,
            ],
            'links' => [],
            'meta' => [],
        ];

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/artworks/art_61712e005470c/versions')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->list('art_61712e005470c'));
    }

    public function testShouldShowAddressVersion(): void
    {
        $expectedArray = $this->artworkVersionObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('get')
            ->with('/artworks/art_61712e005470c/versions/art_vrsn_61712e005e018')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->retrieve('art_61712e005470c', 'art_vrsn_61712e005e018'));
    }

    public function testShouldCreateAddressVersion(): void
    {
        $expectedArray = $this->artworkVersionObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('post')
            ->with('/artworks/art_61712e005470c/versions')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->create('art_61712e005470c', [
            'name' => 'My Artwork Version',
            'description' => 'My Artwork Version description',
            'html' => '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"><html><body>My HTML</body></html>',
        ]));
    }

    public function testShouldUpdateAddressVersion(): void
    {
        $expectedArray = $this->artworkVersionObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('put')
            ->with('/artworks/art_61712e005470c/versions/art_vrsn_61712e005e018')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->update('art_61712e005470c', 'art_vrsn_61712e005e018', [
            'name' => 'My Artwork Version',
            'description' => 'My Artwork Version description',
        ]));
    }

    public function testShouldDestroyAddressVersion(): void
    {
        $expectedArray = $this->artworkVersionObject;

        $api = $this->getApiMock();

        $api->expects($this->once())
            ->method('delete')
            ->with('/artworks/art_61712e005470c/versions/art_vrsn_61712e005e018')
            ->willReturn($expectedArray);

        $this->assertEquals($expectedArray, $api->destroy('art_61712e005470c', 'art_vrsn_61712e005e018'));
    }

    protected function getApiClass(): string
    {
        return ArtworkVersions::class;
    }
}
