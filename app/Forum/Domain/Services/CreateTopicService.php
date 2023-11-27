<?php

namespace App\Forum\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Domain\ServiceInterface;
use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class CreateTopicService implements ServiceInterface
{
    /**
     * [$topics description]
     * @var [type]
     */
    protected $topics;

    /**
     * [$posts description]
     * @var [type]
     */
    protected $posts;

    /**
     * [__construct description]
     * @param TopicRepository $topics [description]
     * @param PostRepository  $posts  [description]
     */
    public function __construct(TopicRepository $topics, PostRepository $posts)
    {
        $this->topics = $topics;
        $this->posts = $posts;
    }

    /**
     * [handle description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function handle($data = [])
    {
        if (($validator = $this->validate($data))->fails()) {
            return new ValidationPayload($validator->getMessageBag());
        }

        $topic = $this->topics->create(
            array_only($data, 'title')
        );

        $this->posts->create(
            $topic->id, array_only($data, 'body')
        );

        $topic->load('posts');

        return new GenericPayload($topic);
    }

    /**
     * [validate description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    protected function validate($data)
    {
        return validator($data, [
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
