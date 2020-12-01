<?php
declare(strict_types=1);

namespace App\Domain\Video;

interface VideoRepository
{
    /**
     * @return Video[]
     */
    public function findAll(): array;

    /**
     * @param string $video_id
     *
     * @return Video
     * @throws VideoNotFoundException
     */
    public function findVideoOfId(string $video_id): Video;
}
