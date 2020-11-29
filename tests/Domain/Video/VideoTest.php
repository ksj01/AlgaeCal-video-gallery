<?php
declare(strict_types=1);

namespace Tests\Domain\Video;

use App\Domain\Video\Video;
use Tests\TestCase;

class VideoTest extends TestCase
{
    public function videoProvider()
    {
        return [
	        1 => new Video(1, 'What It\'s Like To Work At AlgaeCal', '', 'Discover what it\'s like to work at AlgaeCal with this quick video!', 'm3ralniniq'),
	        2 => new Video(2, 'Esther Mangini Testimonial', 'Testimonials', 'Esther\'s journey to healthier bones', 'ybyot0dm7q'),
	        3 => new Video(3, 'Teresa Cucurull Testimonial', '', 'Teresa\'s journey to healthier bones', 'mhmv73k989'),
	        4 => new Video(4, 'Perfect Pilates For Osteoporosis - Legwork', '', 'Bone Healthy Exercises!', '3n5p02h26w'),
	        5 => new Video(5, 'Perfect Pilates For Osteoporosis - Amazing Abs', '', 'Bone Healthy Exercises!', 'kkgeu7v2va'),
	        6 => new Video(6, 'Lara\'s Homemade Granola', '', 'Bone Healthy Recipes', 'm6amjftj3w'),
	        7 => new Video(7, 'Brazil Nut Pesto', '', 'Bone Healthy Recipes', 'ajoe5d0jk0'),
        ];
    }

    /**
     * @dataProvider videoProvider
     * @param $id
     * @param $username
     * @param $firstName
     * @param $lastName
     */
    public function testGetters($id, $videoname, $firstName, $lastName)
    {
        $video = new Video($id, $videoname, $firstName, $lastName);

        $this->assertEquals($id, $video->getId());
        $this->assertEquals($videoname, $video->getVideoname());
        $this->assertEquals($firstName, $video->getFirstName());
        $this->assertEquals($lastName, $video->getLastName());
    }

    /**
     * @dataProvider videoProvider
     * @param $id
     * @param $videoname
     * @param $firstName
     * @param $lastName
     */
    public function testJsonSerialize($id, $videoname, $firstName, $lastName)
    {
        $video = new Video($id, $videoname, $firstName, $lastName);

        $expectedPayload = json_encode([
            'id' => $id,
            'videoname' => $videoname,
            'firstName' => $firstName,
            'lastName' => $lastName,
        ]);

        $this->assertEquals($expectedPayload, json_encode($video));
    }
}
