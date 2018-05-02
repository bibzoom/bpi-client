<?php
namespace Bpi\Sdk\Item;

class Node extends BaseItem
{
    /**
     * @var array
     */
    protected $assets;

    /**
     * @var array
     */
    protected $tags;

    /**
     * Get node assets (images)
     *
     * @return array
     */
    public function getAssets()
    {
        $result = array();
        foreach ($this->getProperties() as $key => $val)
        {
            if (strpos($key, 'asset') !== FALSE)
            {
                $result[$key] = $val;
            }
        }

        return $result;
    }

    /**
     * Get node tags.
     *
     * @return array
     */
    public function getTags()
    {
        if (!$this->tags) {
            $tags = array();

            foreach ($this->element->xpath('tags/tag') as $tag) {
                $name = (string)$tag['tag_name'];
                if (!empty($name)) {
                    $tags[] = $name;
                }
            }

            $this->tags = $tags;
        }
        return $this->tags;
    }

    public function syndicate()
    {
        // @todo implementation
    }

    public function push()
    {
        // @todo implementation
    }

    public function delete()
    {
        // @todo implementation
    }
}
